<script setup>
import Layout from '../Layouts/Layout.vue';
import { Head } from '@inertiajs/vue3';


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
  <h1 class="text-red-700">Hi Vue.js is live</h1>
  <p>{{$page.component}}</p>
  <p>{{$page.props.auth.user}}</p>

  <div>
    <Link href="/" class="mt-[600px] block" preserve-scroll>Refresh </Link>
  </div>
</template>
