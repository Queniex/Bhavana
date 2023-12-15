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
                        <img class="object-fit " src="images/system/poin2-bw.png" alt="">
                        <img class="object-fit" src="images/system/poin3.png" alt="">
                    </div>
                    <div class="w-10/12 h-fit mt-10">
                        <div class="flex flex-col">
                            <div class="flex gap-4 mb-2">
                                <div class="bg-white border border-black text-black rounded-2xl w-full mb-10 text-center">
                                    Konfirmasi Kontrak Pemesanan</div>
                            </div>

                            <div class="">
                                <form action="">
                                    <div class="relative mt-3">
                                        <input type="text" id="floating_filled"
                                            class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " />
                                        <label for="floating_filled"
                                            class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Masukkan
                                            Jumlah Kuantitas</label>
                                    </div>

                                    <div class="relative mt-3">
                                        <input type="text" id="floating_filled"
                                            class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " />
                                        <label for="floating_filled"
                                            class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Masukkan
                                            Jumlah Kuantitas</label>
                                    </div>

                                    <div class="relative mt-3">
                                        <input type="text" id="floating_filled"
                                            class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " />
                                        <label for="floating_filled"
                                            class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Masukkan
                                            Jumlah Kuantitas</label>
                                    </div>
                                </form>
                            </div>

                            <div class="flex justify-between w-full mt-10">
                                <router-link to="/Transaction-Information"
                                    class="bg-[#FFDD63] p-3 font-bold hover:bg-black hover:text-[#FFDD63] border border-black  rounded-3xl">Sebelumnya</router-link>
                                <router-link to="/Contract-Buy"
                                    class="bg-[#FFDD63] p-3 font-bold hover:bg-black hover:text-[#FFDD63] border border-black  rounded-3xl">Buat
                                    Kontrak</router-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: 'Transaction-Information',
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
