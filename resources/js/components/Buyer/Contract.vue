<template>
    <div class="mx-10 my-10 mb-20">
        <div class="mx-8">
            <div class="flex flex-col justify-center items-center">
                <div class="text-5xl font-bold mb-10">Transaksi Pesanan</div>
                <div class="container mx-auto">
                    <table class="min-w-full bg-white border border-gray-300">
                        <thead>
                            <tr>
                                <th class="border border-gray-300 bg-yellow-500 py-2 px-4 text-center">No</th>
                                <th class="border border-gray-300 bg-yellow-500 py-2 px-4 text-center">Nomor Order</th>
                                <th class="border border-gray-300 bg-yellow-500 py-2 px-4 text-center">Info Tanggal</th>
                                <th class="border border-gray-300 bg-yellow-500 py-2 px-4 text-center">Info Pemesanan</th>
                                <th class="border border-gray-300 bg-yellow-500 py-2 px-4 text-center">Status Permintaan
                                </th>
                                <th class="border border-gray-300 bg-yellow-500 py-2 px-4 text-center">Status Kontrak</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-if="lists.length === 0">
                                <td colspan="6" class="text-center">Tidak terdapat data</td>
                            </tr>
                            <tr v-for="(list, index) in lists" :key="list.No_Req">
                                <td class="border border-gray-300 py-2 px-4 text-center">{{ index + 1 }}</td>
                                <td class="border border-gray-300 py-2 px-4 text-center">MX{{ list.No_Req }}BSD9009</td>
                                <td class="border border-gray-300 py-2 px-4 text-center">
                                    <div>Tanggal Order : {{ formatDate(list.created_at) }}</div>
                                    <hr class="mt-2 mb-2">
                                    <div>Jangka Awal : {{ formatDate(list.Awal_Kontrak) }}</div>
                                    <div>Jangka Akhir : {{ formatDate(list.Akhir_Kontrak) }}</div>
                                </td>
                                <td class="border border-gray-300 py-2 px-4 text-center">
                                    <div>Nama Produk : {{ list.Nama_Jenis }}</div>
                                    <div>Kode Produk : {{ list.Kode_Jenis }}</div>
                                    <div>Jumlah Kuantitas : {{ list.QTY }} Liter</div>
                                    <div v-if="list.Status_Req === 'Pending'" class="text-red-500">
                                        Harga: Belum Ditentukan
                                    </div>
                                    <div v-else-if="list.Status_Req === 'Accept'" class="text-green-500">
                                        Harga: Rp.{{ list.Harjul_Barang * list.QTY }}
                                    </div>
                                </td>
                                <td class="border border-gray-300 py-2 px-4 text-center">
                                    <span :class="{
                                        'bg-green-500': list.Status_Req === 'Accept',
                                        'bg-yellow-500': list.Status_Req === 'Pending',
                                        'bg-red-500': list.Status_Req === 'Decline',
                                        'rounded-full': true,
                                        'py-1': true,
                                        'px-3': true,
                                        'text-white': true
                                    }">
                                        {{ list.Status_Req }}
                                    </span>
                                </td>

                                <td class="border border-gray-300 py-2 px-4 text-center">
                                    <template v-if="list.Contract_Buy">
                                        <router-link :to="{ name: 'Detail-Contract', params: { No_Req: list.No_Req } }"
                                            class="text-blue-500 hover:underline">
                                            Cek Kontrak
                                        </router-link>
                                    </template>
                                    <template v-else>
                                        Kontrak Belum Terbit
                                    </template>
                                </td>

                            </tr>
                        </tbody>
                    </table>

                    <nav aria-label="Page navigation example">
                        <ul class="inline-flex -space-x-px text-sm mt-3">
                            <li :class="{ 'ms-0': buyerPagination.current_page === 1 }">
                                <button
                                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700"
                                    @click="loadData(buyerPagination.current_page - 1)"
                                    :disabled="buyerPagination.current_page === 1">
                                    Previous
                                </button>

                            </li>
                            <li v-for="page in buyerPagination.last_page" :key="page">
                                <button
                                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700"
                                    @click="loadData(page)"
                                    :class="{ 'text-white font-bold border-yellow-300 bg-yellow-500 hover:bg-yellow-100 hover:text-yellow-700 ': page === buyerPagination.current_page, '': page === buyerPagination.last_page }">
                                    {{ page }}
                                </button>
                            </li>
                            <li :class="{ 'rounded-e-lg': buyerPagination.current_page === buyerPagination.last_page }">
                                <button
                                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 rounded-e-lg hover:text-gray-700"
                                    @click="loadData(buyerPagination.current_page + 1)"
                                    :disabled="buyerPagination.current_page === buyerPagination.last_page">
                                    Next
                                </button>
                            </li>
                        </ul>
                    </nav>
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
    name: 'Contract-Buy',
    data() {
        return {
            lists: {},
            buyerPagination: {},
        }
    },
    methods: {
        loadData(page = 1) {
            axios
                .get('api/transaction?page=' + page)
                .then(({ data }) => {
                    this.lists = data.data;
                    this.buyerPagination = data;
                });
        },
        formatDate(date) {
            const options = { day: 'numeric', month: 'numeric', year: 'numeric' };
            return new Date(date).toLocaleDateString('id-ID', options);
        },
    },
    mounted() {
        this.loadData();
    },
    created() {
    }
}
</script>

<style scoped>
/* * {
    border: 1px solid red;
} */
</style>
