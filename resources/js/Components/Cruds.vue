<script>
import axios from 'axios';

export default {
    data() {
        return {
            name: '',
            isBold: false,
            isItalic: false,
            isUnderline: false,
            isStrikethrough: false // Nuevo dato para controlar el estilo de tachado
        };
    },
    methods: {
        submitForm() {
            let text = this.name;

            // Agrega etiquetas <strong> si está en negrita
            if (this.isBold) {
                text = `<strong>${text}</strong>`;
            }

            // Agrega etiquetas <em> si está en cursiva
            if (this.isItalic) {
                text = `<em>${text}</em>`;
            }

            // Agrega etiquetas <u> si está subrayado
            if (this.isUnderline) {
                text = `<u>${text}</u>`;
            }

            // Agrega etiquetas <s> si está tachado
            if (this.isStrikethrough) {
                text = `<s>${text}</s>`;
            }

            axios.post('/crear-crud', {
                name: text
            })
                .then(response => {
                    console.log(response.data);
                    window.location.reload();
                })
                .catch(error => {
                    console.error(error);
                });
        },
        toggleBold() {
            this.isBold = !this.isBold;
        },
        toggleItalic() {
            this.isItalic = !this.isItalic;
        },
        toggleUnderline() {
            this.isUnderline = !this.isUnderline;
        },
        toggleStrikethrough() {
            this.isStrikethrough = !this.isStrikethrough;
        }
    }
}
</script>

<template>
    <div class="max-w-md mx-auto mt-8">
        <h1 class="text-center text-4xl font-bold mb-8">Formularis CRUDS + WYSIWYG</h1>

        <div class="flex gap-1 justify-center mb-2  rounded p-0.5">
            <button type="button" @click="toggleBold" :class="{ 'bg-gray-300': isBold }"
                class="bg-gray-50 border-gray-300 p-1 text-xl rounded "><svg width="22px" height="22px"
                    viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M9 7V11H13C14.1046 11 15 10.1046 15 9C15 7.89543 14.1046 7 13 7H9ZM15.9365 11.7161C16.5966 11.0028 17 10.0485 17 9C17 6.79086 15.2091 5 13 5H8.5C7.67157 5 7 5.67157 7 6.5V12V18.5C7 19.3284 7.67157 20 8.5 20H13.5C15.9853 20 18 17.9853 18 15.5C18 13.9126 17.178 12.5171 15.9365 11.7161ZM13 13H9V18H13.5C14.8807 18 16 16.8807 16 15.5C16 14.1193 14.8807 13 13.5 13H13Z"
                        fill="#000000" />
                </svg></button>
            <button type="button" @click="toggleItalic" :class="{ 'bg-gray-300': isItalic }"
                class="bg-gray-50 border-gray-300 p-1 text-xl rounded  "><svg width="19px" height="19px"
                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="none">
                    <path stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 3L8 17m4-14H8m4 0h4M8 17H4m4 0h4" />
                </svg></button>
            <button type="button" @click="toggleUnderline" :class="{ 'bg-gray-300': isUnderline }"
                class="bg-gray-50 border-gray-300 p-1 text-xl rounded "><svg width="20px" height="20px"
                    viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4 21H20M18 4V11C18 14.3137 15.3137 17 12 17C8.68629 17 6 14.3137 6 11V4M4 3H8M16 3H20"
                        stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg></button>
            <button type="button" @click="toggleStrikethrough" :class="{ 'bg-gray-300': isStrikethrough }"
                class="bg-gray-50 border-gray-300 p-1 text-xl rounded line-through"><svg width="20px" height="20px"
                    viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M3 12H21M19 7.5V7.3125C19 4.93077 17.0692 3 14.6875 3H9.5C7.01472 3 5 5.01472 5 7.5C5 9.98528 7.01472 12 9.5 12H14.5C16.9853 12 19 14.0147 19 16.5C19 18.9853 16.9853 21 14.5 21H9.40625C6.97274 21 5 19.0273 5 16.5938V16.5"
                        stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg></button>
            <!-- Añade la clase 'line-through' para el tachado -->
        </div>

        <form @submit.prevent="submitForm" method="post" class="space-y-4 flex">
            <div class="join ml-auto mr-auto">
                <input v-model="name" type="text" id="name" name="name" class="input input-bordered join-item w-full"
                    placeholder="Nom element"
                    :style="{ 'font-weight': isBold ? 'bold' : 'normal', 'font-style': isItalic ? 'italic' : 'normal', 'text-decoration': isUnderline ? 'underline' : 'none', 'text-decoration': isStrikethrough ? 'line-through' : 'none' }" />
                <!-- Aplica el estilo de tachado -->
                <button type="submit" class="btn join-item rounded-r-full border-1 border-gray-300">Afegir</button>
            </div>
        </form>
    </div>
</template>
