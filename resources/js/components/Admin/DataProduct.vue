<template>
    <div class="container">
        <div class="row justify-content-center mx-5 text-black mt-3">
            <span class="user fw-bold fs-3 mb-2">Kelola Produk Bhavana</span>
            <table class="table align-middle mb-0 bg-white">
                <thead class="bg-warning">
                    <tr>
                        <th>Nama Barang</th>
                        <th>Kategori Barang</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="ms-1">
                                    <p class="fw-bold mb-1">Minyak Goreng C</p>
                                    <p class="text-muted mb-0">MG120876</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">Kelapa Sawit</p>
                        </td>
                        <td>
                            <span class="badge rounded-pill text-bg-danger">Active</span>
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Detail
                            </button>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">ID Barang ||
                                                <span class="badge text-bg-warning">status</span>
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
                                                                <h6 class="mb-0 fw-bold">Username</h6>
                                                            </div>
                                                            <div class="col-sm-7 text-secondary">
                                                                Kenneth Valdez
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-5">
                                                                <h6 class="mb-0 fw-bold mt-2">Nama Perusahaan</h6>
                                                            </div>
                                                            <div class="col-sm-7 text-secondary">
                                                                PT.Redaksa
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
                                                                Minyak Sawit A
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-5">
                                                                <h6 class="mb-0 fw-bold mt-2">Kategori Barang</h6>
                                                            </div>
                                                            <div class="col-sm-7 text-secondary">
                                                                Kelapa Sawit
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
                                                                500
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-5">
                                                                <h6 class="mb-0 fw-bold mt-2">Harga Jual</h6>
                                                            </div>
                                                            <div class="col-sm-7 text-secondary">
                                                                Rp 12.000
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-end">
                                                    <button type="button" class="btn btn-success">Accept</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-danger">
                                Hapus
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="ms-1">
                                    <p class="fw-bold mb-1">Minyak Goreng A</p>
                                    <p class="text-muted mb-0">MG120876</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">Kelapa Sawit</p>
                        </td>
                        <td>
                            <span class="badge rounded-pill text-bg-danger">Active</span>
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary">
                                Detail
                            </button>
                            <button type="button" class="btn btn-danger">
                                Hapus
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="ms-1">
                                    <p class="fw-bold mb-1">Minyak Goreng B</p>
                                    <p class="text-muted mb-0">MG120876</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">Kelapa Sawit</p>
                        </td>
                        <td>
                            <span class="badge rounded-pill text-bg-danger">Active</span>
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary">
                                Detail
                            </button>
                            <button type="button" class="btn btn-danger">
                                Hapus
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
// import axios from 'axios';

export default {
    name: 'User',
    data() {
        return {
            levels: {},
        }
    },
    methods: {
        loadData() {
        }
    },
    created() {
        this.loadData();
    }
}
</script>

<style scoped>
/* * {
    border: 1px solid red;
} */
</style>
