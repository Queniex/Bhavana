<template>
    <div class="container">
        <div class="row justify-content-center mx-5 text-black mt-3">
            <span class="user fw-bold fs-3 mb-2">Kelola Kontrak Penjualan (Buyer)</span>
            <div class="user">
                <table class="table align-middle bg-white">
                    <thead class="bg-warning">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nomor Order</th>
                            <th class="text-center">Info Pembeli</th>
                            <th class="text-center">Tanggal Kontrak</th>
                            <th class="text-center">Status Order</th>
                            <th class="text-center">Aksi</th>
                            <th class="text-center">Kontrak</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-if="lists.length === 0">
                            <td colspan="6" class="text-center">Tidak terdapat data</td>
                        </tr>
                        <tr v-for="(list, index) in lists" :key="list.No_Req">
                            <td class="text-center">{{ index + 1 }}</td>
                            <td>
                                <div class="ms-1 text-center">
                                    <p class="fw-bold mb-1">MX{{ list.No_Req }}BSD9009</p>
                                </div>
                            </td>
                            <td>
                                <div class="ms-1 text-center">
                                    <p class="mb-1">Email : {{ list.Email }}</p>
                                    <p class="mb-1">No_Telp : {{ list.No_Telp }}</p>
                                </div>
                            </td>
                            <td>
                                <div class="ms-1 text-center">
                                    <p class="mb-1">Awal : {{ formatDate(list.Awal_Kontrak) }}</p>
                                    <p class="mb-1">Akhir : {{ formatDate(list.Akhir_Kontrak) }}</p>
                                </div>
                            </td>
                            <td>
                                <div class="ms-1 text-center">
                                    <span
                                        :class="{ 'badge': true, 'rounded-pill': true, 'text-bg-success': list.Status_Req === 'Accept', 'text-bg-warning': list.Status_Req === 'Pending', 'text-bg-danger': list.Status_Req === 'Decline' }">{{
                                            list.Status_Req }}</span>
                                </div>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-primary" @click="detailModal(list.No_Req)">
                                    Detail
                                </button>
                                <div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">MX{{ modalData.No_Req
                                                }}BSD9009 || Status
                                                    Request :
                                                    <span
                                                        :class="{ 'badge': true, 'rounded-pill': true, 'text-bg-success': modalData.Status_Req === 'Accept', 'text-bg-warning': modalData.Status_Req === 'Pending', 'text-bg-danger': modalData.Status_Req === 'Decline' }">{{
                                                            modalData.Status_Req }}</span>
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-md-12">

                                                    <div class="card mb-1">
                                                        <div class="card-body border border-black bg-warning rounded-3">
                                                            <div class="row">
                                                                <div class="col-sm-5">
                                                                    <h6 class="mb-0 fw-bold">Username Pembeli : </h6>
                                                                </div>
                                                                <div class="col-sm-7 text-secondary">
                                                                    {{ modalData.Username }}
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-sm-5">
                                                                    <h6 class="mb-0 fw-bold">Alamat Pembeli : </h6>
                                                                </div>
                                                                <div class="col-sm-7 text-secondary">
                                                                    {{ modalData.Alamat }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card mb-1">
                                                        <div class="card-body border border-black rounded-3">
                                                            <div class="row">
                                                                <div class="col-sm-5">
                                                                    <h6 class="mb-0 fw-bold mt-2">Nama Barang</h6>
                                                                </div>
                                                                <div class="col-sm-7 text-secondary">
                                                                    {{ modalData.Nama_Jenis }}
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-sm-5">
                                                                    <h6 class="mb-0 fw-bold mt-2">Kode CPO</h6>
                                                                </div>
                                                                <div class="col-sm-7 text-secondary">
                                                                    {{ modalData.Kode_Jenis }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card mb-1">
                                                        <div class="card-body border border-black bg-warning rounded-3">
                                                            <div class="row">
                                                                <div class="col-sm-5">
                                                                    <h6 class="mb-0 fw-bold">Kuantitas Terbeli </h6>
                                                                </div>
                                                                <div class="col-sm-7 text-secondary">
                                                                    {{ modalData.QTY }} Liter
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-sm-5">
                                                                    <h6 class="mb-0 fw-bold mt-2">Estimasi Pemasukan</h6>
                                                                </div>
                                                                <div class="col-sm-7 text-secondary">
                                                                    Rp {{
                                                                        (modalData.Harjul_Barang - modalData.Harpok_Barang) *
                                                                        modalData.QTY
                                                                    }}
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-sm-5">
                                                                    <h6 class="mb-0 fw-bold mt-2">Status Contract</h6>
                                                                </div>
                                                                <div class="col-sm-7 text-secondary">
                                                                    <span v-if="modalData.Contract_Buy === null">Kontrak
                                                                        Belum Terbit</span>
                                                                    <span v-else>{{ modalData.Contract_Buy }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button v-if="modalData.Contract_Buy !== null" type="button"
                                                        class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                    <button v-if="modalData.Contract_Buy === null" type="button"
                                                        class="btn btn-success"
                                                        @click="editStatus(modalData.No_Req, 'Accept')">Terbitkan</button>
                                                    <button v-if="modalData.Contract_Buy === null" type="button"
                                                        class="btn btn-danger"
                                                        @click="editStatus(modalData.No_Req, 'Decline')">Tolak</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                <span v-if="list.Contract_Buy === null">Kontrak Belum Terbit</span>
                                <span v-else-if="list.Contract_Buy === 'Decline'" class="text-danger">Kontrak Ditolak</span>
                                <span v-else-if="list.Contract_Buy === 'Accept'"><a
                                        :href="'/Contract-Buy/' + list.No_Req">Cek Kontrak</a></span>

                            </td>
                        </tr>
                    </tbody>
                </table>

                <nav>
                    <ul class="pagination">
                        <li class="page-item" :class="{ disabled: buyPagination.current_page === 1 }">
                            <button class="page-link" @click="loadRequest(buyPagination.current_page - 1)">Previous</button>
                        </li>
                        <li class="page-item" v-for="page in buyPagination.last_page" :key="page"
                            :class="{ active: page === buyPagination.current_page }">
                            <button class="page-link" @click="loadRequest(page)">{{ page }}</button>
                        </li>
                        <li class="page-item" :class="{ disabled: buyPagination.current_page === buyPagination.last_page }">
                            <button class="page-link" @click="loadRequest(buyPagination.current_page + 1)">Next</button>
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
    name: 'Selling',
    data() {
        return {
            statusModal: false,
            disabled: false,
            lists: {},
            modalData: {},
            buyPagination: {},
        }
    },
    methods: {
        formatDate(date) {
            const options = { day: 'numeric', month: 'numeric', year: 'numeric' };
            return new Date(date).toLocaleDateString('id-ID', options);
        },
        loadRequest(page = 1) {
            axios
                .get('api/contractBuyer?page=' + page)
                .then(({ data }) => {
                    this.lists = data.data;
                    this.buyPagination = data;
                });
        },
        detailModal(id) {
            axios.get(`api/transaction?idBuy=${id}`)
                .then(({ data }) => {
                    this.modalData = data;
                    $('#detail').modal('show');
                    // console.log(this.modalData.QTY);
                })
                .catch(error => {
                    console.error('Gagal memuat data:', error);
                });

            console.log('Show modal');
        },
        formatDate(date) {
            const options = { day: 'numeric', month: 'numeric', year: 'numeric' };
            return new Date(date).toLocaleDateString('id-ID', options);
        },
        editStatus(id, status) {
            axios
                .put(`api/updateContract?idBuy=${id}&status=${status}`)
                .then(response => {
                    console.log('Data berhasil diupdate');
                    $('#detail').modal('hide');
                    this.loadRequest();

                    Toast.fire({
                        icon: 'success',
                        title: 'Status Kontrak berhasil diupdate'
                    });
                    this.loading = false;
                    this.disabled = false;
                })
                .catch(error => {
                    console.error('Gagal mengupdate data:', error);
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
