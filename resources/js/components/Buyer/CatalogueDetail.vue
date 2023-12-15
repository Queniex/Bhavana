<template>
    <div class="mx-10 my-10">
        <div class="mx-8">
            <div class="w-full">
                <div class="grid grid-cols-2 gap-14">
                    <div class="flex-col h-fit border border-black bg-white rounded-3xl items-center justify-center">
                        <div class="bg-[#FFF1BE] flex items-center justify-center rounded-3xl mx-10 mt-10 mb-10">
                            <img src="https://i.postimg.cc/NjWNmvg7/fruit.png" width="240px" height="240px" alt="">
                        </div>
                        <div class="text-center font-semibold text-2xl mb-6">Minyak Kedelai</div>
                    </div>
                    <div class="flex flex-col h-fit">
                        <div class="font-semibold text-3xl"><span class="text-red-500">Rp. 35.000</span> /Liter</div>
                        <div class="text-justify mt-3 mb-3">Minyak kedelai adalah minyak nabati yang diekstraksi
                            dari biji
                            kedelai,
                            yang merupakan salah
                            satu sumber protein nabati yang paling kaya. Minyak ini memiliki berbagai kegunaan di dunia
                            kuliner dan industri berkat sifat-sifatnya yang menguntungkan
                        </div>
                        <div>
                            <ul class="grid grid-flow-col w-full gap-2 mb-3">
                                <li>
                                    <input type="radio" id="hosting-small" name="hosting" value="hosting-small"
                                        class="hidden peer" required>
                                    <label for="hosting-small"
                                        class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer hover:text-gray-600 hover:bg-gray-100 peer-checked:border-blue-600 peer-checked:text-blue-600">
                                        <div class="flex-col">
                                            <img src="https://i.postimg.cc/NjWNmvg7/fruit.png" width="100px" height="30px"
                                                alt="">
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
                                            <img src="https://i.postimg.cc/NjWNmvg7/fruit.png" width="100px" height="30px"
                                                alt="">
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
                                            <img src="https://i.postimg.cc/NjWNmvg7/fruit.png" width="100px" height="30px"
                                                alt="">
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
                                            <img src="https://i.postimg.cc/NjWNmvg7/fruit.png" width="100px" height="30px"
                                                alt="">
                                            <div class="text-center">Minyak D</div>
                                        </div>

                                    </label>
                                </li>

                            </ul>
                        </div>
                        <div class="flex items-center">
                            <router-link to="/Transaction-Information"
                                class="bg-[#FFDD63] border border-black px-3 py-2 mr-3 hover:bg-black hover:text-white rounded-2xl font-bold">Beli
                                Produk</router-link>
                            <span class="font-light">Stok Tersedia 50.000 kg</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full mt-10 mb-20">
                <div class="flex flex-col">
                    <span class="font-semibold text-xl">Produk Terkait</span>
                    <div class="flex flex-wrap gap-7 mt-5">
                        <div class="h-56 w-44 bg-white rounded-3xl col flex-col shadow-lg">
                            <div class="bg-gray-100 mx-3 my-5 rounded-3xl mb-2 flex justify-center items-center">
                                <img class="object-cover rounded-3xl h-36" src="images/system/fruit.png" alt="">
                            </div>
                            <div class="mx-2">
                                <div class=" flex gap-2 justify-center items-center">
                                    <div class="flex flex-col">
                                        <div class="text-sm font-bold">Minyak Kedelai</div>
                                        <div class="text-sm text-red-500">Rp. 99.000/L</div>
                                    </div>
                                    <div class="">
                                        <a href="/Catalogue-Detail"
                                            class="bg-yellow-200 hover:bg-black hover:text-white rounded-full p-1">
                                            <i class="ri-arrow-right-s-line"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="h-56 w-44 bg-white rounded-3xl col flex-col shadow-lg">
                            <div class="bg-gray-100 mx-3 my-5 rounded-3xl mb-2 flex justify-center items-center">
                                <img class="object-cover rounded-3xl h-36" src="images/system/fruit.png" alt="">
                            </div>
                            <div class="mx-2">
                                <div class=" flex gap-2 justify-center items-center">
                                    <div class="flex flex-col">
                                        <div class="text-sm font-bold">Minyak Kedelai</div>
                                        <div class="text-sm text-red-500">Rp. 99.000/L</div>
                                    </div>
                                    <div class="">
                                        <a href="/Catalogue-Detail"
                                            class="bg-yellow-200 hover:bg-black hover:text-white rounded-full p-1">
                                            <i class="ri-arrow-right-s-line"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="h-56 w-44 bg-white rounded-3xl col flex-col shadow-lg">
                            <div class="bg-gray-100 mx-3 my-5 rounded-3xl mb-2 flex justify-center items-center">
                                <img class="object-cover rounded-3xl h-36" src="images/system/fruit.png" alt="">
                            </div>
                            <div class="mx-2">
                                <div class=" flex gap-2 justify-center items-center">
                                    <div class="flex flex-col">
                                        <div class="text-sm font-bold">Minyak Kedelai</div>
                                        <div class="text-sm text-red-500">Rp. 99.000/L</div>
                                    </div>
                                    <div class="">
                                        <a href="/Catalogue-Detail"
                                            class="bg-yellow-200 hover:bg-black hover:text-white rounded-full p-1">
                                            <i class="ri-arrow-right-s-line"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="h-56 w-44 bg-white rounded-3xl col flex-col shadow-lg">
                            <div class="bg-gray-100 mx-3 my-5 rounded-3xl mb-2 flex justify-center items-center">
                                <img class="object-cover rounded-3xl h-36" src="images/system/fruit.png" alt="">
                            </div>
                            <div class="mx-2">
                                <div class=" flex gap-2 justify-center items-center">
                                    <div class="flex flex-col">
                                        <div class="text-sm font-bold">Minyak Kedelai</div>
                                        <div class="text-sm text-red-500">Rp. 99.000/L</div>
                                    </div>
                                    <div class="">
                                        <a href="/Catalogue-Detail"
                                            class="bg-yellow-200 hover:bg-black hover:text-white rounded-full p-1">
                                            <i class="ri-arrow-right-s-line"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="h-56 w-44 bg-white rounded-3xl col flex-col shadow-lg">
                            <div class="bg-gray-100 mx-3 my-5 rounded-3xl mb-2 flex justify-center items-center">
                                <img class="object-cover rounded-3xl h-36" src="images/system/fruit.png" alt="">
                            </div>
                            <div class="mx-2">
                                <div class=" flex gap-2 justify-center items-center">
                                    <div class="flex flex-col">
                                        <div class="text-sm font-bold">Minyak Kedelai</div>
                                        <div class="text-sm text-red-500">Rp. 99.000/L</div>
                                    </div>
                                    <div class="">
                                        <a href="/Catalogue-Detail"
                                            class="bg-yellow-200 hover:bg-black hover:text-white rounded-full p-1">
                                            <i class="ri-arrow-right-s-line"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="h-56 w-44 bg-white rounded-3xl col flex-col shadow-lg">
                            <div class="bg-gray-100 mx-3 my-5 rounded-3xl mb-2 flex justify-center items-center">
                                <img class="object-cover rounded-3xl h-36" src="images/system/fruit.png" alt="">
                            </div>
                            <div class="mx-2">
                                <div class=" flex gap-2 justify-center items-center">
                                    <div class="flex flex-col">
                                        <div class="text-sm font-bold">Minyak Kedelai</div>
                                        <div class="text-sm text-red-500">Rp. 99.000/L</div>
                                    </div>
                                    <div class="">
                                        <a href="/Catalogue-Detail"
                                            class="bg-yellow-200 hover:bg-black hover:text-white rounded-full p-1">
                                            <i class="ri-arrow-right-s-line"></i>
                                        </a>
                                    </div>
                                </div>
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
    name: 'Catalogue-Detail',
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
