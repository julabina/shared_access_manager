<template>
    <article class="border p-3 flex h-16 items-center">
        <input @change="updateIsCheck" v-model="isChecked" type="checkbox" id="">
        <p class="ml-4">{{ user.user.email }}</p>
    </article>
</template>

<script setup>
    import { ref } from 'vue';

    const isChecked = ref(false);

    const props = defineProps({
        user: Object,
        add: Function,
        rem: Function,
    });
    
    const updateIsCheck = () => {
        if (isChecked.value) {
            return props.add();
        } else {
            return props.rem();
        }
    };
</script>