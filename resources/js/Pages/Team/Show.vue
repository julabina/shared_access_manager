<template>
    <Head :title="props.team.name" />

    <AuthenticatedLayout>
        <div class="">
            <h1>{{ props.team.name }}</h1>
            <p v-if="props.team.description">{{ props.team.description }}</p>
        </div>

        <div class="border p-3 m-4">
            <p class="text-red-600 text-xs">ADD USER , NOT FINAL VERSION MAYBE TO DELETE</p>
            <div class="flex flex-col">
                <label for="">Email</label>
                <input v-model="addEmail" type="email" id="">
            </div>

            <input @click="addByEmail" type="button" value="Ajouter" class="btn-primary">
        </div>

        <List :list="team.team_users" />

    </AuthenticatedLayout>
</template>

<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import List from '@/Components/Teams/List.vue';
    import { Head, router } from '@inertiajs/vue3';
    import { ref } from 'vue';

    const addEmail = ref('');

    const props = defineProps({
        team: Object,
    });

    console.log(props.team);
    

    const addByEmail = () => {
        if (addEmail.value !== '') {
            router.visit(route('team.addUserByMail', { id: props.team.id }), {
                method: "post",
                data: {
                    email: addEmail.value,
                }
            });
        }
    };
    
</script>