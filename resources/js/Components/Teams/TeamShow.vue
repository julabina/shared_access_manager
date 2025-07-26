<template>
    <Link method="get" :href="route('team.show', { id: team.id })">
        <article class="border p-3">
            <p>{{ team.name }} <span v-if="owner" class="pl-7 text-red-600">Owner</span></p>
        </article>
    </Link>
</template>

<script setup>
    import { Link } from '@inertiajs/vue3';

    const props = defineProps({
        team: Object,
        owner: Boolean,
    });
</script>