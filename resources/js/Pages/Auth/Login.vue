<script setup>
import { useForm } from "@inertiajs/vue3";
import InputText from "../../Components/InputText.vue";
import Button from "../../Components/Button.vue";
// import { InputText, Button } from "../../Components";

const formData = useForm({
    email: null,
    password: null,
    remember: null,
});

const submit = () => {
    formData.post("/login", {
        onError: () => formData.reset('password'),
    });
};
</script>
<template>
    <div class="w-2/4 mx-auto bg-slate-800 p-8">
        <h1 class="title text-center font-bold text-green-300">
            Login to Account
        </h1>
        <form class="text-white p-5" @submit.prevent="submit">
            <InputText
                for="email"
                type="text"
                name="email"
                v-model="formData.email"
                :message="formData.errors.email"
            />
            
            <InputText
                for="password"
                type="password"
                name="password"
                v-model="formData.password"
                :message="formData.errors.password"
            />

            <InputText
                for="checkbox"
                type="checkbox"
                name="Remember Me"
                v-model="formData.remember"
            />

            <Button name="Submit" :disabled="formData.processing" />
        </form>
    </div>
</template>
