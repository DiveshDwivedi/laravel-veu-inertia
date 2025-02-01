<script setup>
import { useForm } from "@inertiajs/vue3";
import InputText from "../../Components/InputText.vue";

const formData = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
});

const submit = () => {
    formData.post("/register");
};
</script>

<template>
    <Head title="register" />
    <div class="w-2/4 mx-auto bg-slate-800 p-8">
        <h1 class="title text-center font-bold text-green-300">
            Register a new account
        </h1>
        <form class="text-white p-5" @submit.prevent="submit">
            <InputText
                for="name"
                type="text"
                name="name"
                v-model="formData.name"
                :message="formData.errors.name"
            />
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
                for="password"
                type="password"
                name="password_confirmation"
                v-model="formData.password_confirmation"
            />
            <div>
                <button
                    class="text-center mx-20 border bottom-2 p-1"
                    :disabled="formData.processing"
                    type="submit"
                >
                    Submit
                </button>
            </div>
        </form>
    </div>
</template>
