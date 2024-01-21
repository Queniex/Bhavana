<template>
    <div class="container">
        <div class="row justify-content-center mx-5 text-black mt-3">
            <span class="user fw-bold fs-3 mb-2">Kelola Produk Bhavana</span>
            <div class="user mb-3">
                <button class="btn btn-success" @click="addProduct()"><i class="ri-add-box-fill"></i> Tambah
                    Produk</button>
                <div class="modal fade" id="produk" tabindex="-1" aria-labelledby="produkLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="categoryLabel" v-show="!statusModal">Tambah Kategori</h1>
                                <h1 class="modal-title fs-5" id="categoryLabel" v-show="statusModal">Edit Kategori</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <form enctype="multipart/form-data" class="row g-2 align-items-center"
                                    @submit.prevent=" statusModal ? editData() : saveData()">
                                    <input type="hidden" v-model="form.ID_Akun" name="ID_Akun" value="7">
                                    <input type="hidden" v-model="form.Status" name="Status" value="Pending">
                                    <!-- <div class="col-auto" v-show="!statusModal">
                                        <div class="form-floating">
                                            <input ref="fotoInput" type="file" @change="onFileChange" class="form-control"
                                                id="floatingInputGroup3" :class="{ 'is-invalid': form.errors.has('Foto') }"
                                                placeholder="Gambar">
                                            <div v-if="form.errors.has('Foto')" class="text-danger"
                                                v-html="form.errors.get('Foto')" />
                                            <label for="floatingInputGroup3">Gambar</label>
                                        </div>
                                    </div> -->
                                    <!-- <hr v-show="!statusModal"> -->
                                    <div class="col" v-show="!statusModal">
                                        <div class="input-group has-validation mb-3">
                                            <select class="form-select" id="ID_Kategori" v-model="form.ID_Kategori"
                                                @change="loadDataType"
                                                :class="{ 'is-invalid': form.errors.has('ID_Kategori') }">
                                                <option value>Pilih Kategori</option>
                                                <option v-for="category in categories" :key="category.ID_Kategori"
                                                    :value="category.ID_Kategori">{{
                                                        category.Nama_Kategori }}</option>
                                            </select>
                                            <div v-if="form.errors.has('ID_Kategori')"
                                                v-html="form.errors.get('ID_Kategori')" />
                                        </div>
                                    </div>
                                    <div class="col" v-show="!statusModal">
                                        <div class="input-group has-validation mb-3" v-if="form.ID_Kategori">
                                            <select class="form-select" id="ID_Jenis" v-model="form.ID_Jenis"
                                                :class="{ 'is-invalid': form.errors.has('ID_Jenis') }">
                                                <option value>Pilih Jenis</option>
                                                <option v-for="theType in types" :key="theType.ID_Jenis"
                                                    :value="theType.ID_Jenis">{{
                                                        theType.Nama_Jenis }}</option>
                                            </select>
                                            <div v-if="form.errors.has('ID_Jenis')" v-html="form.errors.get('ID_Jenis')" />
                                        </div>
                                    </div>
                                    <hr v-show="!statusModal">
                                    <div class="col-md">
                                        <label for="inputAddress" class="form-label">Stok Barang <span
                                                class="text-success">(Liter)</span></label>
                                        <input type="text" v-model="form.Stok_Barang"
                                            :class="{ 'is-invalid': form.errors.has('Stok_Barang') }"
                                            class="form-control border border-black" id="inputAddress" placeholder="1000">
                                        <div v-if="form.errors.has('Stok_Barang')" class="text-danger"
                                            v-html="form.errors.get('Stok_Barang')" />
                                    </div>
                                    <div class="col-md">
                                        <label for="inputAddress" class="form-label">Harga Barang<span class="text-success">
                                                (Per Liter)</span></label>
                                        <input type="text" v-model="form.Harpok_Barang"
                                            :class="{ 'is-invalid': form.errors.has('Harpok_Barang') }"
                                            class="form-control border border-black" id="inputAddress" placeholder="12000">
                                        <div v-if="form.errors.has('Harpok_Barang')" class="text-danger"
                                            v-html="form.errors.get('Harpok_Barang')" />
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
                </div>
                <table class="table align-middle mt-3 bg-white">
                    <thead class="bg-warning">
                        <tr>
                            <th>No</th>
                            <th>Foto Barang</th>
                            <th>Nama Barang</th>
                            <th>Info Barang</th>
                            <!-- <th>Info Penjualan</th> -->
                            <th>Status Barang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-if="products.length === 0">
                            <td colspan="6" class="text-center">Tidak terdapat data</td>
                        </tr>
                        <tr v-for="(product, index) in products" :key="product.ID_Product">
                            <th scope="row" class="text-center">{{ index + 1 }}</th>
                            <td>
                                <img :src="'./images/user/' + product.Foto_Kategori" alt=""
                                    style="width: 135px; height: 70px">
                            </td>
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
                                <p class="fw-normal mb-1">Harga Jual : Rp {{ currencyFormat(product.Harpok_Barang) }} /L</p>
                            </td>
                            <!-- <td>
                                <p class="text-muted mb-0">Jumlah Terjual : 20 {{ product.Satuan_Barang }}</p>
                                <p class="fw-normal mb-1">Total Pemasukan : Rp 200.000 </p>
                            </td> -->
                            <td>
                                <span
                                    :class="{ 'badge': true, 'rounded-pill': true, 'text-bg-success': product.Status === 'Accept', 'text-bg-warning': product.Status === 'Pending', 'text-bg-danger': product.Status === 'Decline' }">{{
                                        product.Status }}</span>
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary" @click="detailModal(product.ID_Product)">
                                    Detail
                                </button>
                                <div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">MG120{{
                                                    modalData.ID_Product }}76 ||
                                                    <span
                                                        :class="{ 'badge': true, 'rounded-pill': true, 'text-bg-success': modalData.Status === 'Accept', 'text-bg-warning': modalData.Status === 'Pending', 'text-bg-danger': modalData.Status === 'Decline' }">{{
                                                            modalData.Status }}</span>
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
                                                                    <h6 class="mb-0 fw-bold mt-2">Harga Jual</h6>
                                                                </div>
                                                                <div class="col-sm-7 text-secondary">
                                                                    Rp {{ modalData.Harpok_Barang }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-end">
                                                        <button type="button" class="btn btn-warning"
                                                            @click="editProduct(modalData)">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-danger" @click="delData(product.ID_Product)">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <nav>
                    <ul class="pagination">
                        <li class="page-item" :class="{ disabled: productPagination.current_page === 1 }">
                            <button class="page-link"
                                @click="loadProductData(productPagination.current_page - 1)">Previous</button>
                        </li>
                        <li class="page-item" v-for="page in productPagination.last_page" :key="page"
                            :class="{ active: page === productPagination.current_page }">
                            <button class="page-link" @click="loadProductData(page)">{{ page }}</button>
                        </li>
                        <li class="page-item"
                            :class="{ disabled: productPagination.current_page === productPagination.last_page }">
                            <button class="page-link"
                                @click="loadProductData(productPagination.current_page + 1)">Next</button>
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
    name: 'Product',
    data() {
        return {
            statusModal: false,
            disabled: false,
            form: new Form({
                ID_Product: "",
                ID_Akun: "",
                ID_Kategori: "",
                ID_Jenis: "",
                Harpok_Barang: "",
                Stok_Barang: "",
                Status: "",
                // Foto: "",
            }),
            products: {},
            productPagination: {},
            modalData: {},
            categories: {},
            types: {},
        }
    },
    methods: {
        loadData() {
            axios
                .get('api/category')
                .then(({ data }) => { this.categories = data });
        },
        loadDataType() {
            axios
                .get(`api/jenis?id=${this.form.ID_Kategori}`)
                .then(({ data }) => { this.types = data });
        },
        loadProductData(page = 1) {
            axios
                .get('/ProductDetail?page=' + page)
                .then(({ data }) => {
                    this.products = data.data;
                    this.productPagination = data;
                });
        },
        // onFileChange(event) {
        //     this.form.Foto = event.target.files[0];
        //     console.log(event.target.files[0]);
        // },
        addProduct() {
            this.statusModal = false;
            // this.$refs.fotoInput.value = null;
            this.form.reset();
            $("#produk").modal("show");
        },
        editProduct(item) {
            this.statusModal = true;
            $("#produk").modal("show");
            $("#detail").modal("hide");
            this.form.fill(item);
        },
        saveData() {
            this.disabled = true;
            console.log(this.form);
            this.form
                .post('/ProductStore')
                .then(response => {
                    // Handle success here
                    console.log(response.data);
                    $("#produk").modal("hide");

                    Toast.fire({
                        icon: 'success',
                        title: 'Data berhasil ditambahkan'
                    });
                    this.loading = false;
                    this.disabled = false;

                    this.loadProductData();
                })
                .catch(error => {
                    this.disabled = false;
                    console.error(error);
                });
        },
        editData() {
            const id = this.form.ID_Product;
            this.disabled = true;
            console.log(this.form);
            this.form
                .put('api/product/' + id)
                .then(response => {
                    console.log(response.data);
                    $("#produk").modal("hide");
                    this.loadProductData();
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
        currencyFormat(value) {
            // Lakukan formatting nilai ke format mata uang dengan pemisah ribuan
            return value.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
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
                            this.loadProductData();
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
        this.loadProductData();
        this.loadData();
    }
}
</script>

<style scoped>
/* * {
    border: 1px solid red;
} */
</style>
