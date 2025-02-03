<script setup>
</script>

<template>
    <div>
        <header class="bg-blue-400 text-white">
            <nav class="flex items-center p-4 justify-between max-w-screen-lg mx-auto">
               <div class="space-x-6">
                <Link :href="route('home')" :class="{'bg-slate-700 p-1' : $page.component == 'Home'}">Home</Link>
                <Link :href="route('about')" :class="{'bg-slate-700 p-1' : $page.component == 'About'}">About</Link>
                <Link :href="route('contact')" :class="{'bg-slate-700 p-1' : $page.component == 'Contact'}">Contact us</Link>
               </div>
               <div v-if="$page.props.auth.user" class="space-x-6 flex">
               <img :src="'/storage/' + $page.props.auth.user.avatar" alt="avatar" class="w-7 h-7">
                <Link :href="route('dashboard')" :class="{'bg-slate-700 p-1' : $page.component == 'Auth/Dashboard'}" >Dashboard</Link>
                <Link :href="route('logout')" method="post" as="button">Logout</Link>
               </div>
               <div v-else class="space-x-6">
                <Link :href="route('register')" :class="{'bg-slate-700 p-1' : $page.component == 'Auth/Register'}">Register</Link>
                <Link :href="route('login')" :class="{'bg-slate-700 p-1' : $page.component == 'Auth/Login'}">Login</Link>
               </div> 
            </nav>
        </header>
        <main class="p-4">
          <slot></slot>  
        </main>
    </div>
</template>
