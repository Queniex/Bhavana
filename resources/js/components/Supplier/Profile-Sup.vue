<template>
    <div class="first-line:container">
        <div class="row justify-content-center mx-5 text-black mt-3">

            <nav aria-label="breadcrumb" class="main-breadcrumb mb-3">
                <span class="fw-bold fs-3 mb-2 ms-3">Kelola Profile</span>
            </nav>

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card border border-black">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt="Admin" class="rounded-circle"
                                    width="150">
                                <div class="mt-3">
                                    <h4>PT.Redaksa</h4>
                                    <p class="text-muted font-size-sm">Kelapa Sawit</p>
                                    <p class="text-secondary mb-1">Bay Area, San Francisco, CA Lorem ipsum dolor sit
                                        amet.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3 border border-black">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Username</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    Kenneth Valdez
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    fip@jukmuh.al
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Tanggal Lahir</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    27-09-2002
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    (239) 816-9029
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Role</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    Supplier
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Alamat</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    Bay Area, San Francisco, CA
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <router-link to="/Profile-Change-Sup" class="btn btn-warning">Update</router-link>
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
// import axios from 'axios';

export default {
    name: 'Profile',
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
