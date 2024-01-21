<template>
    <div class="mx-10 my-10">
        <div class="mx-8">
            <div class="w-full">
                <div class="grid grid-cols-2 gap-14">
                    <div class="flex-col h-fit border border-black bg-white rounded-3xl items-center justify-center">
                        <div class="flex items-center justify-center rounded-3xl mx-10 mt-10 mb-10">
                            <img :src="'./images/user/' + products.Foto_Kategori" width="140px" height="140px" alt="">
                        </div>
                        <div class="text-center font-semibold text-2xl mb-6"><span class="text-black">{{
                            products.Nama_Kategori }} </span></div>
                    </div>
                    <div class="flex flex-col h-fit">
                        <div class="font-semibold text-3xl">{{ products.Nama_Kategori }}
                        </div>
                        <div class="text-justify mt-3 mb-3">{{ products.Keterangan }}
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <h1 class="text-xl font-semibold mb-2">List Produk</h1>
                    <ul class="grid grid-cols-5 gap-1 w-full mb-3">
                        <li v-for="item in lists" :key="item.ID_Jenis">
                            <input type="radio" :id="item.ID_Jenis" name="hosting" :value="item.ID_Jenis"
                                class="hidden peer" required v-model="selectedOption">
                            <label :for="item.ID_Jenis"
                                class="inline-flex items-center justify-center w-full p-5 text-black bg-yellow-300 border border-black rounded-lg cursor-pointer hover:text-gray-600 hover:bg-gray-100 peer-checked:border-blue-600 peer-checked:text-blue-600 peer-checked:bg-white">
                                <div class="flex-col text-center">
                                    <div class="flex items-center justify-center">
                                        <img :src="'https://i.postimg.cc/NjWNmvg7/fruit.png'" width="130px" height="30px"
                                            alt="" class="rounded-lg">
                                    </div>
                                    <hr class="mb-2 border border-black">
                                    <div>{{ item.Nama_Jenis }}</div>
                                    <div>{{ item.Kode_Jenis }}</div>
                                    <hr class="mb-2 mt-2 border border-black">
                                    <div v-if="lists.length !== 0">Stok :<span class="text-green-600"> {{ item.Stok_Barang
                                    }}</span> Liter
                                        <div>(Rp. <span class="text-green-600">{{ item.min_price }}</span> - Rp. <span
                                                class="text-green-600">{{ item.max_price }}</span>)</div>
                                    </div>
                                </div>
                            </label>
                        </li>
                    </ul>
                </div>

                <div class="flex items-center">
                    <router-link v-if="lists.length !== 0 && selectedOption"
                        :to="{ name: 'Transaction-Information', params: { productId: selectedOption } }"
                        class="bg-[#FFDD63] border border-black px-3 py-2 mr-3 hover:bg-black hover:text-white rounded-2xl font-bold">Beli
                        Produk</router-link>
                    <div v-if="lists.length === 0" class="text-red-600">Stok tidak tersedia</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
const csrfToken = document.head.querySelector('meta[name="csrf-token"]');

if (csrfToken) {
    axios.defaults.headers.common['X-CSRF-TOKEN'] = csrfToken.content;
}

export default {
    name: 'Catalogue-Detail',
    props: ['productId'],
    data() {
        return {
            products: {},
            lists: {},
            form: new Form({
                ID_Kategori: "",
                ID_Jenis: "",
            }),
            selectedOption: null,
            stok: null,
        }
    },
    methods: {
        loadProduct(id) {
            axios
                .get('api/category?id=' + id)
                .then(({ data }) => {
                    this.products = data;
                })
                .catch(error => {
                    console.error('Gagal memuat data:', error);
                });
            // console.log('Show modal');
        },
        loadDataProduct(id) {
            axios
                .get('api/jenis?idProduk=' + id)
                .then(({ data }) => {
                    this.lists = data;
                    console.log(this.lists);
                })
                .catch(error => {
                    console.error('Gagal memuat data:', error);
                });
        },
    },
    mounted() {

    },
    created() {
        const productId = this.$route.params.productId;
        this.loadProduct(productId);
        this.loadDataProduct(productId);
    }
}
</script>

<style scoped>
/* * {
    border: 1px solid red;
} */
</style>
