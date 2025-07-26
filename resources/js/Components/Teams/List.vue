<template>
    <div class="">
        <div class="border">
            <button @click="" class="btn-primary"><i class="fa-solid fa-users"></i></button>
            <button @click="" class="btn-primary"><i class="fa-solid fa-pause"></i></button>
            <button @click="removeUsers" class="btn-primary"><i class="fa-solid fa-trash"></i></button>
        </div>
        <UserForList  v-for="(a, ind) in list" :key="'listUserForTeam' + ind" :user="a" :add="() => updateSelectedUser(a.user.id, true)" :rem="() => updateSelectedUser(a.user.id, false)"/>
    </div>
</template>

<script setup>
    import UserForList from '@/Components/Teams/UserForList.vue';
    import { ref } from 'vue';
    import { router } from '@inertiajs/vue3';

    const selectedUser = ref([]);

    const props = defineProps({
        list: Array,
        teamId: Number,
    });
    
    const updateSelectedUser = (id, isChecked) => {
        let selected = false;
        
        if (selectedUser.value.includes(id)) {
            selected = true;
        }

        if (isChecked && !selected) {
            selectedUser.value.push(id);
        } else if (!isChecked && selected) {
            let arr = selectedUser.value.filter((el) => {
                if (el !== id) {
                    return el;
                }
            })

            selectedUser.value = arr;
        }        
    };
    
    const removeUsers = () => {
        if (selectedUser.value.length > 0) {
            router.visit(route('team.removeUsers', { id: props.teamId }), {
                method: "delete",
                data: {
                    list: selectedUser.value
                }
            });
        }
    };
</script>