<script setup>
import { Head } from '@inertiajs/vue3';
defineProps({
    curs: Number,
});
</script>

<template>

    <Head title="Editar curs" />
    {{ curs }}

    <h1>Curs ID: {{ curs.id }}</h1>
</template>
