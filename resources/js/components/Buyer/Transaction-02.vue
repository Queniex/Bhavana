<template>
    <div class="mx-10 my-10 mb-20">
        <div class="mx-8">
            <div class="flex flex-col justify-center items-center">
                <div class="text-5xl font-bold mb-10">Buat Pesanan</div>
                <div class="">
                    <div class="h-16 mt-3 mb-5 flex items-center justify-center">
                        <div class="">
                            <div
                                class="w-16 h-16 border-2 border-gray-300  rounded-full flex items-center justify-center text-gray-300 text-3xl font-semibold">
                                <i class="ri-wallet-3-line"></i>
                            </div>
                            <span class="text-gray-300 mt-5">Tahap 1</span>
                        </div>
                        <div class="w-24 h-[2px] mb-5 bg-yellow-500"></div>
                        <div class="">
                            <div
                                class="w-16 h-16 border-2 border-yellow-500  rounded-full flex items-center justify-center text-yellow-500 text-3xl font-semibold">
                                <i class="ri-folder-add-line"></i>
                            </div>
                            <span class="text-yellow-500 mt-5">Tahap 2</span>
                        </div>
                    </div>
                </div>
                <div class="flex mt-5 gap-8 w-full">
                    <div class="flex flex-col justify-start w-4/12">
                        <img class="object-fit " src="images/system/poin2-bw.png" alt="">
                        <img class="object-fit" src="images/system/poin3.png" alt="">
                    </div>
                    <div class="w-10/12 h-96 mt-16">
                        <div class="flex flex-col">
                            <div class="flex gap-4 mb-2">
                                <div class="bg-yellow-400 border border-black text-black rounded-2xl w-1/3 text-center">Tipe
                                    Kategori</div>
                                <div class="bg-white text-black border border-black rounded-2xl w-2/3"><span class="ml-5">{{
                                    product[0].Nama_Kategori }}</span></div>
                            </div>
                            <div class="flex gap-4 mb-2">
                                <div class="bg-yellow-400 border border-black text-black rounded-2xl w-1/3 text-center">
                                    Jenis
                                    Kategori</div>
                                <div class="bg-white text-black border border-black rounded-2xl w-2/3"><span class="ml-5">{{
                                    product[0].Nama_Jenis }}</span></div>
                            </div>
                            <div class="flex gap-4 mb-2">
                                <div class="bg-yellow-400 border border-black text-black rounded-2xl w-1/3 text-center">Kode
                                    Produk</div>
                                <div class="bg-white text-black border border-black rounded-2xl w-2/3"><span class="ml-5">{{
                                    product[0].Kode_Jenis }}</span></div>
                            </div>
                            <div class="flex gap-4 mb-2">
                                <div class="bg-yellow-400 border border-black text-black rounded-2xl w-1/3 text-center">
                                    Range Harga</div>
                                <div class="bg-white text-black border border-black rounded-2xl w-2/3"><span
                                        class="ml-5">Rp. 55,000 - Rp. 75,000</span></div>
                            </div>
                            <form @submit.prevent="saveRequest()">
                                <div class="flex mb-2 gap-4">
                                    <div
                                        class="bg-yellow-400 border border-black text-black rounded-2xl w-1/3 flex items-center justify-center">
                                        Jangka Waktu </div>
                                    <div date-rangepicker class="flex items-center">
                                        <div class="relative">
                                            <!-- <div
                                                class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                                </svg>
                                            </div> -->
                                            <input name="start" type="date" v-model="form.Awal_Kontrak"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 "
                                                :class="{ 'is-invalid': form.errors.has('Awal_Kontrak') }"
                                                placeholder="Select date start">
                                            <div v-if="form.errors.has('Awal_Kontrak')" class="text-red-600 font-semibold"
                                                v-html="form.errors.get('Awal_Kontrak')" />
                                        </div>
                                        <span class="mx-4 text-yellow-600">sampai</span>
                                        <div class="relative">
                                            <!-- <div
                                                class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                                </svg>
                                            </div> -->
                                            <input id="date-end" name="end" type="date" v-model="form.Akhir_Kontrak"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 "
                                                :class="{ 'is-invalid': form.errors.has('Akhir_Kontrak') }"
                                                placeholder="Select date end">
                                            <div v-if="form.errors.has('Akhir_Kontrak')" class="text-red-600 font-semibold"
                                                v-html="form.errors.get('Akhir_Kontrak')" />
                                        </div>
                                    </div>
                                </div>
                                <div class="">Masukkan Jumlah Kuantitas : <span class="text-yellow-600"> (Stok : {{
                                    product[0].Stok_Barang }} Liter)</span></div>
                                <div class="relative">
                                    <input type="number" id="floating_filled" v-model="form.QTY"
                                        class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 focus:outline-none focus:ring-0 focus:border-yellow-600 peer"
                                        :class="{ 'is-invalid': form.errors.has('QTY') }" :max="product[0].Stok_Barang"
                                        :min="1" placeholder=" " />
                                    <div v-if="form.errors.has('QTY')" class="text-red-600 font-semibold"
                                        v-html="form.errors.get('QTY')" />
                                    <label for="floating_filled"
                                        class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-yellow-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Satuan
                                        Liter </label>
                                </div>

                                <div class="flex justify-between w-full mt-4">
                                    <router-link :to="{ name: 'Transaction-Information', params: { productId: productId } }"
                                        class="bg-[#FFDD63] p-3 font-bold hover:bg-black hover:text-[#FFDD63] border border-black  rounded-3xl">Sebelumnya</router-link>
                                    <button type="submit" :disabled="disabled"
                                        class="bg-[#FFDD63] p-3 font-bold hover:bg-black hover:text-[#FFDD63] border border-black  rounded-3xl">Buat
                                        Kontrak</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import Form from 'vform';
const csrfToken = document.head.querySelector('meta[name="csrf-token"]');

if (csrfToken) {
    axios.defaults.headers.common['X-CSRF-TOKEN'] = csrfToken.content;
}

export default {
    name: 'Transaction-Order',
    props: ['productId'],
    data() {
        return {
            product: {},
            disabled: false,
            form: new Form({
                ID_Kategori: "",
                Akhir_Kontrak: "",
                Awal_Kontrak: "",
                ID_Jenis: "",
                QTY: "",
                No_Req: "",
                ID_Req: "",
            }),
        }
    },
    methods: {
        loadData() {
            // Anda dapat memuat data jika dibutuhkan
        },
        loadProduct(id) {
            axios
                .get('api/jenis?idReq=' + id)
                .then(({ data }) => {
                    this.product = data;
                    this.form.ID_Jenis = this.product[0].ID_Jenis;
                    this.form.ID_Jenis = this.product[0].ID_Jenis;
                })
                .catch(error => {
                    console.error('Gagal memuat data:', error);
                });
        },
        saveRequest() {
            this.disabled = true;
            this.form
                .post('/addRequest')
                .then(response => {
                    // Handle success here
                    console.log(response.data);
                    this.$router.push({ name: 'Contract-Buy' });
                    Toast.fire({
                        icon: 'success',
                        title: 'Request Berhasil Dibuat'
                    });
                    this.loading = false;
                    this.disabled = false;
                })
                .catch(error => {
                    this.disabled = false;
                    console.error(error);
                });
        }

    },
    mounted() {
        console.log(this.product);
    },
    created() {
        const productId = this.$route.params.productId;
        // console.log(this.productId);
        this.loadProduct(productId);
    }
}
</script>

<style scoped>
/* * {
    border: 1px solid red;
} */
</style>
