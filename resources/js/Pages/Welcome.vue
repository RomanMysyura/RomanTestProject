<script setup>
import { Head, Link } from '@inertiajs/vue3';

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


</script>

<template>

    <Head title="Test Project 2" />

    <body class="bg-sky-300 h-full">
        <h1 class="text-center text-4xl">Test Project 2 by Roman Mysyura</h1>
       

        <div class="carousel w-full">
            <div id="item1" class="carousel-item w-full">
                <img src="https://daisyui.com/images/stock/photo-1625726411847-8cbb60cc71e6.jpg" class="w-full" />
            </div>
            <div id="item2" class="carousel-item w-full">
                <img src="https://daisyui.com/images/stock/photo-1609621838510-5ad474b7d25d.jpg" class="w-full" />
            </div>
            <div id="item3" class="carousel-item w-full">
                <img src="https://daisyui.com/images/stock/photo-1414694762283-acccc27bca85.jpg" class="w-full" />
            </div>
            <div id="item4" class="carousel-item w-full">
                <img src="https://daisyui.com/images/stock/photo-1665553365602-b2fb8e5d1707.jpg" class="w-full" />
            </div>
        </div>
        <div class="flex justify-center w-full py-2 gap-2">
            <a href="#item1" class="btn btn-xs">1</a>
            <a href="#item2" class="btn btn-xs">2</a>
            <a href="#item3" class="btn btn-xs">3</a>
            <a href="#item4" class="btn btn-xs">4</a>
        </div>




    </body>

</template>
