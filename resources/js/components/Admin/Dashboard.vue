<template>
    <div class="container">
        <div class="row justify-content-center mx-5 text-black mt-5">
            Halaman Kategori
        </div>
    </div>
</template>

<script>
import Chart from 'chart.js/auto';

const labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May'];

export default {
    name: 'Dashboard',
    data() {
        // return {
        //     levels: {},
        //     myChart: null,
        // }
    },
    methods: {
        loadData() {
            // Anda dapat memuat data jika dibutuhkan
        }
    },
    mounted() {
        // Data untuk chart
        // var data = {
        //     labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
        //     datasets: [{
        //         label: 'Sales',
        //         data: [10, 15, 7, 12, 18],
        //         backgroundColor: 'rgba(75, 192, 192, 0.2)',
        //         borderColor: 'rgba(75, 192, 192, 1)',
        //         borderWidth: 1
        //     }]
        // };

        // // Konfigurasi chart
        // var options = {
        //     scales: {
        //         y: {
        //             beginAtZero: true
        //         }
        //     }
        // };

        // // Mendapatkan elemen canvas
        // var ctx = this.$refs.myChart.getContext('2d');

        // // Membuat chart
        // this.myChart = new Chart(ctx, {
        //     type: 'bar',
        //     data: data,
        //     options: options
        // });
    }
}
</script>

<style scoped>
/* @import '../../../../public/css/app.css'; */
/* * {
    border: red 1px solid;
} */
</style>
   