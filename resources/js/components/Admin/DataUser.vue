<template>
    <div class="container">
        <div class="row justify-content-center mx-5 text-black mt-3">
            <span class="user fw-bold fs-3 mb-2">Kelola Akun Pengguna</span>
            <table class="table align-middle bg-white mb-3">
                <thead class="bg-warning">
                    <tr>
                        <th>Name</th>
                        <th>Info</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in supplierUsers" :key="item.ID_Akun">
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="images/system/profile-sup.gif" alt="" style="width: 45px; height: 45px"
                                    class="rounded-circle" />
                                <div class="ms-3">
                                    <p class="fw-bold mb-1">{{ item.Username }}</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ item.Email }}</p>
                            <p class="text-muted mb-0">{{ item.No_Telp }}</p>
                        </td>
                        <td>{{ item.Peran }}</td>
                        <td>
                            <span
                                :class="{ 'badge': true, 'rounded-pill': true, 'text-bg-success': item.Status === 'Accept', 'text-bg-warning': item.Status === 'Pending', 'text-bg-danger': item.Status === 'Decline' }">{{
                                    item.Status }}</span>
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary" @click="detailModal(item.ID_Akun)">
                                Detail
                            </button>
                            <button type="button" class="btn btn-danger" @click="delData(item.ID_Akun)">
                                Hapus
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <nav>
                <ul class="pagination">
                    <li class="page-item" :class="{ disabled: supplierPagination.current_page === 1 }">
                        <button class="page-link"
                            @click="loadSupplierData(supplierPagination.current_page - 1)">Previous</button>
                    </li>
                    <li class="page-item" v-for="page in supplierPagination.last_page" :key="page"
                        :class="{ active: page === supplierPagination.current_page }">
                        <button class="page-link" @click="loadSupplierData(page)">{{ page }}</button>
                    </li>
                    <li class="page-item"
                        :class="{ disabled: supplierPagination.current_page === supplierPagination.last_page }">
                        <button class="page-link"
                            @click="loadSupplierData(supplierPagination.current_page + 1)">Next</button>
                    </li>
                </ul>
            </nav>

            <table class="table align-middle mb-3 bg-white">
                <thead class="bg-warning">
                    <tr>
                        <th>Name</th>
                        <th>Info</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in buyerUsers" :key="item.ID_Akun">
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="images/system/profile-buy.gif" alt="" style="width: 45px; height: 45px"
                                    class="rounded-circle" />
                                <div class="ms-3">
                                    <p class="fw-bold mb-1">{{ item.Username }}</p>
                                    <!-- <p class="text-muted mb-0">{{ item.Email }}</p> -->
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ item.Email }}</p>
                            <p class="text-muted mb-0">{{ item.No_Telp }}</p>
                        </td>
                        <td>{{ item.Peran }}</td>
                        <td>
                            <span
                                :class="{ 'badge': true, 'rounded-pill': true, 'text-bg-success': item.Status === 'Accept', 'text-bg-warning': item.Status === 'Pending', 'text-bg-danger': item.Status === 'Decline' }">{{
                                    item.Status }}</span>
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary" @click="detailModal(item.ID_Akun)">
                                Detail
                            </button>
                            <button type="button" class="btn btn-danger" @click="delData(item.ID_Akun)">
                                Hapus
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <nav>
                <ul class="pagination">
                    <li class="page-item" :class="{ disabled: buyerPagination.current_page === 1 }">
                        <button class="page-link" @click="loadBuyerData(buyerPagination.current_page - 1)">Previous</button>
                    </li>
                    <li class="page-item" v-for="page in buyerPagination.last_page" :key="page"
                        :class="{ active: page === buyerPagination.current_page }">
                        <button class="page-link" @click="loadBuyerData(page)">{{ page }}</button>
                    </li>
                    <li class="page-item" :class="{ disabled: buyerPagination.current_page === buyerPagination.last_page }">
                        <button class="page-link" @click="loadBuyerData(buyerPagination.current_page + 1)">Next</button>
                    </li>
                </ul>
            </nav>

            <!-- modal -->
            <div class="modal fade" id="detail" tabindex="-1" aria-labelledby="detailLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 text-black" id="detailLabel">ID Pengguna : {{ modalData.ID_Akun }}
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container text-center">
                                <div class="row">
                                    <div class="col col-lg-2 d-flex justify-content-center">
                                        <img v-if="modalData.Peran === 'Penjual'" src="images/system/profile-sup.gif" alt=""
                                            style="width: 45px; height: 45px" class="rounded-circle" />
                                        <img v-else src="images/system/profile-buy.gif" alt=""
                                            style="width: 45px; height: 45px" class="rounded-circle" />

                                    </div>
                                    <div class="col-md-auto">
                                        <div class="ms-3">
                                            <p class="fw-bold mb-1 text-black text-start">{{ modalData.Username }}</p>
                                            <p class="text-muted mb-0">{{ modalData.Email }}</p>
                                        </div>
                                    </div>
                                </div>
                                <hr class="border border-black">
                                <div class="row mt-3">
                                    <div class="col-md-auto">
                                        <div class="ms-3">
                                            <p class="fw-bold mb-0 text-black text-start">Role: </p>
                                            <p class="text-muted text-start">{{ modalData.Peran }}</p>
                                            <p v-if="modalData.Peran === 'Pembeli'"
                                                class="fw-bold mb-0 text-black text-start">Tanggal Lahir:
                                            </p>
                                            <p v-if="modalData.Peran === 'Pembeli'" class="text-muted text-start">{{
                                                modalData.Tanggal_Lahir }}
                                            </p>
                                            <p class="fw-bold mb-0 mt-1 text-black text-start">No Telp:
                                            </p>
                                            <p class="text-muted text-start">{{ modalData.No_Telp }}</p>
                                            <p class="fw-bold mb-0 mt-1 text-black text-start">Alamat:
                                            </p>
                                            <p class="text-muted text-start">{{ modalData.Alamat }}</p>
                                            <p v-if="modalData.Peran === 'Penjual'"
                                                class="fw-bold mb-0 mt-1 text-black text-start">No Bidang
                                                Usaha:
                                            </p>
                                            <p v-if="modalData.Peran === 'Penjual'" class="text-muted text-start">{{
                                                modalData.NIB }}</p>
                                            <p v-if="modalData.Peran === 'Penjual'"
                                                class="fw-bold mb-0 mt-1 text-black text-start">Nama
                                                Perusahaan:</p>
                                            <p v-if="modalData.Peran === 'Penjual'" class="text-muted text-start">{{
                                                modalData.Nama }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button v-if="modalData.Peran === 'Pembeli'" type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button v-if="modalData.Peran === 'Penjual' && modalData.Status === 'Pending'" type="button"
                                class="btn btn-success" @click="editStatus(modalData.ID_Akun, 'Accept')">Accept</button>
                            <button v-if="modalData.Peran === 'Penjual' && modalData.Status === 'Pending'" type="button"
                                class="btn btn-danger" @click="editStatus(modalData.ID_Akun, 'Decline')">Decline</button>
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
    // name: 'DataUser',
    data() {
        return {
            supplierUsers: {},
            buyerUsers: {},
            supplierPagination: {},
            buyerPagination: {},
            modalData: {},
            loading: false,
        }
    },
    methods: {
        detailModal(id) {
            axios.get(`api/user?id=${id}`)
                .then(({ data }) => {
                    this.modalData = data;
                    $('#detail').modal('show');
                    // console.log(this.modalData);
                })
                .catch(error => {
                    console.error('Gagal memuat data:', error);
                });
            // console.log('Show modal');
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
                        .delete("api/user/" + id)
                        .then(() => {
                            Swal.fire(
                                "Terhapus",
                                "Data berhasil terhapus",
                                "success"
                            );
                            this.loadSupplierData();
                            this.loadBuyerData();
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
                .put('api/user/' + id, { status: status })
                .then(response => {
                    console.log('Data berhasil diupdate');
                    $('#detail').modal('hide');
                    this.loadSupplierData();
                    this.loadBuyerData();

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
        loadSupplierData(page = 1) {
            axios
                .get('api/user?peran=Penjual&page=' + page)
                .then(({ data }) => {
                    this.supplierUsers = data.data;
                    this.supplierPagination = data;
                });
        },
        loadBuyerData(page = 1) {
            axios
                .get('api/user?peran=Pembeli&page=' + page)
                .then(({ data }) => {
                    this.buyerUsers = data.data;
                    this.buyerPagination = data;
                });
        },
    },
    created() {
        this.loadSupplierData();
        this.loadBuyerData();
        // console.log(this.modalData.Foto_Profile);
    }
}
</script>

<style scoped>
/* * {
    border: 1px solid red;
} */
</style>
