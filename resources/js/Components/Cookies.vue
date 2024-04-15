<script>
    export default {
        mounted() {
            // Verificar si la cookie de aceptación existe
            if (!this.cookieAccepted()) {
                // Mostrar el mensaje de la cookie si no ha sido aceptada previamente
                document.querySelector('.fade').style.display = 'block';
            }
        },
        methods: {
            acceptCookie() {
                // Ocultar el mensaje de la cookie
                document.querySelector('.fade').style.display = 'none';

                // Guardar la aceptación en una cookie con una duración de 30 días
                const expirationDate = new Date();
                expirationDate.setDate(expirationDate.getDate() + 30);
                document.cookie = "cookie_accepted=true; expires=" + expirationDate.toUTCString() + "; path=/";
            },
            cookieAccepted() {
                // Comprobar si la cookie de aceptación existe
                return document.cookie.split(';').some((cookie) => cookie.trim().startsWith('cookie_accepted='));
            }
        }
    }
</script>

<template>
    <div class="fixed bottom-0 p-6 w-full flex justify-center z-[2000]">
        <div v-if="!cookieAccepted()" class="bg-white bg-opacity-95 text-xs rounded-md fade w-[450px] show">
            <div class="p-4 flex items-center justify-between px-6 rounded border border-green-700">
                <p>
                    By using XYZ, you agree to our
                    <a class="underline font-bold" href="#" target="_blank">Cookies Policy.</a>
                </p>
                <button @click="acceptCookie" type="button" class="px-5 py-3 rounded-lg text-white bg-green-700 hover:bg-green-800 ml-1.5 min-w-max">Accept</button>
            </div>
        </div>
    </div>
</template>
