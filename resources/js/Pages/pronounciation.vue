<script setup>
import { Head, Link } from "@inertiajs/vue3";
import Navbar from "../Components/Navbar.vue";

defineProps({
    categories: Object,
});
</script>

<template>
    <Head title="Welcome" />

    <Navbar />

    <section class="bg-color">
 <!-- Page Container -->
 <div class="container mt-6 mx-auto px-1">
            <div class="flex flex-wrap -mx-1 lg:-mx-4">
                <div class="flex flex-col">
                    <div class="container px-4">
                        <div class="flex flex-wrap">
                            <!-- N0 #1 -->
                            <div
                                class="w-full  mb-6 px-1 sm:px-6 lg:py-4"
                            >
                            <h1 class="text-white text-5xl font-bold">Pronunciation </h1>
            
                            <!-- Description -->
                            <p class="text-white text-xl font-light pt-4">
                                We will be learning and practicing how to pronounce words in Spanish. Click on a flashcard, and let's begin learning how to hear and speak Spanish well. We will have lots of 
                                fun as you listen to how words should be pronounced and record your own pronunciations for me to hear.
                            </p>
                     
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page Container -->
        <div class="container my-6 mx-auto px-1">
            <div class="flex flex-wrap -mx-1 lg:-mx-4">
                <div class="flex flex-col mt-6">
                    <div class="container px-4">
                        <div class="flex flex-wrap">
                            <!-- N0 #1 -->
                            <div
                                v-for="c in categories"
                                :key="c.id"
                                class="w-full md:w-6/12 lg:w-3/12 mb-6 px-1 sm:px-6 lg:py-4"
                            >
                                <div class="flex flex-col">
                                    <!-- Avatar -->
                                    <a
                                        v-bind:href="route('voice.show', c.id)"
                                        class="mx-auto"
                                    >
                                        <img
                                            class="rounded-2xl h-[35vh] drop-shadow-md hover:drop-shadow-xl transition-all duration-200 delay-100"
                                            :src="
                                                '/img/category/' +
                                                c.category_image
                                            "
                                        />
                                    </a>

                                    <!-- Details -->
                                    <div class="text-center mt-6">
                                        <!-- Name -->
                                        <h1
                                            class="text-white text-xl font-bold mb-1"
                                        >
                                            {{ c.category_name }}
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-color">
            <hr class="hr" />
            <div class="flex flex-col inline-block">
                <span class="inline-block text-white text-center p-4">
                    Copyright <span>&copy;</span>
                    <a href="https://branchoutwithspanish.com/"
                        > BranchoutwithSpanish.com 2023 </a
                    >
                </span>
                <span
                    class="inline-block justify-end text-white text-center p-4 mt-3 mb-3"
                >
                    <Link
                        href="/admin/login"
                        class="py-4 px-8 bg-adminbtn-color hover:bg-white hover:text-blue-500 hover:border border rounded-lg border-white"
                        >Admin Login</Link
                    >
                </span>
            </div>
        </div>
    </section>
</template>

<style>
nav {
    z-index: 30;
}
body{
    background: #007fff;
}
.logo {
    width: 120px;
    margin-left: 20px;
}
.nav-icon {
    height: 60px;
    width: 60px;
}

.bg-img {
    position: relative;
}
.bg-btn-color {
    background: #f58c28;
}
.bg-adminbtn-color {
    background:  rgb(59 130 246);
}
</style>
