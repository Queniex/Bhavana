<template>
    <div class="first-line:container">
        <div class="row justify-content-center mx-5 text-black mt-3">
            <form class="row g-2 align-items-center" @submit.prevent="editData()" enctype="multipart/form-data">
                <nav aria-label="breadcrumb" class="main-breadcrumb mb-3">
                    <span class="fw-bold fs-3 mb-2 ms-3">Kelola Profile</span>
                </nav>

                <div class="row">
                    <!-- <div class="col-lg-4">
                        <div class="card border border-black">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <template v-if="previewUrl">
                                        <label for="fileInput" style="cursor: pointer;">
                                            <img ref="profileImage" :src="previewUrl" alt="Preview"
                                                class="rounded-circle p-1 bg-success pe-auto"
                                                style="max-width: 110px; max-height: 110px" />
                                        </label>
                                        <input id="fileInput" :class="{ 'is-invalid': form.errors.has('Foto_Profile') }"
                                            type="file" @change="previewImage" style="display: none;" />
                                        <div v-if="form.errors.has('Foto_Kategori')" class="text-danger"
                                            v-html="form.errors.get('Foto_Kategori')" />
                                    </template>

                                    <template v-else>
                                        <label for="fileInput" style="cursor: pointer;">
                                            <img ref="profileImage" :src="'./images/user/' + form.Foto_Profile"
                                                alt="Tambah Foto" class="rounded-circle p-1 bg-success pe-auto"
                                                style="max-width: 110px; max-height: 110px; cursor: pointer;" />
                                        </label>
                                        <input id="fileInput" :class="{ 'is-invalid': form.errors.has('Foto_Profile') }"
                                            type="file" @change="previewImage" style="display: none;" />
                                        <div v-if="form.errors.has('Foto_Kategori')" class="text-danger"
                                            v-html="form.errors.get('Foto_Kategori')" />
                                    </template>
                                </div>
                                <div class="text-center mt-2">Ubah Gambar</div>
                            </div>
                        </div>
                    </div> -->

                    <div class="col-lg-8">

                        <div class="card border border-black">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Username</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" v-model="form.Username" class="form-control border border-black"
                                            disabled>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" v-model="form.Email" class="form-control" disabled>
                                    </div>
                                </div>
                                <!-- <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Tanggal Lahir</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="27-09-2002" disabled>
                                    </div>
                                </div> -->
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" v-model="form.No_Telp"
                                            :class="{ 'is-invalid': form.errors.has('No_Telp') }" class="form-control">
                                        <div v-if="form.errors.has('No_Telp')" class="text-danger"
                                            v-html="form.errors.get('No_Telp')" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Role</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="Supplier" disabled>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Nama Perusahaan</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" v-model="form.Nama" disabled>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Bidang Usaha</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" v-model="form.NIB" disabled>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Alamat</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control"
                                            :class="{ 'is-invalid': form.errors.has('Alamat') }" v-model="form.Alamat">
                                        <div v-if="form.errors.has('Alamat')" class="text-danger"
                                            v-html="form.errors.get('Alamat')" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <button type="submit" class="btn btn-success" :disabled="disabled">Ubah</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
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
    name: 'Profile-Change-Sup',
    data() {
        return {
            disabled: false,
            form: new Form({
                ID_Akun: "",
                Username: "",
                Email: "",
                Nama: "",
                NIB: "",
                Alamat: "",
                No_Telp: "",
                Peran: "",
                Status: "",
                Foto_Profile: "",
            }),
            user: {},
            previewUrl: null,
        }
    },
    methods: {
        // openFileInput() {
        //     this.$refs.fileInput.click();
        // },
        editData() {
            const id = this.form.ID_Akun;
            this.disabled = true;
            this.form
                .put('api/user/' + id)
                .then(response => {
                    console.log(response.data);
                    this.disabled = false;
                    this.$router.push({ name: 'Profile-Sup' });
                    Toast.fire({
                        icon: 'success',
                        title: 'Data berhasil diupdate'
                    });
                    console.log(this.form.Foto_Profile.name);
                    this.loading = false;
                    this.disabled = false;
                })
                .catch(error => {
                    this.disabled = false;
                    console.error(error);
                });
        },
        previewImage(event) {
            const file = event.target.files[0];
            console.log(event.target.files[0]);

            if (file) {
                // Create a temporary URL for preview
                this.previewUrl = URL.createObjectURL(file);
                this.form.Foto_Profile = event.target.files[0];
            } else {
                // Reset preview if no file is selected
                this.previewUrl = null;
            }
        },

    },
    mounted() {
        // const profileImage = this.$refs.profileImage;
        // if (profileImage) {
        //     const newImageUrl = URL.createObjectURL(this.form.Foto);
        //     profileImage.src = newImageUrl;
        // }

        // const fileInput = this.$refs.fileInput;
        // if (fileInput) {
        //     fileInput.addEventListener('change', this.onFileChange);
        // }
    },
    created() {
        axios
            .get('/ProfileDetail')
            .then(({ data }) => {
                this.user = data;
                this.form.fill(this.user);
            })
            .catch(error => {
                console.error('Error fetching user detail:', error);
            });
    }
}
</script>

<style scoped>
/* * {
    border: 1px solid red;
} */
</style>
