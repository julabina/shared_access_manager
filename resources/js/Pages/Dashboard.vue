<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2
            class="text-xl font-semibold leading-tight text-gray-800"
            >
                Dashboard
            </h2>
        </template>

        <div>
            <Link :href="route('team.createDisplay')" method="get">
                <button class="btn-primary">
                    Créer une équipe
                </button>
            </Link>

            <div>
                <h1>Mes équipes</h1>

                <section>
                    <div v-if="userTeams && userTeams.length > 0" class="">
                        <Team v-for="(userTeam, ind) in userTeams" :key="'userTeam' + ind" :team="userTeam" owner />
                    </div>
                    <div v-if="teams && teams.length > 0" class="mt-2 pt-2 border-t-2 border-gray-400">
                        <Team v-for="(team, ind) in teams" :key="'team' + ind" :team="team.team" />
                    </div>
                </section>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
    import Team from '@/Components/Teams/TeamShow.vue';
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head, Link } from '@inertiajs/vue3';

    const props = defineProps({
        userTeams: Array,
        teams: Array,
    });
    
</script>