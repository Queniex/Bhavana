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
                </div>

                <div class="bg-white rounded-3xl mb-3 mt-10 p-2 text-lg">Konfirmasi Kontrak Pemesanan
                </div>
                <div class="flex flex-col bg-white rounded-3xl mb-5 shadow-lg p-4">
                    <div class="flex gap-4 justify-between">
                        <div class="flex gap-2">
                            <div class="flex justify-center items-center">
                                <i class="ri-article-line text-5xl"></i>
                            </div>
                            <div class="flex flex-col">
                                <div class="font-bold">Kontrak - 26 Oktober 2023</div>
                                <div class="">0002/BKS/SPKL/III/2023</div>
                            </div>
                        </div>
                        <div class="text-center flex justify-center items-center">
                            <span class="bg-yellow-300 px-10 rounded-3xl">checking</span>
                        </div>
                    </div>
                    <hr class="border mb-3 border-gray-300">
                    <div class="flex items-center">
                        <div class="h-20 mx-16 justify-center w-3/5 flex flex-col">
                            <div class="font-bold">Minyak Sawit Jenis A</div>
                            <div class="">10.000 Kg</div>
                        </div>
                        <div class="flex justify-end items-center w-2/5 mx-5">
                            <img class="object-cover rounded-3xl h-36" src="images/system/fruit.png" alt="">
                        </div>
                    </div>
                    <div class="flex justify-start gap-3">
                        <div class="px-3 border border-yellow-300 rounded-3xl"><i class="ri-eye-line"></i> Kontrak</div>
                        <div class="px-3 border border-yellow-300 rounded-3xl"><i class="ri-mail-fill"></i> Nego</div>
                    </div>
                </div>

                <div class="flex mt-2 justify-center w-full">
                    <router-link to="/Dash-Buy"
                        class="bg-[#FFDD63] p-3 font-bold hover:bg-black hover:text-[#FFDD63] border border-black  rounded-3xl">Konfirmasi</router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: 'Contract-Buy',
    methods: {
        loadData() {
            // Anda dapat memuat data jika dibutuhkan
        }
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
