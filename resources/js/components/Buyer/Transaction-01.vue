<template>
    <div class="mx-10 my-10 mb-20">
        <div class="mx-8">
            <div class="flex flex-col justify-center items-center">
                <div class="text-5xl font-bold mb-10">Buat Pesanan</div>
                <div class="">
                    <div class="h-16 mt-3 mb-5 flex items-center justify-center">
                        <div class="">
                            <div
                                class="w-16 h-16 border-2 border-yellow-500  rounded-full flex items-center justify-center text-yellow-500 text-3xl font-semibold">
                                <i class="ri-folder-add-line"></i>
                            </div>
                            <span class="text-yellow-500 mt-5">Tahap 1</span>
                        </div>
                        <div class="w-24 h-[2px] mb-5 bg-yellow-500"></div>
                        <div class="">
                            <div
                                class="w-16 h-16 border-2 border-gray-300  rounded-full flex items-center justify-center text-gray-300 text-3xl font-semibold">
                                <i class="ri-wallet-3-line"></i>
                            </div>
                            <span class="text-gray-300 mt-5">Tahap 2</span>
                        </div>
                    </div>
                </div>
                <div class="flex mt-10 gap-8 w-full">
                    <div class="flex flex-col justify-start w-4/12">
                        <img class="object-fit " src="images/system/poin2.png" alt="">
                        <img class="object-fit" src="images/system/poin3-bw.png" alt="">
                    </div>
                    <div class="w-10/12 h-fit mt-10">
                        <div class="flex flex-col">
                            <div class="flex gap-4 mb-2">
                                <div class="bg-white border border-black text-black rounded-2xl w-full mb-5 text-center">
                                    Konfirmasi Kontrak Pemesanan</div>
                            </div>
                            <div class="flex gap-4 mb-2">
                                <div class="bg-white text-black rounded-2xl w-full mb-5 text-center">
                                    Terkait data dibawah, diambil dari <span class="text-yellow-600">profile</span> Anda
                                    sejak mendaftar pertama kali. Bila
                                    terdapat data yang tidak sesuai, Anda bisa mengubahnya melalui <span
                                        class="text-yellow-600">profile</span>.</div>
                            </div>

                            <div class="">
                                <form action="">
                                    <div class="flex gap-4 mb-2">
                                        <div
                                            class="bg-yellow-400 border border-black text-black rounded-2xl w-1/3 text-center">
                                            Username Penerima</div>
                                        <div class="bg-white text-black border border-black rounded-2xl w-2/3"><span
                                                class="ml-5">{{ userData.Username }}</span></div>
                                    </div>
                                    <div class="flex gap-4 mb-2">
                                        <div
                                            class="bg-yellow-400 border border-black text-black rounded-2xl w-1/3 text-center">
                                            Kontak Telp</div>
                                        <div class="bg-white text-black border border-black rounded-2xl w-2/3"><span
                                                class="ml-5">(+62) {{ userData.No_Telp }}</span></div>
                                    </div>
                                    <div class="flex gap-4 mb-2">
                                        <div
                                            class="bg-yellow-400 border border-black text-black rounded-2xl w-1/3 text-center">
                                            Kontak Email</div>
                                        <div class="bg-white text-black border border-black rounded-2xl w-2/3"><span
                                                class="ml-5">{{ userData.Email }}</span></div>
                                    </div>
                                    <div class="flex gap-4 mb-2">
                                        <div
                                            class="bg-yellow-400 border border-black text-black rounded-2xl w-1/3 flex items-center justify-center text-center">
                                            Alamat</div>
                                        <div class="bg-white text-black border text-justify border-black rounded-2xl w-2/3">
                                            <div class="mx-5">{{ userData.Alamat }}</div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="flex justify-end w-full mt-10">
                                <router-link :to="{ name: 'Transaction-Order', params: { productId: productId } }"
                                    class="bg-[#FFDD63] p-3 font-bold hover:bg-black hover:text-[#FFDD63] border border-black  rounded-3xl">Selanjutnya</router-link>
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
    name: 'Transaction-Information',
    props: ['productId'],
    data() {
        return {
            userData: {},
        }
    },
    methods: {
        loadData() {
            // Anda dapat memuat data jika dibutuhkan
        },
        userDetail() {
            axios
                .get('/ProfileDetail')
                .then(({ data }) => {
                    this.userData = data;
                })
                .catch(error => {
                    console.error('Error fetching user detail:', error);
                });
        },
    },
    mounted() {
    },
    created() {
        this.userDetail();
    }
}
</script>

<style scoped>
/* * {
    border: 1px solid red;
} */
</style>
