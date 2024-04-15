<script setup>
import Navbar from '@/Components/Navbar.vue';
import { Head } from '@inertiajs/vue3';
import axios from 'axios';
import { Link } from '@inertiajs/vue3';


defineProps({
    cursos: Array
});

const formData = {
    nom: '',
    etapa: '',
    descripcio: '',
    visible: true,
};

// Método para enviar el formulario
const submitForm = async () => {
    try {
        // Realizar la solicitud POST a /addcurs con los datos del formulario
        console.log('Enviando formulario:', formData);
        await axios.post('/addcurs', formData);

        // Limpiar el formulario después de enviar los datos
        window.location.reload()
        clearForm();
    } catch (error) {
        console.error('Error al enviar el formulario:', error);
    }
};

// Método para limpiar el formulario después de enviar los datos
const clearForm = () => {
    formData.nom = '';
    formData.etapa = '';
    formData.descripcio = '';
    formData.visible = true;
};


const deleteCurso = async (cursoId) => {
    try {
        // Realizar la solicitud DELETE a /deletecurs con el ID del curso a eliminar
        await axios.post(`/deletecurs/${cursoId}`);

        // Actualizar la lista de cursos después de eliminar el curso
        // Puedes volver a cargar la página o actualizar la lista de cursos de alguna otra manera según tu preferencia
        window.location.reload();
    } catch (error) {
        console.error('Error al eliminar el curso:', error);
    }
};


const toggleVisibility = async (curso) => {
    try {
        // Realiza una solicitud PUT a /togglecurs/{cursoId} para cambiar la visibilidad del curso
        await axios.post(`/togglecurs/${curso.id}`);

        // Actualiza la lista de cursos después de cambiar la visibilidad
        window.location.reload();
    } catch (error) {
        console.error('Error al cambiar la visibilidad del curso:', error);
    }
};


const openGenerateJson = () => {
    const url = 'http://localhost:8000/generarjson/';
    window.open(url, '_blank');
};

</script>

<template>
    <Navbar />

    <Head title="Gestio cursos" />
    <h1 class="text-center text-2xl">Gestio cursos</h1>

    <form @submit.prevent="submitForm" class="max-w-xs mx-auto mt-8">
        <div class="mb-4">
            <label for="nom" class="block mb-1">Nom:</label>
            <input type="text" id="nom" placeholder="Ingsereix nom del curs" class="input input-bordered w-full"
                v-model="formData.nom" required>
        </div>
        <div class="mb-4">
            <label for="etapa" class="block mb-1">Etapa:</label>
            <input type="text" id="etapa" placeholder="Insereix la etapa" class="input input-bordered w-full"
                v-model="formData.etapa" required>
        </div>
        <div class="mb-4">
            <label for="descripcio" class="block mb-1">Descripció:</label>
            <textarea id="descripcio" placeholder="Insereix la descripcio" class="input input-bordered w-full"
                v-model="formData.descripcio" required></textarea>
        </div>
        <div class="mb-4">
            <label for="visible" class="block mb-1">Visible:</label>
            <input type="checkbox" id="visible" class="checkbox" v-model="formData.visible">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>









    <div class="overflow-x-auto">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Etapa</th>
                    <th>Descripción</th>
                    <th>Visible</th>
                    <th>Eliminar</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="curso in cursos" :key="curso.id">
                    <td>{{ curso.id }}</td>
                    <td>{{ curso.nom }}</td>
                    <td>{{ curso.etapa }}</td>
                    <td v-html="curso.descripcio"></td>
                    <td>
                        <button @click="toggleVisibility(curso)" class="btn"
                            :class="{ 'btn-success': curso.visible, 'btn-error': !curso.visible }">
                            {{ curso.visible ? 'Visible' : 'No visible' }}
                        </button>
                    </td>

                    <td>
                        <button @click="deleteCurso(curso.id)" class="btn btn-red">Eliminar</button>
                    </td>
                    <td>
                        <Link :href="`/editar/${curso.id}`">Editar</Link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>


    <button @click="openGenerateJson" class="btn">Generar json dels cursos</button>
</template>
