<script setup>
</script>

<template>
    <div>
        <header class="bg-blue-400 text-white">
            <nav class="flex items-center p-4 justify-between max-w-screen-lg mx-auto">
               <div class="space-x-6">
                <Link :href="route('home')">Home</Link>
                <Link :href="route('about')">About</Link>
                <Link :href="route('contact')">Contact us</Link>
               </div>
               <div v-if="$page.props.auth.user">
                <Link :href="route('logout')" method="post" as="button">Logout</Link>
               </div>
               <div v-else class="space-x-6">
                <Link :href="route('register')">Register</Link>
                <Link :href="route('login')">Login</Link>
               </div> 
            </nav>
        </header>
        <main class="p-4">
          <slot></slot>  
        </main>
    </div>
</template>
