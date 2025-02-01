<script setup>
const model = defineModel({
    type: null,
    required: true,
});

defineProps({
    name: {
        type: String,
        required: true,
    },
    for: String,
    type: {
        type: String,
        default: "text",
    },
    message: String,
});
</script>
<template>
    <div class="mb-6">
        <label :for="for">{{ name }} : </label>
        <input :type="type" v-model="model" class="text-black" />
        <div class="error text-red-500" v-if="message">{{ message }}</div>
    </div>
</template>
