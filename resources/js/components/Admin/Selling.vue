<template>
    <div class="container">
        <div class="row justify-content-center mx-5 text-black mt-3">
            Halaman Penjualan
        </div>
    </div>
</template>

<script>
// import axios from 'axios';

export default {
    name: 'Selling',
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
