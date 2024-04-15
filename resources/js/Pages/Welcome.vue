<script setup>
import { ref, onMounted } from 'vue';
import { Head, Link } from '@inertiajs/vue3';
import Navbar from '@/Components/Navbar.vue';
import Carousel from '@/Components/Carrousel.vue';
import Cruds from '@/Components/Cruds.vue';
import axios from 'axios';
import Cookies from '@/Components/Cookies.vue';

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

const cursos = ref([]);

onMounted(async () => {
    try {
        const response = await axios.get('/gestiocursostable');
        console.log(response.data);
        cursos.value = response.data;
    } catch (error) {
        console.error('Error al obtener los datos:', error);
    }
});

const deleteItem = async (id, index) => {
    try {
        // Eliminar el elemento de la lista
        cruds.value.splice(index, 1);
        console.log("Eliminat", id);

        await axios.post('/deleteData', { id });
    } catch (error) {
        console.error('Error al eliminar el elemento:', error);
    }
};




</script>

<template>

    <Head title="Test Project 2" />

    <body class="bg-gray-100 h-full pb-10">

        <Navbar />

        <Carousel />




        <h1 class="text-center text-4xl">Desbloca el teu potencial amb l'EVA més divertit i interactiu!</h1>


        <div class="overflow-x-auto">
            <table class="table">
                <!-- head -->
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Etapa</th>
                        <th>Descripción</th>

                    </tr>
                </thead>
                <tbody>
                    <!-- Iterar sobre los elementos del JSON -->
                    <tr v-for="(curso, index) in cursos" :key="index">
                        <!-- Mostrar los valores en las celdas de la tabla -->
                        <td>{{ curso.id }}</td>
                        <td>{{ curso.nom }}</td>
                        <td>{{ curso.etapa }}</td>
                        <td v-html="curso.descripcio"></td>

                    </tr>
                </tbody>
            </table>
        </div>




        <Cruds />

        <div class="flex justify-center">
            <div class="overflow-x-auto max-w-screen-lg">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(crud, index) in cruds" :key="index">
                            <td>{{ crud.id }}</td>
                            <td v-html="crud.name"></td>
                            <td>
                                <button class="btn btn-sm" @click="deleteItem(crud.id, index)">Eliminar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </body>
    <Cookies />
</template>
