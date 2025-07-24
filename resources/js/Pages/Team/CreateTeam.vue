<template>
    <Head title="Créer une équipe" />

    <AuthenticatedLayout>
        <template #header>
            <h2
            class="text-xl font-semibold leading-tight text-gray-800"
            >
                Teams
            </h2>
        </template>

        <div>
            <h1>Créer une équipe</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt rem libero itaque quo eligendi harum ipsum perspiciatis, voluptatem repellat repudiandae consectetur numquam porro eum vitae officia possimus dolor asperiores repellendus suscipit fugit animi. Sequi, odit! Alias temporibus iure culpa, repellat eveniet pariatur fuga odio nesciunt optio saepe assumenda reprehenderit quos.</p>

            <form @submit.prevent="create" class="mt-4">
                <div class="flex flex-col">
                    <label for="">Nom*</label>
                    <input v-model="createForm.name" type="text" name="" id="">
                </div>

                <div class="flex flex-col">
                    <label for="">Description</label>
                    <textarea v-model="createForm.description" id="" class="resize-y"></textarea>
                </div>

                <input type="submit" value="Créer" class="btn-primary">
            </form>
        </div>

    </AuthenticatedLayout>
</template>

<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head, router, useForm } from '@inertiajs/vue3';

    const createForm = useForm({
        name: '',
        description: '',
    });

    const create = () => {
        if (createForm.name !== '') {
            router.visit(route('team.store'), {
                method: 'post',
                data : createForm
            });
        }
    };
</script>