<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>

        <Link  class="login hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-white text-blue-400 hover:bg-blue-50 text-sm hover:text-white border border-primary font-bold transition duration-200">Log in</Link>

        <Link
            class="register hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-blue-500 hover:bg-white hover:text-blue-500 hover:border border-primary hover:text-blue text-sm text-white font-bold transition duration-200"
            >Register
        </Link>
        </div>

        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg"
        >
            <slot />
        </div>
    </div>
</template>
