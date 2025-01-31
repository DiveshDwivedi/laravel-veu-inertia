<script setup>
    import { reactive } from 'vue';
    import { router } from '@inertiajs/vue3'

    const formData = reactive({
        name: null,
        email: null,
        password: null,
        password_confirmation: null,
    });

    const submit = () => {
        router.post('/register', formData);
    }

</script>

<template>
  <Head title="register" />
  <div class="w-2/4 mx-auto bg-slate-800 p-8">
    <h1 class="title text-center font-bold text-green-300">Register a new account</h1>
    <form class="text-white p-5" @submit.prevent="submit">
      <div class="mb-6">
        <label for="name">Name : </label>
        <input type="text" v-model="formData.name" class="text-black" />
      </div>
      <div class="mb-6">
        <label for="email">Email : </label>
        <input type="text" v-model="formData.email" class="text-black" />
      </div>
      <div class="mb-6">
        <label for="password">Password : </label>
        <input type="password" v-model="formData.password" class="text-black" />
      </div>
      <div class="mb-6">
        <label for="password_confirmation">Confirm Password : </label>
        <input type="password" v-model="formData.password_confirmation" class="text-black" />
      </div>
      <div>
        <button class="text-center mx-20 border bottom-2 p-1" type="submit">Submit</button>
      </div>
    </form>
  </div>
</template>
