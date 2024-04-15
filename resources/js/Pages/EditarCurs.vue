<template>
    <div>
        <h1 class="text-center text-3xl">Editar Curs</h1>
        <form @submit.prevent="submitForm">
            <div>
                <label for="nom">Nombre:</label>
                <input type="text" id="nom" v-model="curso.nom">
            </div>
            <div>
                <label for="etapa">Etapa:</label>
                <input type="text" id="etapa" v-model="curso.etapa">
            </div>
            <div>
                <label for="descripcio">Descripción:</label>
                <textarea id="descripcio" v-model="curso.descripcio"></textarea>
            </div>
            <button type="submit">Guardar Cambios</button>
        </form>
    </div>
</template>

<script setup>
import { ref, defineProps } from 'vue';
import { Head } from '@inertiajs/vue3';
import { Inertia } from '@inertiajs/inertia';

const props = defineProps({
    curso: Object 
});

function submitForm() {
    Inertia.post('/updatecurs', { curso: props.curso })
        .then(() => {
            // Manejar respuesta del servidor si es necesario
        })
        .catch(error => {   
            // Manejar error si es necesario
            console.error('Error al enviar datos:', error);
        });
}
</script>
