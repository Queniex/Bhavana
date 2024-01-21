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
                                <img class="rounded-circle" width="150" src="images/system/profile-sup.gif" alt="">
                                <div class="mt-3">
                                    <h4>{{ userData.Username }}</h4>
                                    <p class="text-muted font-size-sm">{{ userData.NIB }}</p>
                                    <p class="text-secondary mb-1">{{ userData.Alamat }} Lorem ipsum dolor sit amet
                                        consectetur adipisicing elit. Alias, dicta!</p>
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
                                    {{ userData.Username }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ userData.Email }}
                                </div>
                            </div>
                            <hr>
                            <!-- <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Tanggal Lahir</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    27-09-2002
                                </div>
                            </div>
                            <hr> -->
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    (239) {{ userData.No_Telp }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Role</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ userData.Peran }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Alamat</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ userData.Alamat }}
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
import axios from 'axios';
const csrfToken = document.head.querySelector('meta[name="csrf-token"]');

if (csrfToken) {
    axios.defaults.headers.common['X-CSRF-TOKEN'] = csrfToken.content;
}

export default {
    name: 'Profile',
    data() {
        return {
            levels: {},
            userData: {},
        }
    },
    methods: {
        loadData() {
        },
        userDetail() {
            axios
                .get('/ProfileDetail')
                .then(({ data }) => {
                    this.userData = data;
                })
                .catch(error => {
                    console.error('Error fetching user detail:', error);
                });
        },
    },
    created() {
        // this.loadData();
        this.userDetail();
    }
}
</script>

<style scoped>
/* * {
    border: 1px solid red;
} */
</style>
