<template>
    <div class="text-black">
        <div class="bg-gray-100">
            <div class="container mx-auto py-8">
                <div class="grid grid-cols-4 sm:grid-cols-12 gap-6 px-4">
                    <div class="col-span-4 sm:col-span-3">
                        <div class="bg-white shadow rounded-lg p-6">
                            <div class="flex flex-col items-center">
                                <img class="w-32 h-32 bg-gray-300 rounded-full mb-4 shrink-0"
                                    src="images/system/profile-buy.gif" alt="">

                                <h1 class="text-xl font-bold">{{ userData.Username }}</h1>
                                <p class="text-gray-700">{{ userData.Email }}</p>
                                <div class="mt-6 flex flex-wrap gap-4 justify-center">

                                    <button @click="updateModal()"
                                        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                        type="button">
                                        Ubah Profile
                                    </button>

                                    <div v-if="isModalVisible" id="profileDetail" tabindex="-1" aria-hidden="true"
                                        class="flex items-center justify-center fixed top-0 right-0 left-0 z-50 bottom-0">

                                        <div class="relative p-4 w-full max-w-2xl max-h-full">

                                            <form @submit.prevent="editData()">
                                                <div class="relative bg-black rounded-lg shadow">
                                                    <div
                                                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                                        <h3 class="text-xl font-semibold text-white ">
                                                            Ubah Profile
                                                        </h3>
                                                        <button type="button" @click="closeModal()"
                                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                                                            <svg class="w-3 h-3" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 14 14">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                            </svg>
                                                            <span class="sr-only">Close modal</span>
                                                        </button>
                                                    </div>
                                                    <!-- Modal body -->
                                                    <!-- <div
                                                        class="max-w-md mx-auto mt-3 bg-white rounded-md overflow-hidden mb-3">
                                                        <div class="text-center pt-3">
                                                            <img v-if="imageUrl" :src="imageUrl" alt="Profile"
                                                                class="w-20 h-20 object-cover mx-auto rounded-full" />
                                                            <div v-else
                                                                class="w-20 h-20 mx-auto bg-gray-300 rounded-full flex items-center justify-center">
                                                                <span class="text-gray-600 text-xs">No Image</span>
                                                            </div>
                                                        </div>
                                                        <div class="px-6 py-4">
                                                            <label for="fileInput"
                                                                class="block text-sm font-medium text-gray-700 mb-2">
                                                                Pilih Foto Profile :
                                                            </label>
                                                            <input id="fileInput" type="file" ref="fileInput"
                                                                @change="handleFileChange"
                                                                class="w-full text-sm py-2 px-3 border border-gray-300 rounded-md" />
                                                        </div>
                                                    </div> -->

                                                    <div class="grid gap-6 mt-5 mx-5 mb-6 md:grid-cols-2">
                                                        <div>
                                                            <label for="first_name"
                                                                class="block mb-2 text-sm font-medium text-white">Username</label>
                                                            <input type="text" id="first_name" v-model="form.Username"
                                                                :class="{ 'is-invalid': form.errors.has('Username') }"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                required>
                                                            <div v-if="form.errors.has('Username')" class="text-danger"
                                                                v-html="form.errors.get('Username')" />
                                                        </div>
                                                        <div>
                                                            <label for="last_name"
                                                                class="block mb-2 text-sm font-medium text-white">Email</label>
                                                            <input type="email" id="first_name" v-model="form.Email"
                                                                :class="{ 'is-invalid': form.errors.has('Email') }"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                disabled>
                                                            <div v-if="form.errors.has('Email')" class="text-danger"
                                                                v-html="form.errors.get('Email')" />
                                                        </div>
                                                        <div>
                                                            <label for="company"
                                                                class="block mb-2 text-sm font-medium text-white">Alamat</label>
                                                            <textarea id="first_name" v-model="form.Alamat"
                                                                :class="{ 'is-invalid': form.errors.has('Alamat') }"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                required> </textarea>
                                                            <div v-if="form.errors.has('Alamat')" class="text-danger"
                                                                v-html="form.errors.get('Alamat')" />
                                                        </div>
                                                        <div>
                                                            <label for="phone"
                                                                class="block mb-2 text-sm font-medium text-white">No
                                                                Telp</label>
                                                            <input type="text" id="first_name" v-model="form.No_Telp"
                                                                :class="{ 'is-invalid': form.errors.has('No_Telp') }"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                required>
                                                            <div v-if="form.errors.has('No_Telp')" class="text-danger"
                                                                v-html="form.errors.get('No_Telp')" />
                                                        </div>
                                                    </div>


                                                    <div
                                                        class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                        <button type="submit" :disabled="disabled"
                                                            class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Simpan</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <hr class="my-6 border-t border-gray-300">
                            <div class="flex flex-col">
                                <span
                                    class="text-gray-700 uppercase font-bold tracking-wider mb-2 underline underline-offset-4">Info
                                    Data</span>
                                <ul>
                                    <li class="mb-2">No telp : {{ userData.No_Telp }}</li>
                                    <li class="mb-2">Tanggal Lahir : {{ userData.Tanggal_Lahir }}</li>
                                    <li class="mb-2">Alamat : {{ userData.Alamat }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-4 sm:col-span-9">
                        <div class="bg-white shadow rounded-lg p-6">
                            <h2 class="text-2xl font-bold mb-2 text-black">Temukan jawaban dan bantuan</h2>


                            <div id="accordion-collapse" data-accordion="collapse">
                                <h2 id="accordion-collapse-heading-1">
                                    <button type="button"
                                        class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-black border border-b-0 border-gray-200 focus:text-yellow-600 rounded-t-xl focus:ring-4 focus:ring-yellow-200 gap-3"
                                        data-accordion-target="#accordion-collapse-body-1" aria-expanded="true"
                                        aria-controls="accordion-collapse-body-1">
                                        <span class="text-black">Bagaimana proses membuat order?</span>
                                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M9 5 5 1 1 5" />
                                        </svg>
                                    </button>
                                </h2>
                                <div id="accordion-collapse-body-1" class="hidden"
                                    aria-labelledby="accordion-collapse-heading-1">
                                    <div class="p-5 border border-b-0 border-gray-200">
                                        <p class="mb-2 text-black">Pesan produk yang Anda inginkan dengan mudah di Bhavana!
                                            Telusuri katalog, pilih produk yang Anda butuhkan, dan klik 'Buat Order'.
                                            Lengkapi detail pesanan Anda, lalu konfirmasi pesanan. Meskipun terjadi situasi
                                            tertentu, jangan khawatir Anda tetap bisa membuat pesanan baru dengan kenyamanan
                                            yang sama.</p>

                                    </div>
                                </div>
                                <h2 id="accordion-collapse-heading-2">
                                    <button type="button"
                                        class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-black border border-b-0 border-gray-200 focus:text-yellow-600 focus:ring-4 focus:ring-yellow-200  gap-3"
                                        data-accordion-target="#accordion-collapse-body-2" aria-expanded="false"
                                        aria-controls="accordion-collapse-body-2">
                                        <span class="text-black">Apa yang harus dilakukan setelah membuat order?</span>
                                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M9 5 5 1 1 5" />
                                        </svg>
                                    </button>
                                </h2>
                                <div id="accordion-collapse-body-2" class="hidden"
                                    aria-labelledby="accordion-collapse-heading-2">
                                    <div class="p-5 border border-b-0 border-gray-200">
                                        <p class="mb-2 text-black">Setelah membuat order, tunggu konfirmasi dari kami.
                                            Anda akan menerima status pemesanan saat pesanan Anda diterima. Selanjutnya,
                                            pantau
                                            status pesanan Anda di halaman Kelola Transaksi untuk melihat perkembangan
                                            pemesanan dan
                                            informasi lainnya seperti kontrak.</p>
                                        <p class="text-black">Jangan lupa, kami
                                            selalu siap membantu Anda jika ada pertanyaan atau kebutuhan tambahan.</p>
                                    </div>
                                </div>
                                <h2 id="accordion-collapse-heading-3">
                                    <button type="button"
                                        class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-black border border-gray-200 focus:text-yellow-600 focus:ring-4 focus:ring-yellow-200 gap-3"
                                        data-accordion-target="#accordion-collapse-body-3" aria-expanded="false"
                                        aria-controls="accordion-collapse-body-3">
                                        <span class="text-black">Kenapa kontrak saya dibatalkan?</span>
                                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M9 5 5 1 1 5" />
                                        </svg>
                                    </button>
                                </h2>
                                <div id="accordion-collapse-body-3" class="hidden"
                                    aria-labelledby="accordion-collapse-heading-3">
                                    <div class="p-5 border border-t-0 border-gray-200">
                                        <p class="mb-2 text-black">Pembatalan kontrak dapat terjadi karena beberapa alasan,
                                            seperti ketidaktersediaan stok, perubahan kebijakan, atau penyesuaian strategis.
                                        </p>
                                        <p class="mb-2 text-black">Meskipun demikian, jangan khawatir. Jika kontrak Anda
                                            dibatalkan, Anda tetap bisa membuat pesanan baru dan melanjutkan pengalaman
                                            berbelanja Anda dengan Bhavana. </p>
                                        <p class="mb-2 text-black">Lakukan pengecekan secara sedia kala:</p>
                                        <ul class="ps-5 text-black list-disc">
                                            <li><router-link to="/Contract-Buy"
                                                    class="text-blue-600 dark:text-blue-500 hover:underline">Kunjungi
                                                    Halaman Transaksi</router-link></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>


                            <!-- <div class="bg-light mt-2 border border-black rounded-4">
                                <canvas ref="myChart" style="width: 100%; height: 112px;"></canvas>
                            </div> -->

                            <!-- <div class="container mx-auto mt-8">
                                <h2 class="text-2xl font-bold">Riwayat Pembelian</h2>

                                <div class="bg-white shadow-md rounded my-4 overflow-x-auto">
                                    <table class="min-w-max w-full table-auto">
                                        <thead>
                                            <tr class="text-black bg-yellow-300 uppercase text-sm leading-normal">
                                                <th class="py-3 px-6 text-left">No</th>
                                                <th class="py-3 px-6 text-left">Tanggal Pembelian</th>
                                                <th class="py-3 px-6 text-left">Produk</th>
                                                <th class="py-3 px-6 text-left">Jumlah</th>
                                                <th class="py-3 px-6 text-left">Total Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-black text-sm font-light">
                                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                                <td class="py-3 px-6 text-left whitespace-nowrap">1</td>
                                                <td class="py-3 px-6 text-left whitespace-nowrap">2023-01-01</td>
                                                <td class="py-3 px-6 text-left">
                                                    <span
                                                        class="inline-block bg-yellow-100 rounded-full px-3 py-1 text-sm font-semibold text-black">Produk
                                                        A</span>
                                                </td>
                                                <td class="py-3 px-6 text-left">2 Tons</td>
                                                <td class="py-3 px-6 text-left">Rp 2.750.000</td>
                                            </tr>
                                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                                <td class="py-3 px-6 text-left whitespace-nowrap">2</td>
                                                <td class="py-3 px-6 text-left whitespace-nowrap">2023-02-01</td>
                                                <td class="py-3 px-6 text-left">
                                                    <span
                                                        class="inline-block bg-yellow-100 rounded-full px-3 py-1 text-sm font-semibold text-black">Produk
                                                        B</span>
                                                </td>
                                                <td class="py-3 px-6 text-left">100 Kg</td>
                                                <td class="py-3 px-6 text-left">Rp 3.050.000</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Chart from 'chart.js/auto';
import axios from 'axios';
import Form from 'vform';
const csrfToken = document.head.querySelector('meta[name="csrf-token"]');

if (csrfToken) {
    axios.defaults.headers.common['X-CSRF-TOKEN'] = csrfToken.content;
}

const labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May'];

export default {
    name: 'Profile_Buy',
    data() {
        return {
            imageUrl: null,
            levels: {},
            myChart: null,
            userData: {},
            modalData: {},
            isModalVisible: false,
            form: new Form({
                ID_Akun: "",
                Username: "",
                Email: "",
                Alamat: "",
                No_Telp: "",
                Tanggal_Lahir: "",
            }),
        }
    },
    methods: {
        updateModal() {
            this.isModalVisible = true;
            this.form.fill(this.userData);
        },
        closeModal() {
            this.isModalVisible = false;
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
        handleFileChange() {
            const input = this.$refs.fileInput;
            const file = input.files[0];

            if (file) {
                // Update the imageUrl with the selected file
                this.imageUrl = URL.createObjectURL(file);
            } else {
                // If no file is selected, reset imageUrl
                this.imageUrl = null;
            }
        },
        editData() {
            const id = this.form.ID_Akun;
            this.disabled = true;
            this.form
                .put('api/user/' + id)
                .then(response => {
                    console.log(response.data);
                    this.disabled = false;
                    Toast.fire({
                        icon: 'success',
                        title: 'Data berhasil diupdate'
                    });
                    console.log(this.form.Foto_Profile.name);
                })
                .catch(error => {
                    this.disabled = false;
                    console.error(error);
                });
            this.isModalVisible = false;
            this.userDetail();
        },
    },
    mounted() {
        // axios.get(`api/user?id=9`)
        //     .then(response => {
        //         this.userData = response.data;
        //     })
        //     .catch(error => {
        //         console.error('Error fetching user detail:', error);
        //     });

        // Data untuk chart
        var data = {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
            datasets: [{
                label: 'Pembelian',
                data: [10, 15, 7, 12, 18],
                backgroundColor: 'rgb(255, 215, 0)',
                borderColor: 'rgb(0, 0, 0)',
                borderWidth: 1
            }]
        };

        // Konfigurasi chart
        var options = {
            plugins: {
                legend: {
                    labels: {
                        color: 'black'
                    }
                }
            },
            scales: {
                x: {
                    color: 'rgb(211, 211, 211)',
                    grid: {
                        color: 'rgb(211, 211, 211)'
                    }
                },
                y: {
                    beginAtZero: true,
                    color: 'rgb(211, 211, 211)',
                    grid: {
                        color: 'rgb(211, 211, 211)'
                    }
                }
            }
        };

        // Mendapatkan elemen canvas
        var ctx = this.$refs.myChart.getContext('2d');

        // Membuat chart
        this.myChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });
    },
    created() {
        this.userDetail();
    }
}
</script>

<style scoped>
/* * {
    border: 1px solid red;
} */
</style>
