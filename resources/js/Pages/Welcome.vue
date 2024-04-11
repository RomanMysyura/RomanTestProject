<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Navbar from '@/Components/Navbar.vue';
import Carousel from '@/Components/Carrousel.vue';
import Cruds from '@/Components/Cruds.vue';

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

    <body class="bg-gray-100 h-full pb-10">

        <Navbar />

        <Carousel />

        <Cruds />




    </body>

</template>
