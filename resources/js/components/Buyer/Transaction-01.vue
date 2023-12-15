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
                    <div class="w-10/12 h-96 mt-10">
                        <div class="flex flex-col">
                            <div class="flex gap-4 mb-2">
                                <div class="bg-white border border-black text-black rounded-2xl w-1/3 text-center">Tipe
                                    Komuditas</div>
                                <div class="bg-white text-black border border-black rounded-2xl w-2/3 text-center">Minyak
                                    Sawit</div>
                            </div>
                            <div class="flex">
                                <ul class="flex flex-wrap w-full gap-5 mb-3">
                                    <li>
                                        <input type="radio" id="hosting-small" name="hosting" value="hosting-small"
                                            class="hidden peer" required>
                                        <label for="hosting-small"
                                            class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer hover:text-gray-600 hover:bg-gray-100 peer-checked:border-blue-600 peer-checked:text-blue-600">
                                            <div class="flex-col">
                                                <img src="https://i.postimg.cc/NjWNmvg7/fruit.png" width="100px"
                                                    height="30px" alt="">
                                                <div class="text-center">Minyak A</div>
                                            </div>
                                        </label>
                                    </li>

                                    <li>
                                        <input type="radio" id="hosting-small" name="hosting" value="hosting-small"
                                            class="hidden peer" required>
                                        <label for="hosting-small"
                                            class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer hover:text-gray-600 hover:bg-gray-100 peer-checked:border-blue-600 peer-checked:text-blue-600">
                                            <div class="flex-col">
                                                <img src="https://i.postimg.cc/NjWNmvg7/fruit.png" width="100px"
                                                    height="30px" alt="">
                                                <div class="text-center">Minyak A</div>
                                            </div>
                                        </label>
                                    </li>

                                    <li>
                                        <input type="radio" id="hosting-small2" name="hosting" value="hosting-small2"
                                            class="hidden peer" required>
                                        <label for="hosting-small2"
                                            class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100">
                                            <div class="flex-col">
                                                <img src="https://i.postimg.cc/NjWNmvg7/fruit.png" width="100px"
                                                    height="30px" alt="">
                                                <div class="text-center">Minyak B</div>
                                            </div>
                                        </label>
                                    </li>

                                    <li>
                                        <input type="radio" id="hosting-small22" name="hosting" value="hosting-small22"
                                            class="hidden peer" required>
                                        <label for="hosting-small22"
                                            class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer hover:text-gray-600 hover:bg-gray-100 peer-checked:border-blue-600 peer-checked:text-blue-600">
                                            <div class="flex-col">
                                                <img src="https://i.postimg.cc/NjWNmvg7/fruit.png" width="100px"
                                                    height="30px" alt="">
                                                <div class="text-center">Minyak C</div>
                                            </div>

                                        </label>
                                    </li>

                                    <li>
                                        <input type="radio" id="hosting-small2222" name="hosting" value="hosting-small2222"
                                            class="hidden peer" required>
                                        <label for="hosting-small2222"
                                            class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer hover:text-gray-600 hover:bg-gray-100 peer-checked:border-blue-600 peer-checked:text-blue-600">
                                            <div class="flex-col">
                                                <img src="https://i.postimg.cc/NjWNmvg7/fruit.png" width="100px"
                                                    height="30px" alt="">
                                                <div class="text-center">Minyak D</div>
                                            </div>

                                        </label>
                                    </li>
                                </ul>
                            </div>
                            <div class="flex">

                                <div date-rangepicker class="flex items-center">
                                    <div class="relative">
                                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                            </svg>
                                        </div>
                                        <input name="start" type="date"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 "
                                            placeholder="Select date start">
                                    </div>
                                    <span class="mx-4 text-gray-500">to</span>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                            </svg>
                                        </div>
                                        <input name="end" type="date"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 "
                                            placeholder="Select date end">
                                    </div>
                                </div>

                                <div class="bg-white text-black p-3 rounded-3xl ml-5 border border-black">Rp 35.000 / Liter
                                </div>
                            </div>

                            <div class="relative mt-3">
                                <input type="text" id="floating_filled"
                                    class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " />
                                <label for="floating_filled"
                                    class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Masukkan
                                    Jumlah Kuantitas</label>
                            </div>
                        </div>
                        <div class="flex justify-end w-full mt-4">
                            <router-link to="/Transaction-Order"
                                class="bg-[#FFDD63] p-3 font-bold hover:bg-black hover:text-[#FFDD63] border border-black  rounded-3xl">Selanjutnya</router-link>
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
