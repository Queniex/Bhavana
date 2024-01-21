<template>
    <div class="mx-10 my-10 h-[100vh]">
        <div class="mx-8">
            <div class="text-black">
                <div class="flex justify-center">
                    <h1 class="font-bold mb-5 text-2xl underline underline-offset-4">Produk Katalog</h1>
                </div>
                <div class="flex justify-between mt-5 mb-10">

                    <router-link to="/Dash-Buy"
                        class="bg-yellow-300 mr-2 px-10 border hover:bg-black hover:text-white border-black rounded-3xl"><i
                            class="ri-home-4-line text-2xl"></i></router-link>

                    <button class="bg-yellow-300 mr-2 px-6 border hover:bg-black hover:text-white border-black rounded-3xl">
                        <div class="flex justify-center items-center">
                            <i class="ri-edit-line mr-2"></i>
                            <span class="font-bold">Permintaan Pemesanan </span>
                            <div class="bg-[#FFF1BE] rounded-full ml-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                    <path
                                        d="M13.1714 12.0007L8.22168 7.05093L9.63589 5.63672L15.9999 12.0007L9.63589 18.3646L8.22168 16.9504L13.1714 12.0007Z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </button>
                    <div class="w-3/5">
                        <form>
                            <label for="default-search"
                                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">
                                Search
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                </div>
                                <input type="search" id="default-search"
                                    class="block border border-black w-full p-2 ps-10 text-sm text-gray-900 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Cari kategori..." required v-model="searchTerm" @input="search" />
                                <!-- <button type="submit"
                                    class="text-white absolute end-2.5 bottom-2.5 bg-yellow-300 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-4">
                                    Search
                                </button> -->
                            </div>
                        </form>
                    </div>
                </div>

                <div class="w-full bg-yellow-300 mt-5 rounded-3xl">
                    <img class="object-cover rounded-3xl h-40 w-full" src="images/system/b-oil1.png" alt="">
                </div>
                <div class="w-full mt-5 mb-10 rounded-3xl">
                    <div class="flex flex-col">
                        <div class="flex flex-wrap gap-7 mt-5">
                            <div class="h-56 w-44 bg-white hover:bg-yellow-200 rounded-3xl col border hover:border-yellow-200 border-black flex-col shadow-lg"
                                v-for="oil in searchResults.length ? searchResults : oils" :key="oil.ID_Kategori">
                                <router-link :to="{ name: 'Catalogue-Detail', params: { productId: oil.ID_Kategori } }">
                                    <div class="mx-3 my-5 rounded-3xl mb-2 flex justify-center items-center">
                                        <img class="object-cover rounded-3xl h-36"
                                            :src="'./images/user/' + oil.Foto_Kategori" alt="">
                                    </div>
                                    <div class="mx-2">
                                        <div class=" flex gap-2 justify-center items-center">
                                            <div class="flex flex-col">
                                                <div class="text-sm text-center font-bold">{{ oil.Nama_Kategori }}</div>
                                                <div class="text-sm text-red-500">{{ oil.Kode_Jenis }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </router-link>
                            </div>
                        </div>
                    </div>
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
    name: 'Catalogue',
    data() {
        return {
            oils: {},
            searchTerm: '',
            searchResults: []
        }
    },
    methods: {
        loadData() {
            // Anda dapat memuat data jika dibutuhkan
        },
        loadDataSawit() {
            axios
                .get('api/category')
                .then(({ data }) => {
                    this.oils = data;
                    console.log('he');
                });
        },
        search() {
            this.searchResults = this.oils.filter(oil =>
                oil.Nama_Kategori.toLowerCase().includes(this.searchTerm.toLowerCase())
            );
        },
    },
    created() {
        this.loadDataSawit();
    },
    mounted() {
    }
}
</script>

<style scoped>
/* * {
    border: 1px solid red;
} */
</style>


