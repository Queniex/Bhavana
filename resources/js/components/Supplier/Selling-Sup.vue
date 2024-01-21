<template>
    <div class="container">
        <div class="row justify-content-center mx-5 text-black mt-3">
            <span class="user fw-bold fs-3 mb-2">Kelola Request Penjualan</span>
            <div class="user">
                <table class="table align-middle bg-white">
                    <thead class="bg-warning">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nomor Order</th>
                            <th class="text-center">Product</th>
                            <th class="text-center">Info Product</th>
                            <th class="text-center">Jangka Order</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-if="lists.length === 0">
                            <td colspan="6" class="text-center">Tidak terdapat data</td>
                        </tr>
                        <tr v-for="(list, index) in lists" :key="list.No_Req">
                            <td class="text-center">{{ index + 1 }}</td>
                            <td>
                                <div class="ms-1">
                                    <p class="fw-bold mb-1">MX{{ list.ID_Req }}BSD9009</p>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center justify-content-center">
                                    <div class="ms-1 text-center">
                                        <p class="fw-bold mb-1">{{ list.Nama_Jenis }}</p>
                                        <p class="text-muted mb-0">{{ list.Kode_Jenis }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                <p class="text-muted mb-0">QTY : {{ list.QTY }} L</p>
                                <p class="fw-normal mb-1">Pendapatan : Rp {{ list.Pendapatan }}</p>
                            </td>
                            <td class="text-center">
                                <p class="text-muted mb-0">{{ formatDate(list.Awal_Kontrak) }} - {{
                                    formatDate(list.Akhir_Kontrak) }}
                                </p>
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center">
                                    <button type="button" class="btn btn-success me-2"
                                        @click="accRequest(list.ID_Req, 'Accept')">
                                        Terima
                                    </button>
                                    <button type="button" class="btn btn-danger"
                                        @click="decRequest(list.ID_Req, 'Decline')">
                                        Tolak
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <nav>
                    <ul class="pagination">
                        <li class="page-item" :class="{ disabled: supPagination.current_page === 1 }">
                            <button class="page-link" @click="loadRequest(supPagination.current_page - 1)">Previous</button>
                        </li>
                        <li class="page-item" v-for="page in supPagination.last_page" :key="page"
                            :class="{ active: page === supPagination.current_page }">
                            <button class="page-link" @click="loadRequest(page)">{{ page }}</button>
                        </li>
                        <li class="page-item" :class="{ disabled: supPagination.current_page === supPagination.last_page }">
                            <button class="page-link" @click="loadRequest(supPagination.current_page + 1)">Next</button>
                        </li>
                    </ul>
                </nav>

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
    name: 'Selling-Sup',
    data() {
        return {
            statusModal: false,
            disabled: false,
            lists: {},
            supPagination: {},
        }
    },
    methods: {
        formatDate(date) {
            const options = { day: 'numeric', month: 'numeric', year: 'numeric' };
            return new Date(date).toLocaleDateString('id-ID', options);
        },
        loadRequest(page = 1) {
            axios
                .get('/buyerRequest?page=' + page)
                .then(({ data }) => {
                    this.lists = data.data;
                    this.supPagination = data;
                });
        },
        accRequest(id, status) {
            Swal.fire({
                title: "Konfirmasi Terima Order Ini",
                text: "Menerima berarti menaati persyaratan jual-beli! Sihlakan baca kembali aturan pada dashboard.",
                icon: "success",
                showCancelButton: true,
                confirmButtonColor: "#14A44D",
                cancelButtonColor: "#3B71CA",
                confirmButtonText: "Terima",
                cancelButtonText: "Kembali"
            }).then(result => {
                if (result.value) {
                    axios
                        .put('api/transaction/' + id, { status: status })
                        .then(() => {
                            Swal.fire(
                                "Diterima",
                                "Order berhasil diterima!",
                                "success"
                            );
                            this.loadRequest();
                            this.$router.push({ name: 'Contract-Sup' });
                        })
                        .catch(() => {
                            Swal.fire(
                                "Gagal",
                                "Terjadi Error!",
                                "warning"
                            );
                        });
                }
            });
        },
        decRequest(id, status) {
            Swal.fire({
                title: "Konfirmasi Tolak Order Ini",
                text: "Menyadari bahwa tindakan ini tidak bisa dikembalikan.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DC4C64",
                cancelButtonColor: "#3B71CA",
                confirmButtonText: "Tolak",
                cancelButtonText: "Kembali"
            }).then(result => {
                if (result.value) {
                    axios
                        .put('api/transaction/' + id, { status: status })
                        .then(() => {
                            Swal.fire(
                                "Ditolak",
                                "Order telah ditolak!",
                                "success"
                            );
                            this.loadRequest();
                        })
                        .catch(() => {
                            Swal.fire(
                                "Gagal",
                                "Terjadi Error!",
                                "warning"
                            );
                        });
                }
            });
        },
    },
    created() {
        this.loadRequest();
    }
}
</script>

<style scoped>
/* * {
    border: 1px solid red;
} */
</style>
