<template>
    <div class="w-full">
        <div class="mx-8 text-black">
            <div class="grid grid-cols-1 gap-4 mx-10">
                <div class="mt-10 flex gap-8 mb-5">
                    <div class="w-4/5">
                        <div class="bg-cover bg-center h-screen rounded-3xl flex gap-5 flex-col"
                            style="background-image: url('https://i.postimg.cc/2yWjjBxN/bhavana-buyer.png')">
                            <div class="h-1/3"></div>
                            <div class="h-1/3 m-12">
                                <div class="flex flex-col">
                                    <h1 class="text-4xl font-semibold">Temukan komoditasmu!</h1>
                                    <h1 class="font-extralight mt-1 mb-5">Platform Digital Penyedia Berbagai komoditas</h1>
                                    <router-link to="/Catalogue"
                                        class="hover:bg-black hover:text-white bg-yellow-300 rounded-full px-5 py-2 w-fit border border-black">
                                        <i class="ri-shopping-cart-2-line mr-3"></i>
                                        Mulai Order
                                    </router-link>
                                </div>
                            </div>
                            <div class="h-1/3 m-12">
                                <div class="flex">
                                    <img src="images/system/komoditas.png" width="60px" height="55px" alt="">
                                    <div class="flex flex-col ml-3 mt-2">
                                        <span class="font-extralight">Total Komoditas Tersedia</span>
                                        <span class="font-bold">10.000 Ton</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-1/5 flex flex-col justify-between">
                        <router-link to="/Catalogue">
                            <div
                                class="flex flex-col justify-center border hover:border-4 hover:border-yellow-300 bg-white border-black items-center h-36 rounded-3xl">
                                <img src="images/system/katalog.gif" width="80px" height="75px" alt="">
                                <div class="mt-2">Katalog Produk</div>
                            </div>
                        </router-link>
                        <div
                            class="flex flex-col justify-center border hover:border-4 hover:border-yellow-300 bg-white border-black items-center h-36 rounded-3xl">
                            <img src="images/system/order.gif" width="80px" height="75px" alt="">
                            <div class="mt-2">Pesanan Anda</div>
                        </div>
                        <div
                            class="flex flex-col justify-center border hover:border-4 hover:border-yellow-300 bg-white border-black items-center h-36 rounded-3xl">
                            <img src="images/system/pickup.gif" width="80px" height="75px" alt="">
                            <div class="mt-2">Pengantaran</div>
                        </div>
                        <router-link to="/Profile-Buy">
                            <div
                                class="flex flex-col justify-center border hover:border-4 hover:border-yellow-300 bg-white border-black items-center h-36 rounded-3xl">
                                <img src="images/system/report.gif" width="80px" height="75px" alt="">
                                <div class="mt-2">Riwayat</div>
                            </div>
                        </router-link>
                    </div>
                </div>

                <div class="bg-[#FFF1BE] mb-5 rounded-3xl">
                    <h1 class="font-bold my-5 text-lg text-center mx-14"> PROSES TRANSAKSI</h1>
                    <div class="grid grid-cols-3 gap-4 mt-3 mx-8 mb-8">
                        <div class="bg-[#FFFFFF] rounded-lg">
                            <div class="flex gap-3">
                                <div class="w-1/3 ml-2 mt-2 flex justify-center">
                                    <div
                                        class="bg-yellow-300 rounded-full w-10 h-10 flex justify-center items-center font-semibold text-xl">
                                        1
                                    </div>
                                </div>
                                <div class="text-sm my-5 mr-3 text-justify">
                                    Buyer dapat menerbitkan Request For Quotation (RFQ) sesuai dengan bahan baku yang
                                    dibutuhkan
                                </div>
                            </div>
                        </div>
                        <div class="bg-[#FFFFFF] rounded-lg">
                            <div class="flex gap-3">
                                <div class="w-1/3 ml-2 mt-2 flex justify-center">
                                    <div
                                        class="bg-yellow-300 rounded-full w-10 h-10 flex justify-center items-center font-semibold text-xl">
                                        2
                                    </div>
                                </div>
                                <div class="text-sm my-5 mr-3 text-justify">
                                    kami akan mencari supplier dari bahan baku yang buyer butuhkan dan melakukan aggregasi
                                    permintaan untuk mendapatkan harga yang terbaik
                                </div>
                            </div>
                        </div>
                        <div class="bg-[#FFFFFF] rounded-lg">
                            <div class="flex gap-1">
                                <div class="w-1/3 mt-2 flex justify-center">
                                    <div
                                        class="bg-yellow-300 rounded-full w-10 h-10 flex justify-center items-center font-semibold text-xl">
                                        3
                                    </div>
                                </div>
                                <div class="text-sm my-5 mr-3">
                                    Buyer membuat Purchase Order yang ditujukan kepada bhavana
                                </div>
                            </div>
                        </div>
                        <div class="bg-[#FFFFFF] rounded-lg">
                            <div class="flex gap-3">
                                <div class="w-1/3 ml-2 mt-2 flex justify-center">
                                    <div
                                        class="bg-yellow-300 rounded-full w-10 h-10 flex justify-center items-center font-semibold text-xl">
                                        4
                                    </div>
                                </div>
                                <div class="text-sm my-5 mr-3 text-justify">
                                    Buyer dapat menggunakan limit pembayaran tempo yang telah disetujui. *) Buyer dapat
                                    mengajukan permohonan limit pembayaran tempo kepada bhavana.
                                </div>
                            </div>
                        </div>
                        <div class="bg-[#FFFFFF] rounded-lg">
                            <div class="flex gap-3">
                                <div class="w-1/3 ml-2 mt-2 flex justify-center">
                                    <div
                                        class="bg-yellow-300 rounded-full w-10 h-10 flex justify-center items-center font-semibold text-xl">
                                        5
                                    </div>
                                </div>
                                <div class="text-sm my-5 mr-3 text-justify">
                                    Barang dapat diantar ataupun diambil sesuai kesepakatan yang tercantum pada PO. Invoice
                                    dan faktur pajak diterbitkan setelah penandatanganan Berita Acara Serah Terima.
                                </div>
                            </div>
                        </div>
                        <div class="bg-[#FFFFFF] rounded-lg">
                            <div class="flex gap-1">
                                <div class="w-1/3 mt-2 flex justify-center">
                                    <div
                                        class="bg-yellow-300 rounded-full w-10 h-10 flex justify-center items-center font-semibold text-xl">
                                        6
                                    </div>
                                </div>
                                <div class="text-sm my-5 mr-3 ">
                                    Buyer melakukan pembayaran sesuai metode pembayaran yang dipiih.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-[#FFDD63] px-14 pt-20 pb-36 mb-10 rounded-3xl">
                    <div class="mx-10 my-5 flex justify-center items-center">
                        <router-link to="/Catalogue"
                            class="bg-[#FFFFFF] border border-black hover:bg-black hover:text-white text-center rounded-full p-5 mb-8 font-medium">
                            <i class="ri-shopping-bag-line"></i> PRODUK KATALOG <i
                                class="ri-arrow-right-line bg-yellow-300 rounded-full ml-8 p-2"></i>
                        </router-link>
                    </div>
                    <div class="flex gap-10 justify-center">
                        <div
                            class="bg-[#FFFFFF] border border-yellow-300 rounded-3xl p-3 flex flex-col hover:border hover:border-black">
                            <div class="h-44 w-52 mb-3"><img src="https://i.postimg.cc/NjWNmvg7/fruit.png" alt=""></div>
                            <div class="px-3 py-2 text-center bg-[#FFDD63] mx-5 rounded-full">Minyak</div>
                        </div>
                        <!-- <div
                            class="bg-[#FFFFFF] border border-yellow-300 rounded-3xl p-3 flex flex-col hover:border hover:border-black">
                            <div class="h-44 w-52 mb-3"><img src="https://i.postimg.cc/NjWNmvg7/fruit.png" alt=""></div>
                            <div class="px-3 py-2 text-center bg-[#FFDD63] mx-5 rounded-full">Buah</div>
                        </div>
                        <div
                            class="bg-[#FFFFFF] border border-yellow-300 rounded-3xl p-3 flex flex-col hover:border hover:border-black">
                            <div class="h-44 w-52 mb-3"><img class="object-fill"
                                    src="https://i.postimg.cc/t4Zyt660/vege.png" alt=""></div>
                            <div class="px-3 py-2 text-center bg-[#FFDD63] mx-5 rounded-full">Sayur</div>
                        </div> -->
                    </div>
                </div>

                <!-- <div class="h-96">05</div> -->
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: 'Dash-Buy',
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
