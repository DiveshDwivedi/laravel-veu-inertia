<script setup>
    defineProps({
        type: {
            type: String,
            default: 'submit'
        },
        name: {
            type: String,
            required: true
        },
        disabled: String
    })
</script>
<template>
    <div>
        <button
            class="text-center mx-20 border bottom-2 p-1"
            :disabled="disabled"
            :type="type"
        >
            {{name}}
        </button>
    </div>
</template>
