<script setup>
defineProps({
  name: String,
});
</script>
<template>
  <h2>About page {{ name }}</h2>
  <h6>Loading....</h6>
  <p>{{$page.component}}</p>
  <p>{{$page.props.auth.user}}</p>
</template>
