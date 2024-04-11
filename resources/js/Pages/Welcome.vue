<script setup>
import { ref, onMounted } from 'vue';
import { Head, Link } from '@inertiajs/vue3';
import Navbar from '@/Components/Navbar.vue';
import Carousel from '@/Components/Carrousel.vue';
import Cruds from '@/Components/Cruds.vue';
import axios from 'axios';
defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});


const cruds = ref([]);

onMounted(async () => {
    try {
        const response = await axios.get('/getData');
        cruds.value = response.data;
    } catch (error) {
        console.error('Error al obtenir les dades:', error);
    }
});

</script>

<template>

    <Head title="Test Project 2" />

    <body class="bg-gray-100 h-full pb-10">

        <Navbar />

        <Carousel />

        <Cruds />

        <div class="flex justify-center">
            <div class="overflow-x-auto max-w-screen-lg">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(crud, index) in cruds" :key="index">
                            <td>{{ index + 1 }}</td>
                            <td>{{ crud.name }}</td>
                            <td>Eliminar</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>



    </body>

</template>
