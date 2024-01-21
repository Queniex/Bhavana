<template>
    <div class="container">
        <div class="row justify-content-center mx-5 text-black mt-3">
            <span class="user fw-bold fs-3 mb-2">Kelola Kontrak</span>
            <div class="user">
                <table class="table align-middle bg-white">
                    <thead class="bg-warning">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nomor Order</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                            <th class="text-center">Kontrak</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td>
                                <div class="ms-1 text-center">
                                    <p class="fw-bold mb-1">MX[1]BSD9009</p>
                                </div>
                            </td>
                            <td class="text-center">
                                <span class="badge rounded-pill text-bg-warning">Pending</span>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-primary" @click="detailModal()">
                                    Detail
                                </button>
                            </td>
                            <td class="text-center">
                                <a href="">Kontrak Belum Terbit</a>
                            </td>
                        </tr>
                    </tbody>
                </table>


                <!-- <nav>
                    <ul class="pagination">
                        <li class="page-item" :class="{ disabled: productPagination.current_page === 1 }">
                            <button class="page-link"
                                @click="loadProductData(productPagination.current_page - 1)">Previous</button>
                        </li>
                        <li class="page-item" v-for="page in productPagination.last_page" :key="page"
                            :class="{ active: page === productPagination.current_page }">
                            <button class="page-link" @click="loadProductData(page)">{{ page }}</button>
                        </li>
                        <li class="page-item"
                            :class="{ disabled: productPagination.current_page === productPagination.last_page }">
                            <button class="page-link"
                                @click="loadProductData(productPagination.current_page + 1)">Next</button>
                        </li>
                    </ul>
                </nav> -->

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
    name: 'Contract-Sup',
    data() {
        return {
            statusModal: false,
            disabled: false,
            form: new Form({

            }),

        }
    },
    methods: {

    },
    created() {

    }
}
</script>

<style scoped>
/* * {
    border: 1px solid red;
} */
</style>
