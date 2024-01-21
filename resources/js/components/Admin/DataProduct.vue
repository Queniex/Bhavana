<template>
    <div class="container">
        <div class="row justify-content-center mx-5 text-black mt-3">
            <span class="user fw-bold fs-3 mb-2">Kelola Produk Bhavana</span>
            <div class="user mb-3">
                <table class="table align-middle mt-3 bg-white">
                    <thead class="bg-warning">
                        <tr>
                            <th>Nama Barang</th>
                            <th>Info Barang</th>
                            <th>Status Barang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="product in productsAccept" :key="product.ID_Product">
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="ms-1">
                                        <p class="fw-bold mb-1">{{ product.Nama_Jenis }}</p>
                                        <p class="text-muted mb-0">MG120{{ product.ID_Product }}76</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-muted mb-0">Jumlah Stok : {{ product.Stok_Barang }} L</p>
                                <p class="fw-normal mb-1">Harga Jual : Rp {{ currencyFormat(product.Harpok_Barang) }} /L
                                </p>
                            </td>
                            <td>
                                <span
                                    :class="{ 'badge': true, 'rounded-pill': true, 'text-bg-success': product.Status === 'Accept', 'text-bg-warning': product.Status === 'Pending', 'text-bg-danger': product.Status === 'Decline' }">{{
                                        product.Status }}</span>
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary" @click="detailModal(product.ID_Product)">
                                    Detail
                                </button>
                                <button type="button" class="btn btn-danger" @click="delData(product.ID_Product)">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <nav>
                    <ul class="pagination">
                        <li class="page-item" :class="{ disabled: productAcceptPagination.current_page === 1 }">
                            <button class="page-link"
                                @click="loadAcceptData(productAcceptPagination.current_page - 1)">Previous</button>
                        </li>
                        <li class="page-item" v-for="page in productAcceptPagination.last_page" :key="page"
                            :class="{ active: page === productAcceptPagination.current_page }">
                            <button class="page-link" @click="loadAcceptData(page)">{{ page }}</button>
                        </li>
                        <li class="page-item"
                            :class="{ disabled: productAcceptPagination.current_page === productAcceptPagination.last_page }">
                            <button class="page-link"
                                @click="loadAcceptData(productAcceptPagination.current_page + 1)">Next</button>
                        </li>
                    </ul>
                </nav>

                <table class="table align-middle mt-3 bg-white">
                    <thead class="bg-warning">
                        <tr>
                            <th>Nama Barang</th>
                            <th>Info Barang</th>
                            <th>Status Barang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="product in productsPending" :key="product.ID_Product">
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="ms-1">
                                        <p class="fw-bold mb-1">{{ product.Nama_Jenis }}</p>
                                        <p class="text-muted mb-0">MG120{{ product.ID_Product }}76</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-muted mb-0">Jumlah Stok : {{ product.Stok_Barang }} L</p>
                                <p class="fw-normal mb-1">Harga Jual : Rp {{ currencyFormat(product.Harpok_Barang) }} /L
                                </p>
                            </td>
                            <td>
                                <span
                                    :class="{ 'badge': true, 'rounded-pill': true, 'text-bg-success': product.Status === 'Accept', 'text-bg-warning': product.Status === 'Pending', 'text-bg-danger': product.Status === 'Decline' }">{{
                                        product.Status }}</span>
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary" @click="detailModal(product.ID_Product)">
                                    Detail
                                </button>
                                <button type="button" class="btn btn-danger" @click="delData(product.ID_Product)">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <nav>
                    <ul class="pagination">
                        <li class="page-item" :class="{ disabled: productPendingPagination.current_page === 1 }">
                            <button class="page-link"
                                @click="loadPendingData(productPendingPagination.current_page - 1)">Previous</button>
                        </li>
                        <li class="page-item" v-for="page in productPendingPagination.last_page" :key="page"
                            :class="{ active: page === productPendingPagination.current_page }">
                            <button class="page-link" @click="loadPendingData(page)">{{ page }}</button>
                        </li>
                        <li class="page-item"
                            :class="{ disabled: productPendingPagination.current_page === productPendingPagination.last_page }">
                            <button class="page-link"
                                @click="loadPendingData(productPagination.current_page + 1)">Next</button>
                        </li>
                    </ul>
                </nav>
                <div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">ID Akun : {{
                                    modalData.ID_Akun }}
                                    ||
                                    <span
                                        :class="{ 'badge': true, 'rounded-pill': true, 'text-bg-success': modalData.Status === 'Accept', 'text-bg-warning': modalData.Status === 'Pending', 'text-bg-danger': modalData.Status === 'Decline' }">{{
                                            modalData.Status }}</span>
                                </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="col-md-12">
                                    <div class="card mb-1">
                                        <div class="card-body border border-black bg-warning rounded-3">
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <h6 class="mb-0 fw-bold">Jumlah Terjual </h6>
                                                </div>
                                                <div class="col-sm-7 text-secondary">
                                                    20 Liter
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <h6 class="mb-0 fw-bold mt-2">Jumlah Pemasukan</h6>
                                                </div>
                                                <div class="col-sm-7 text-secondary">
                                                    Rp 200.000
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card mb-3">
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
                                                    <h6 class="mb-0 fw-bold mt-2">Kode {{
                                                        modalData.Nama_Jenis }}</h6>
                                                </div>
                                                <div class="col-sm-7 text-secondary">
                                                    {{ modalData.Kode_Jenis }}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <h6 class="mb-0 fw-bold mt-2">Satuan Barang</h6>
                                                </div>
                                                <div class="col-sm-7 text-secondary">
                                                    Liter
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <h6 class="mb-0 fw-bold mt-2">Kuantitas Stok</h6>
                                                </div>
                                                <div class="col-sm-7 text-secondary">
                                                    {{ modalData.Stok_Barang }}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <h6 class="mb-0 fw-bold mt-2">Harga Jual || Harga Pokok
                                                    </h6>
                                                </div>
                                                <div class="col-sm-7 text-secondary">
                                                    Rp {{ modalData.Harjul_Barang }} || Rp {{
                                                        modalData.Harpok_Barang }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex gap-2 justify-content-end">
                                        <button v-if="modalData.Status === 'Pending'" type="button" class="btn btn-success"
                                            @click="editStatus(modalData.ID_Product, 'Accept')">Accept</button>
                                        <button v-if="modalData.Status === 'Pending'" type="button" class="btn btn-danger"
                                            @click="editStatus(modalData.ID_Product, 'Decline')">Decline</button>
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
import axios from 'axios';
const csrfToken = document.head.querySelector('meta[name="csrf-token"]');

if (csrfToken) {
    axios.defaults.headers.common['X-CSRF-TOKEN'] = csrfToken.content;
}

export default {
    name: 'Product',
    data() {
        return {
            // statusModal: false,
            // disabled: false,
            form: new Form({
                ID_Product: "",
                ID_Akun: "",
                ID_Kategori: "",
                Nama_Barang: "",
                Harpok_Barang: "",
                Satuan_Barang: "",
                Stok_Barang: "",
            }),
            productsAccept: {},
            productsPending: {},
            productAcceptPagination: {},
            productPendingPagination: {},
            modalData: {},
        }
    },
    methods: {
        loadAcceptData(page = 1) {
            axios
                .get('api/product?Status=Accept&page=' + page)
                .then(({ data }) => {
                    this.productsAccept = data.data;
                    this.productAcceptPagination = data;
                });
        },
        currencyFormat(value) {
            // Lakukan formatting nilai ke format mata uang dengan pemisah ribuan
            return value.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
        },
        loadPendingData(page = 1) {
            axios
                .get('api/product?Status=Pending&page=' + page)
                .then(({ data }) => {
                    this.productsPending = data.data;
                    this.productPendingPagination = data;
                });
        },
        detailModal(id) {
            axios.get(`api/product?id=${id}`)
                .then(({ data }) => {
                    this.modalData = data;
                    $('#detail').modal('show');
                    // console.log(this.modalData);
                })
                .catch(error => {
                    console.error('Gagal memuat data:', error);
                });
            console.log('Show modal');
        },
        delData(id) {
            Swal.fire({
                title: "Apakah kamu yakin?",
                text: "Hal ini tidak bisa dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Delete"
            }).then(result => {
                if (result.value) {
                    axios
                        .delete("api/product/" + id)
                        .then(() => {
                            Swal.fire(
                                "Terhapus",
                                "Data berhasil terhapus",
                                "success"
                            );
                            this.loadAcceptData();
                            this.loadPendingData();
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
        editStatus(id, status) {
            axios
                .put('api/product/' + id, { status: status })
                .then(response => {
                    console.log('Data berhasil diupdate');
                    $('#detail').modal('hide');
                    this.loadAcceptData();
                    this.loadPendingData();

                    Toast.fire({
                        icon: 'success',
                        title: 'Status berhasil diupdate'
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
        // this.loadProductData();
        this.loadAcceptData();
        this.loadPendingData();
    }
}
</script>

<style scoped>
/* * {
    border: 1px solid red;
} */
</style>
