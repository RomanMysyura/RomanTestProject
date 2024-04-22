<script setup>
import { ref, defineProps } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import Navbar from '@/Components/Navbar.vue';

const props = defineProps({
  curso: Object
});

const isBold = ref(false);
const isItalic = ref(false);

function submitForm() {

  const descripcion = isBold.value ? `<strong>${props.curso.descripcio}</strong>` : props.curso.descripcio;


  const descripcionFinal = isItalic.value ? `<em>${descripcion}</em>` : descripcion;

  Inertia.post('/updatecurs', { curso: { ...props.curso, descripcio: descripcionFinal } })
    .then(() => {
    })
    .catch(error => {

      console.error('Error al enviar datos:', error);
    });
}

function toggleBold() {
  isBold.value = !isBold.value;
}

function toggleItalic() {
  isItalic.value = !isItalic.value;
}
</script>

<template>
  <Navbar />
  <div class="max-w-xl mx-auto mt-8">
    <h1 class="text-center text-3xl mb-8">Editar Curso</h1>
    <form @submit.prevent="submitForm" class="space-y-4">
      <div>
        <label for="nom" class="block mb-1">Nombre:</label>
        <input type="text" id="nom" class="input input-bordered w-full max-w-xs" v-model="curso.nom">
      </div>
      <div>
        <label for="etapa" class="block mb-1">Etapa:</label>
        <input type="text" id="etapa" class="input input-bordered w-full max-w-xs" v-model="curso.etapa">
      </div>
      <div>
        <label for="descripcio" class="block mb-1">Descripción:</label>
        <textarea id="descripcio" v-model="curso.descripcio"
          :style="{ fontWeight: isBold ? 'bold' : 'normal', fontStyle: isItalic ? 'italic' : 'normal' }"
          class="input input-bordered w-full max-w-xs"></textarea>
      </div>
      <div>
        <button type="button" @click="toggleBold" class="bg-gray-50 border-gray-300 p-1 text-xl rounded"
          aria-label="Negrita">
          <svg width="22px" height="22px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M9 7V11H13C14.1046 11 15 10.1046 15 9C15 7.89543 14.1046 7 13 7H9ZM15.9365 11.7161C16.5966 11.0028 17 10.0485 17 9C17 6.79086 15.2091 5 13 5H8.5C7.67157 5 7 5.67157 7 6.5V12V18.5C7 19.3284 7.67157 20 8.5 20H13.5C15.9853 20 18 17.9853 18 15.5C18 13.9126 17.178 12.5171 15.9365 11.7161ZM13 13H9V18H13.5C14.8807 18 16 16.8807 16 15.5C16 14.1193 14.8807 13 13.5 13H13Z"
              fill="#000000" />
          </svg>
        </button>

        <button type="button" @click="toggleItalic" class="bg-gray-50 border-gray-300 p-1 text-xl rounded"
          aria-label="Cursiva">
          <svg width="19px" height="19px" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="none">
            <path stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M12 3L8 17m4-14H8m4 0h4M8 17H4m4 0h4" />
          </svg>
        </button>

      </div>
      <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
  </div>



  
</template>


<style>
textarea {
  font-weight: normal;
  font-style: normal;
}
</style>