<template>
    <div class="mx-10 my-10 mb-20">
        <div class="mx-8">
            <div class="flex flex-col justify-center items-center">
                <!-- <div class="text-5xl font-bold mb-10">Buat Pesanan</div>
                <div class="">
                    <div class="h-16 mt-3 mb-5 flex items-center justify-center">
                        <div class="">
                            <div
                                class="w-16 h-16 border-2 border-gray-300  rounded-full flex items-center justify-center text-gray-300 text-3xl font-semibold">
                                <i class="ri-folder-add-line"></i>
                            </div>
                            <span class="text-gray-300 mt-5">Tahap 1</span>
                        </div>
                        <div class="w-24 h-[2px] mb-5 bg-yellow-500"></div>
                        <div class="">
                            <div
                                class="w-16 h-16 border-2 border-yellow-500  rounded-full flex items-center justify-center text-yellow-500 text-3xl font-semibold">
                                <i class="ri-wallet-3-line"></i>
                            </div>
                            <span class="text-yellow-500 mt-5">Tahap 2</span>
                        </div>
                    </div>
                </div> -->

                <div class="bg-white rounded-3xl mb-3 mt-10 p-2 text-lg">Konfirmasi Kontrak Pemesanan
                </div>
                <div class="flex flex-col bg-white rounded-3xl mb-5 shadow-lg p-4">
                    <div class="flex gap-4 justify-between">
                        <div class="flex gap-2">
                            <div class="flex justify-center items-center">
                                <i class="ri-article-line text-5xl"></i>
                            </div>
                            <div class="flex flex-col">
                                <div class="font-bold">Kontrak - {{ modalData.Awal_Kontrak }}</div>
                                <div class="">000{{ modalData.No_Req }}/BKS/SPKL/III/2023</div>
                            </div>
                        </div>
                        <div class="text-center flex justify-center items-center">
                            <span v-if="modalData.Contract_Buy === 'Accept'" class="bg-green-500 px-10 rounded-3xl">Telah
                                Terbit</span>
                            <span v-if="modalData.Contract_Buy === 'Decline'"
                                class="bg-red-500 px-10 rounded-3xl">Ditolak</span>
                            <!-- <span class="bg-yellow-300 px-10 rounded-3xl">Pengecekan</span> -->
                        </div>
                    </div>
                    <hr class="border mb-3 border-gray-300">

                    <div v-if="modalData.Contract_Buy === 'Accept'" class="flex items-center">
                        <div class="h-20 mx-16 justify-center w-3/5 flex flex-col">
                            <div class="font-bold">{{ modalData.Nama_Kategori }}</div>
                            <div class="">{{ modalData.Nama_Jenis }}</div>
                            <div class="">{{ modalData.Kode_Jenis }}</div>
                        </div>
                        <div class="flex justify-end items-center w-2/5 mx-5">
                            <img class="object-cover rounded-3xl h-36" src="images/system/verified.gif" alt="">
                        </div>
                    </div>
                    <div v-if="modalData.Contract_Buy === 'Accept'" class="flex justify-start mx-12 gap-3">
                        <a :href="'/Contract-Buy/' + modalData.No_Req"
                            class="px-3 border border-yellow-300 rounded-3xl hover:bg-yellow-300 hover:text-black"><i
                                class="ri-eye-line"></i> Cek Kontrak
                        </a>
                    </div>

                    <div v-if="modalData.Contract_Buy === 'Decline'" class="flex items-center">
                        <div class="h-20 mx-12 justify-center w-3/5 flex flex-col">
                            <div class="font-bold">Mohon Maaf</div>
                            <div class="">Pesanan belum berhasil</div>

                        </div>
                        <div class="flex justify-end items-center w-2/5 mx-5">
                            <img class="object-cover rounded-3xl h-36" src="images/system/invalid.gif" alt="">
                        </div>
                    </div>
                    <div v-if="modalData.Contract_Buy === 'Decline'" class="flex mx-12 justify-start gap-3">
                        <router-link to="/Catalogue"
                            class="px-3 border border-green-300 rounded-3xl hover:bg-green-500 hover:text-black"><i
                                class="ri-eye-line"></i> Buat Pesanan Baru
                        </router-link>
                    </div>

                    <!-- <div class="flex items-center">
                        <div class="h-20 mx-12 justify-center w-3/5 flex flex-col">
                            <div class="font-bold">Sihlakan Tunggu</div>
                            <div class="">Pesanan masih diproses</div>

                        </div>
                        <div class="flex justify-end items-center w-2/5 mx-5">
                            <img class="object-cover rounded-3xl h-36" src="images/system/danger.gif" alt="">
                        </div>
                    </div> -->
                </div>

                <div class="flex mt-2 justify-center w-full">
                    <router-link to="/Contract-Buy"
                        class="bg-[#FFDD63] p-3 font-bold hover:bg-black hover:text-[#FFDD63] border border-black  rounded-3xl">Kembali</router-link>
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
    name: 'Detail-Contract',
    props: ['No_Req'],
    data() {
        return {
            modalData: {},
        }
    },
    methods: {
        loadData(id) {
            axios.get(`api/transaction?idBuy=${id}`)
                .then(({ data }) => {
                    this.modalData = data;
                })
                .catch(error => {
                    console.error('Gagal memuat data:', error);
                });

            console.log('Show modal');
        }
    },
    mounted() {
        this.loadData(this.No_Req);
        console.log(this.No_Req);
    }
}
</script>

<style scoped>
/* * {
    border: 1px solid red;
} */
</style>


