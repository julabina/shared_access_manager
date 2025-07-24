<template>
    <Head :title="props.team.name" />

    <AuthenticatedLayout>
        <h1>{{ props.team.name }}</h1>
        <p v-if="props.team.description">{{ props.team.description }}</p>
    </AuthenticatedLayout>
</template>

<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head } from '@inertiajs/vue3';

    const props = defineProps({
        team: Object,
    });

    console.log(props.team);
    
</script>