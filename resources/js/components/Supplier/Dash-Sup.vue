<template>
    <div class="container">
        <div class="row justify-content-center mx-5 text-black mt-3">
            <span class="user fw-bold fs-3 mb-2">Dashboard</span>

            <div class="user">
                <p class="lh-1">Selamat datang di Dashboard Supplier! </p>
                <p class="lh-1">Analisis aktivitas bisnis Anda dan pantau statistik langsung di dashboard ini.</p>
            </div>

            <div class="user align-middle mt-2">
                <div class="container text-center">
                    <div class="row">
                        <div class="col col-lg-2 row-card-wrap">
                            <div class="row row-card bg-light pt-2 pb-2 border border-black rounded-4">
                                <div class="colx">
                                    <img src="images/system/checklist.gif" width="80px" height="75px" alt="">
                                </div>
                                <div class="coly">
                                    <div class="d-flex flex-column">
                                        <div class="p-2">Jumlah Produk</div>
                                        <div class="p-2 fw-bold badge bg-warning text-black">{{ totalProduct.total_products
                                        }} Produk</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col col-lg-2 row-card-wrap">
                            <div class="row row-card bg-light pt-2 pb-2 border border-black rounded-4">
                                <div class="colx">
                                    <img src="images/system/shopping-cart.gif" width="80px" height="75px" alt="">
                                </div>
                                <div class="coly">
                                    <div class="d-flex flex-column">
                                        <div class="p-2">Jumlah Pesanan</div>
                                        <div class="p-2 fw-bold badge bg-warning text-black">{{ totalRequest.total_requests
                                        }} Pesanan</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="user mt-3">
                Temukan jawaban dan bantuan dengan cepat berdasarkan pertanyaan dibawah ini :
            </div>

            <div class="user mt-2">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Bagaimana cara menambahkan product?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>Kunjungi bagian Kelola Inventory > Produk</strong> Tambahkan produk baru dengan
                                mudah di halaman Kelola Produk Bhavana. Pilih opsi 'Tambah Produk', lengkapi detailnya, dan
                                produk Anda akan segera terdaftar dalam katalog Bhavana untuk dilihat dan dipesan oleh
                                pelanggan. (Sebagai catatan, produk akan ditinjau terlebih dahulu oleh Admin Bhavana*)
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Apa yang harus dilakukan pada data pemesanan?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="mb-2">Pemrosesan data
                                    pemesanan di Bhavana
                                    sangat sederhana. Setiap pesanan akan tercatat secara otomatis, memudahkan Anda untuk
                                    melacak, mengelola, dan memenuhi setiap permintaan pelanggan.</p>
                                <p class="mt-2 mb-2">Sihlakan melakukan pengecekan pada bagian kelola transaksi > Penjualan.
                                    <strong>Lakukan pengecekan secara sedia kala.</strong> Begitu ada pesanan masuk, data
                                    akan tersinkronkan secara otomatis sehingga Anda dapat segera memprosesnya
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Kenapa kontrak saya dibatalkan?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>Kontrak Dibatalkan</strong> jarang terjadi, hanya jika jangka kontrak yang ada
                                sudah melewati dari waktu yang semestinya. Admin akan memproses pembatalan kontrak, namun
                                jangan khawatir karena proses pemesanan selanjutnya bisa tetap dikerjakan. Selain itu,
                                pembatalan kontrak dapat terjadi karena berbagai alasan, seperti perubahan kebijakan,
                                ketidaksesuaian dalam persyaratan, atau penyesuaian strategis.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="bg-light mt-2 border border-black rounded-4">
                <canvas ref="myChart" style="width: 100px; height: 20px;"></canvas>
            </div> -->
        </div>
    </div>
</template>

<script>
import axios from 'axios';
const csrfToken = document.head.querySelector('meta[name="csrf-token"]');

if (csrfToken) {
    axios.defaults.headers.common['X-CSRF-TOKEN'] = csrfToken.content;
}
import Chart from 'chart.js/auto';

const labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May'];

export default {
    name: 'Dashboard',
    data() {
        return {
            levels: {},
            myChart: null,
            totalProduct: null,
            totalRequest: null,
        }
    },
    methods: {
        loadData() {
            axios.get('/totalProduct')
                .then(({ data }) => {
                    this.totalProduct = data;
                    // console.log(this.modalData);
                })
                .catch(error => {
                    console.error('Gagal memuat data:', error);
                });

            axios.get('/totalRequest')
                .then(({ data }) => {
                    this.totalRequest = data;
                    // console.log(this.modalData);
                })
                .catch(error => {
                    console.error('Gagal memuat data:', error);
                });
        }
    },
    mounted() {
        // Data untuk chart
        var data = {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
            datasets: [{
                label: 'Penjualan',
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
        this.loadData();
    }
}
</script>

<style scoped>
/* * {
    border: 1px solid red;
} */
</style>
