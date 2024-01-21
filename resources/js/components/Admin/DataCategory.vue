<template>
    <div class="container">
        <div class="row">
            <div class="col justify-content-center mx-5 text-black mt-3">
                <span class="user fw-bold fs-3 mb-2 ms-1">Kelola Kategori Bhavana</span>
                <div class="user mb-3 ms-1">
                    <button class="btn btn-success" @click="addCategory()"><i class="ri-add-box-fill"></i> Tambah
                        Kategori</button>
                </div>
                <div class="mb-2">
                    <table class="table w-auto mb-0 bg-white text-center align-middle">
                        <thead class="bg-warning">
                            <tr>
                                <th>Kategori Produk</th>
                                <th>Foto Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="category in categories" :key="category.ID_Kategori">
                                <td>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <div class="ms-1">
                                            <p class="fw-bold mb-1">{{ category.Nama_Kategori }}</p>
                                            <p class="text-muted mb-0">MG{{ category.ID_Kategori }}B75</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <div class="ms-1">
                                            <img :src="'./images/user/' + category.Foto_Kategori" alt=""
                                                style="width: 45px; height: 45px" class="rounded-circle" />
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <button class="btn btn-warning mb-1" @click="editCategory(category)">Update</button>
                                        <button type="button" class="btn btn-danger ms-1"
                                            @click="delData(category.ID_Kategori)">Hapus</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- modal -->
                <div class="modal fade" id="category" tabindex="-1" aria-labelledby="categoryLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="categoryLabel" v-show="!statusModal">Tambah Kategori</h1>
                                <h1 class="modal-title fs-5" id="categoryLabel" v-show="statusModal">Edit Kategori</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form @submit.prevent=" statusModal ? editData() : saveData()" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="input-group has-validation mb-3">
                                        <div class="col-auto" v-show="!statusModal">
                                            <div class="form-floating">
                                                <input ref="fotoInput" type="file" @change="onFileChange"
                                                    class="form-control" id="floatingInputGroup3"
                                                    :class="{ 'is-invalid': form.errors.has('Foto_Kategori') }"
                                                    placeholder="Gambar">
                                                <div v-if="form.errors.has('Foto_Kategori')" class="text-danger"
                                                    v-html="form.errors.get('Foto_Kategori')" />
                                                <label for="floatingInputGroup3">Gambar</label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr v-show="!statusModal">

                                    <div class="input-group has-validation mb-3">
                                        <div class="form-floating">
                                            <input v-model="form.Nama_Kategori" type="text" class="form-control"
                                                id="floatingInputGroup2"
                                                :class="{ 'is-invalid': form.errors.has('Nama_Kategori') }"
                                                placeholder="Nama Kategori">
                                            <div v-if="form.errors.has('Nama_Kategori')" class="text-danger"
                                                v-html="form.errors.get('Nama_Kategori')" />
                                            <label for="floatingInputGroup2">Nama Kategori</label>
                                        </div>
                                    </div>

                                    <div class="input-group has-validation mb-3">
                                        <div class="form-floating">
                                            <textarea v-model="form.Keterangan" class="form-control"
                                                id="floatingInputGroup2"
                                                :class="{ 'is-invalid': form.errors.has('Keterangan') }"
                                                placeholder="Nama Kategori"> </textarea>
                                            <div v-if="form.errors.has('Keterangan')" class="text-danger"
                                                v-html="form.errors.get('Keterangan')" />
                                            <label for="floatingInputGroup2">Keterangan Kategori</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success" :disabled="disabled"
                                        v-show="!statusModal">Simpan</button>
                                    <button type="submit" class="btn btn-success" :disabled="disabled"
                                        v-show="statusModal">Ubah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <nav>
                    <ul class="pagination mt">
                        <li class="page-item" :class="{ disabled: categoryPagination.current_page === 1 }">
                            <button class="page-link"
                                @click="loadData(categoryPagination.current_page - 1)">Previous</button>
                        </li>
                        <li class="page-item" v-for="page in categoryPagination.last_page" :key="page"
                            :class="{ active: page === categoryPagination.current_page }">
                            <button class="page-link" @click="loadData(page)">{{ page }}</button>
                        </li>
                        <li class="page-item"
                            :class="{ disabled: categoryPagination.current_page === categoryPagination.last_page }">
                            <button class="page-link" @click="loadData(categoryPagination.current_page + 1)">Next</button>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="col justify-content-center mx-5 text-black mt-3">
                <span class="user fw-bold fs-3 mb-2 ms-1">Kelola Jenis Kategori</span>
                <div class="user mb-3 ms-1">
                    <button class="btn btn-success" @click="addJenis()"><i class="ri-add-box-fill"></i> Tambah
                        Jenis</button>
                </div>
                <div class="mb-2">
                    <table class="table w-auto mb-0 bg-white">
                        <thead class="bg-warning">
                            <tr>
                                <th>No</th>
                                <th>Jenis Kategori</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(theType, index) in types" :key="theType.ID_Jenis">
                                <th scope="row" class="text-center">{{ index + 1 }}</th>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="ms-1">
                                            <p class="fw-bold mb-1">{{ theType.Nama_Jenis }}</p>
                                            <p class="text-muted mb-0">{{ theType.Kode_Jenis }}</p>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <button class="btn btn-warning" @click="editJenis(theType)">
                                        Update</button>
                                    <button type="button" class="btn btn-danger" @click="delJenis(theType.ID_Jenis)">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- modal -->
                <div class="modal fade" id="jenis" tabindex="-1" aria-labelledby="jenisLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="jenisLabel" v-show="!statusModal">Tambah Jenis</h1>
                                <h1 class="modal-title fs-5" id="jenisLabel" v-show="statusModal">Edit Jenis</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form @submit.prevent=" statusModal ? editDataJenis() : saveDataJenis()"
                                enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="input-group has-validation mb-3">
                                        <select class="form-select" id="ID_Kategori" v-model="form.ID_Kategori"
                                            :class="{ 'is-invalid': form.errors.has('ID_Kategori') }">
                                            <option value>Pilih Kategori</option>
                                            <option v-for="category in categories" :key="category.ID_Kategori"
                                                :value="category.ID_Kategori">{{
                                                    category.Nama_Kategori }}</option>
                                        </select>
                                        <div v-if="form.errors.has('ID_Kategori')"
                                            v-html="form.errors.get('ID_Kategori')" />
                                    </div>

                                    <div class="input-group has-validation mb-3">
                                        <div class="form-floating">
                                            <input v-model="form.Nama_Jenis" type="text" class="form-control"
                                                id="floatingInputGroup2"
                                                :class="{ 'is-invalid': form.errors.has('Nama_Jenis') }"
                                                placeholder="Jenis Kategori">
                                            <div v-if="form.errors.has('Nama_Jenis')" class="text-danger"
                                                v-html="form.errors.get('Nama_Jenis')" />
                                            <label for="floatingInputGroup2">Nama Jenis</label>
                                        </div>
                                    </div>

                                    <div class="input-group has-validation">
                                        <div class="form-floating">
                                            <input v-model="form.Kode_Jenis" type="text" class="form-control"
                                                id="floatingInputGroup3"
                                                :class="{ 'is-invalid': form.errors.has('Kode_Jenis') }"
                                                placeholder="Jenis Satuan">
                                            <div v-if="form.errors.has('Kode_Jenis')" class="text-danger"
                                                v-html="form.errors.get('Kode_Jenis')" />
                                            <label for="floatingInputGroup3">Kode Jenis</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success" :disabled="disabled"
                                        v-show="!statusModal">Simpan</button>
                                    <button type="submit" class="btn btn-success" :disabled="disabled"
                                        v-show="statusModal">Ubah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <nav>
                    <ul class="pagination mt">
                        <li class="page-item" :class="{ disabled: typePagination.current_page === 1 }">
                            <button class="page-link"
                                @click="loadDataJenis(typePagination.current_page - 1)">Previous</button>
                        </li>
                        <li class="page-item" v-for="page in typePagination.last_page" :key="page"
                            :class="{ active: page === typePagination.current_page }">
                            <button class="page-link" @click="loadDataJenis(page)">{{ page }}</button>
                        </li>
                        <li class="page-item"
                            :class="{ disabled: typePagination.current_page === typePagination.last_page }">
                            <button class="page-link" @click="loadDataJenis(typePagination.current_page + 1)">Next</button>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import Form from 'vform';
const csrfToken = document.head.querySelector('meta[name="csrf-token"]');

if (csrfToken) {
    axios.defaults.headers.common['X-CSRF-TOKEN'] = csrfToken.content;
}

export default {
    name: 'User',
    data() {
        return {
            statusModal: false,
            disabled: false,
            form: new Form({
                ID_Kategori: "",
                ID_Jenis: "",
                Nama_Kategori: "",
                Nama_Jenis: "",
                Kode_Jenis: "",
                Foto_Kategori: "",
                Keterangan: "",
            }),
            categories: {},
            types: {},
            categoryPagination: {},
            typePagination: {},
        }
    },
    methods: {
        addCategory() {
            this.statusModal = false;
            this.form.reset();
            $("#category").modal("show");
        },
        editCategory(item) {
            this.statusModal = true;
            $("#category").modal("show");
            this.form.fill(item);
        },
        addJenis() {
            this.statusModal = false;
            this.form.reset();
            $("#jenis").modal("show");
        },
        editJenis(item) {
            this.statusModal = true;
            $("#jenis").modal("show");
            this.form.fill(item);
        },
        loadData(page = 1) {
            axios
                .get('api/category?page=' + page)
                .then(({ data }) => {
                    this.categories = data.data;
                    this.categoryPagination = data;
                });
        },
        loadDataJenis(page = 1) {
            axios
                .get('api/jenis?page=' + page)
                .then(({ data }) => {
                    this.types = data.data;
                    this.typePagination = data;
                });
        },
        saveData() {
            this.disabled = true;
            this.form
                .post('api/category')
                .then(response => {
                    // Handle success here
                    console.log(response.data);
                    $("#category").modal("hide");
                    this.loadData();
                    this.$refs.fotoInput.value = null;

                    Toast.fire({
                        icon: 'success',
                        title: 'Data berhasil ditambahkan'
                    });
                    this.loading = false;
                    this.disabled = false;
                })
                .catch(error => {
                    this.disabled = false;
                    console.error(error);
                });
        },
        editData() {
            const id = this.form.ID_Kategori;
            this.disabled = true;
            this.form
                .put('api/category/' + id)
                .then(response => {
                    // Handle success here
                    console.log(response.data);
                    $("#category").modal("hide");
                    this.loadData();

                    Toast.fire({
                        icon: 'success',
                        title: 'Data berhasil diupdate'
                    });
                    this.loading = false;
                    this.disabled = false;
                })
                .catch(error => {
                    this.disabled = false;
                    console.error(error);
                });
        },
        onFileChange(event) {
            this.form.Foto_Kategori = event.target.files[0];
            console.log(event.target.files[0]);
        },
        saveDataJenis() {
            this.disabled = true;
            this.form
                .post('api/jenis')
                .then(response => {
                    // Handle success here
                    console.log(response.data);
                    $("#jenis").modal("hide");
                    this.loadDataJenis();

                    Toast.fire({
                        icon: 'success',
                        title: 'Data berhasil ditambahkan'
                    });
                    this.loading = false;
                    this.disabled = false;
                })
                .catch(error => {
                    this.disabled = false;
                    console.error(error);
                });
        },
        editDataJenis() {
            const id = this.form.ID_Jenis;
            this.disabled = true;
            this.form
                .put('api/jenis/' + id)
                .then(response => {
                    // Handle success here
                    console.log(response.data);
                    $("#jenis").modal("hide");
                    this.loadDataJenis();

                    Toast.fire({
                        icon: 'success',
                        title: 'Data berhasil diupdate'
                    });
                    this.loading = false;
                    this.disabled = false;
                })
                .catch(error => {
                    this.disabled = false;
                    console.error(error);
                });
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
                        .delete("api/category/" + id)
                        .then(() => {
                            Swal.fire(
                                "Terhapus",
                                "Data berhasil terhapus",
                                "success"
                            );
                            this.loadData();
                            this.loadDataJenis();
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
        delJenis(id) {
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
                        .delete("api/jenis/" + id)
                        .then(() => {
                            Swal.fire(
                                "Terhapus",
                                "Data berhasil terhapus",
                                "success"
                            );
                            this.loadData();
                            this.loadDataJenis();
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
        }
    },
    created() {
        this.loadData();
        this.loadDataJenis();
    }
}
</script>

<style scoped>
/* * {
    border: 1px solid red;
} */
</style>
