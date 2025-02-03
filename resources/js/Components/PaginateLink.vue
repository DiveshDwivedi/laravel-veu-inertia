<script setup>
defineProps({
    paginator: {
        type: Object,
        required: true,
    }
})
</script>

<template>

  <Link 
    v-for="(link, index) in paginator.links" 
    :key="index" 
    :href="link.url" 
    v-html="link.label" 
    class="p-1 mx-1"
    :class="{
      'text-gray-500 cursor-not-allowed': !link.url, 
      'font-bold text-blue-500': link.active
    }"
  />

</template>