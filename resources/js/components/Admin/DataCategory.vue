<template>
    <div class="container">
        <div class="row justify-content-center mx-5 text-black mt-3">
            <span class="user fw-bold fs-3 mb-2">Kelola Kategori Bhavana</span>
            <div class="user mb-3">
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                        class="ri-add-box-fill"></i> Tambah Kategori</button>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="">
                                <div class="modal-body">
                                    <div class="input-group has-validation">
                                        <div class="form-floating is-invalid">
                                            <input type="text" class="form-control is-invalid" id="floatingInputGroup2"
                                                placeholder="Username" required>
                                            <label for="floatingInputGroup2">Jenis Kategori</label>
                                        </div>
                                        <div class="invalid-feedback">
                                            Kategori sudah ada.
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table align-middle mb-0 bg-white">
                <thead class="bg-warning">
                    <tr>
                        <th>Jenis Kategori</th>
                        <th>Jumlah Produk</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="ms-1">
                                    <p class="fw-bold mb-1">Kelapa Sawit</p>
                                    <p class="text-muted mb-0">MG120876</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">400</p>
                        </td>
                        <td>
                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Update</button>

                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Update Kategori</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="">
                                            <div class="modal-body">
                                                <div class="input-group has-validation">
                                                    <div class="form-floating is-invalid">
                                                        <input type="text" class="form-control is-invalid"
                                                            id="floatingInputGroup2" placeholder="Username" required>
                                                        <label for="floatingInputGroup2">Jenis Kategori</label>
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Kategori sudah ada.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-success">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
