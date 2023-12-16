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
                                <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt=""
                                    style="width: 45px; height: 45px" class="rounded-circle" />
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
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Detail

                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5 text-black" id="exampleModalLabel">ID Pengguna
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container text-center">
                                                    <div class="row">
                                                        <div class="col col-lg-2 d-flex justify-content-center">
                                                            <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt=""
                                                                style="width: 45px; height: 45px; margin-left: 30px;"
                                                                class="rounded-circle mt-2" />
                                                        </div>
                                                        <div class="col-md-auto">
                                                            <div class="ms-3">
                                                                <p class="fw-bold mb-1 text-black text-start">John Doe</p>
                                                                <p class="text-muted mb-0">john.doe@gmail.com</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr class="border border-black">
                                                    <div class="row mt-3">
                                                        <div class="col-md-auto">
                                                            <div class="ms-3">
                                                                <p class="fw-bold mb-0 text-black text-start">Role: </p>
                                                                <p class="text-muted text-start">Supplier</p>
                                                                <p class="fw-bold mb-0 text-black text-start">Tanggal Lahir:
                                                                </p>
                                                                <p class="text-muted text-start">27-09-2002</p>
                                                                <p class="fw-bold mb-0 mt-1 text-black text-start">No Telp:
                                                                </p>
                                                                <p class="text-muted text-start">john.doe@gmail.com</p>
                                                                <p class="fw-bold mb-0 mt-1 text-black text-start">Alamat:
                                                                </p>
                                                                <p class="text-muted text-start">john.doe@gmail.com</p>
                                                                <p class="fw-bold mb-0 mt-1 text-black text-start">Bidang
                                                                    Usaha:
                                                                </p>
                                                                <p class="text-muted text-start">john.doe@gmail.com</p>
                                                                <p class="fw-bold mb-0 mt-1 text-black text-start">Nama
                                                                    Perusahaan:</p>
                                                                <p class="text-muted text-start">john.doe@gmail.com</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-success">Approve</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </button>
                            <button type="button" class="btn btn-danger">
                                Hapus
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <table class="table align-middle mb-0 bg-white">
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
                                <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt=""
                                    style="width: 45px; height: 45px" class="rounded-circle" />
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
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Detail

                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5 text-black" id="exampleModalLabel">ID Pengguna
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container text-center">
                                                    <div class="row">
                                                        <div class="col col-lg-2 d-flex justify-content-center">
                                                            <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt=""
                                                                style="width: 45px; height: 45px; margin-left: 30px;"
                                                                class="rounded-circle mt-2" />
                                                        </div>
                                                        <div class="col-md-auto">
                                                            <div class="ms-3">
                                                                <p class="fw-bold mb-1 text-black text-start">John Doe</p>
                                                                <p class="text-muted mb-0">john.doe@gmail.com</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr class="border border-black">
                                                    <div class="row mt-3">
                                                        <div class="col-md-auto">
                                                            <div class="ms-3">
                                                                <p class="fw-bold mb-0 text-black text-start">Role: </p>
                                                                <p class="text-muted text-start">Supplier</p>
                                                                <p class="fw-bold mb-0 text-black text-start">Tanggal Lahir:
                                                                </p>
                                                                <p class="text-muted text-start">27-09-2002</p>
                                                                <p class="fw-bold mb-0 mt-1 text-black text-start">No Telp:
                                                                </p>
                                                                <p class="text-muted text-start">john.doe@gmail.com</p>
                                                                <p class="fw-bold mb-0 mt-1 text-black text-start">Alamat:
                                                                </p>
                                                                <p class="text-muted text-start">john.doe@gmail.com</p>
                                                                <p class="fw-bold mb-0 mt-1 text-black text-start">Bidang
                                                                    Usaha:
                                                                </p>
                                                                <p class="text-muted text-start">john.doe@gmail.com</p>
                                                                <p class="fw-bold mb-0 mt-1 text-black text-start">Nama
                                                                    Perusahaan:</p>
                                                                <p class="text-muted text-start">john.doe@gmail.com</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-success">Approve</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
import axios from 'axios';

export default {
    // name: 'DataUser',
    data() {
        return {
            supplierUsers: {},
            buyerUsers: {},
        }
    },
    methods: {
        loadSupplierData() {
            axios
                .get('api/user?peran=Penjual')
                .then(({ data }) => {
                    console.log(data);
                    this.supplierUsers = data;
                });
        },
        loadBuyerData() {
            axios
                .get('api/user?peran=Pembeli')
                .then(({ data }) => {
                    console.log(data);
                    this.buyerUsers = data;
                });
        },
    },
    created() {
        this.loadSupplierData();
        this.loadBuyerData();
    }
}
</script>

<style scoped>
/* * {
    border: 1px solid red;
} */
</style>
