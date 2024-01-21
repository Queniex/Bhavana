<template>
    <div class="container">
        <div class="row justify-content-center mx-5 text-black mt-3">
            <span class="user fw-bold fs-3 mb-2">Dashboard</span>

            <div class="user">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Animi magni aut possimus laborum nobis quasi
                molestias cumque asperiores placeat iure.
            </div>

            <div class="user align-middle mt-2">
                <div class="container text-center">
                    <div class="row">
                        <div class="col col-lg-5 row-card-wrap">
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
                        <div class="col col-lg-5 row-card-wrap">
                            <div class="row row-card bg-light pt-2 pb-2 border border-black rounded-4">
                                <div class="colx">
                                    <img src="images/system/customer.gif" width="80px" height="75px" alt="">
                                </div>
                                <div class="coly">
                                    <div class="d-flex flex-column">
                                        <div class="p-2">Jumlah Pengguna</div>
                                        <div class="p-2 fw-bold badge bg-warning text-black">{{ totalUser.total_users }}
                                            Pengguna</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col col-lg-5 row-card-wrap">
                            <div class="row row-card bg-light pt-2 pb-2 border border-black rounded-4">
                                <div class="colx">
                                    <img src="images/system/trolley.gif" width="80px" height="75px" alt="">
                                </div>
                                <div class="coly">
                                    <div class="d-flex flex-column">
                                        <div class="p-2">Jumlah Pembelian</div>
                                        <div class="p-2 fw-bold badge bg-warning text-black">{{ requestSup }} Pembelian
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col col-lg-5 row-card-wrap">
                            <div class="row row-card bg-light pt-2 pb-2 border border-black rounded-4">
                                <div class="colx">
                                    <img src="images/system/shopping-cart.gif" width="80px" height="75px" alt="">
                                </div>
                                <div class="coly">
                                    <div class="d-flex flex-column">
                                        <div class="p-2">Jumlah Penjualan</div>
                                        <div class="p-2 fw-bold badge bg-warning text-black">{{ requestBuy }} Penjualan
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="user mt-3">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Animi magni aut possimus laborum nobis quasi
                molestias cumque asperiores placeat iure.
            </div>

            <div class="bg-light mt-2 border border-black rounded-4">
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
            totalUser: null,
            requestSup: null,
            requestBuy: null,
        }
    },
    methods: {
        loadData() {
            axios.get('api/totalUser')
                .then(({ data }) => {
                    this.totalUser = data;
                    // console.log(this.modalData);
                })
                .catch(error => {
                    console.error('Gagal memuat data:', error);
                });

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
                    this.requestBuy = data.total_requests_buy;
                    this.requestSup = data.total_requests_sup;
                    // console.log(this.modalData);
                })
                .catch(error => {
                    console.error('Gagal memuat data:', error);
                });
        },
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
