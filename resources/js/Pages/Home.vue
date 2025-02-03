<script setup>
// import Layout from '../Layouts/Layout.vue';
import { Head } from '@inertiajs/vue3';
import PaginateLink from "../Components/PaginateLink.vue";


defineProps({
  users: Object,
});

const getDate = (date) => {
  return new Date(date).toLocaleDateString('en-us', {
    year: 'numeric',
    month: 'long',
    day: 'numeric'
  });
}
// defineOptions({layout: Layout});

/**
 * defineOptions(): Declares the component options like props, methods, name in a structured way.
 * defineProps(): Defines the props a component can receive.
 * defineEmits(): Defines custom events the component can emit.
 * defineExpose(): Exposes properties or methods to the parent component or elsewhere.
 */

</script>
<template>
  <Head :title="' | ' + $page.component" />

  <div>
    <table>
      <thead>
      <tr class="bg-slate-500">
      <th>Avatar</th>
      <th>Name</th>
      <th>Email</th>
      <th>Registration Date</th>
      </tr>
      </thead>
      <tbody>
        <tr v-for="user in users.data" :key="user.id">
        <td><img class="w-28 h-28 rounded-full" :src="'storage/' + user.avatar ?? ''" alt=""></td>
        <td>{{user.name}}</td>
        <td>{{user.email}}</td>
        <td>{{ getDate(user.created_at)}}</td>
        </tr>
      </tbody>
    </table>
  </div>
 
<PaginateLink :paginator="users" />
</template>
