<script setup>
import Navbar from '@/Components/Navbar.vue';
import { Head } from '@inertiajs/vue3';
import axios from 'axios';

// Variables de datos para el formulario
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
</script>

<template>
    <Navbar />
    
    <Head title="Gestio cursos" />
    <h1 class="text-center text-2xl">Gestio cursos</h1>

    <form @submit.prevent="submitForm">
        <div>
            <label for="nom">Nombre:</label>
            <input type="text" id="nom" class="input input-bordered w-full max-w-xs" v-model="formData.nom" required>
        </div>
        <div>
            <label for="etapa">Etapa:</label>
            <input type="text" id="etapa" class="input input-bordered w-full max-w-xs" v-model="formData.etapa" required>
        </div>
        <div>
            <label for="descripcio">Descripción:</label>
            <textarea id="descripcio" class="input input-bordered w-full max-w-xs" v-model="formData.descripcio" required></textarea>
        </div>
        <div>
            <label for="visible">Visible:</label>
            <input type="checkbox" id="visible" class="checkbox" v-model="formData.visible">
        </div>
        <button type="submit" class="btn">Guardar</button>
    </form>










    <div class="overflow-x-auto">
  <table class="table">
    <!-- head -->
    <thead>
      <tr>
        <th></th>
        <th>Name</th>
        <th>Job</th>
        <th>Favorite Color</th>
      </tr>
    </thead>
    <tbody>
      <!-- row 1 -->
      <tr>
        <th>1</th>
        <td>Cy Ganderton</td>
        <td>Quality Control Specialist</td>
        <td>Blue</td>
      </tr>
      <!-- row 2 -->
      <tr>
        <th>2</th>
        <td>Hart Hagerty</td>
        <td>Desktop Support Technician</td>
        <td>Purple</td>
      </tr>
      <!-- row 3 -->
      <tr>
        <th>3</th>
        <td>Brice Swyre</td>
        <td>Tax Accountant</td>
        <td>Red</td>
      </tr>
    </tbody>
  </table>
</div>







</template>
