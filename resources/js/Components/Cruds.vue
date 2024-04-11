<template>
    <div class="max-w-md mx-auto mt-8">
        <h1 class="text-center text-4xl font-bold mb-8">Formularis CRUDS</h1>
        <form @submit.prevent="submitForm" method="post" class="space-y-4 flex">
            <div class="join ml-auto mr-auto">
                <input v-model="name" type="text" id="name" name="name"  class="input input-bordered join-item" placeholder="Nom element" />
                <button type="submit" class="btn join-item rounded-r-full border-1 border-gray-300">Afegir</button>
            </div>
        </form>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            name: ''
        };
    },
    methods: {
        submitForm() {
            // Enviar les dades a través d'Axios
            axios.post('/crear-crud', {
                name: this.name
            })
            .then(response => {
                // Si la crida és exitosa, pots gestionar la resposta aquí
                console.log(response.data);
            })
            .catch(error => {
                // Si hi ha algun error, pots gestionar l'error aquí
                console.error(error);
            });
        }
    }
}
</script>
