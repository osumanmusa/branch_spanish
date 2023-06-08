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
        <div class="bg-color flex flex-wrap mb-2 pt-6">
            <div class="w-full md:w-8/12 lg:w-12/12 px-8">
                <!-- Header -->
                <h1 class="text-white text-4xl font-bold">Pronounciation</h1>

                <!-- Description -->
                <p class="text-white text-lg font-light">
                    We will be learning and practicing Spanish with flash cards.
                    We will have lots of fun. In this section there are various
                    topics with flash cards, select a card and let’s begin
                </p>
            </div>
        </div>

        <!-- Page Container -->
        <div class="container my-12 mx-auto px-1">
            <div class="flex flex-wrap -mx-1 lg:-mx-4">
                <div class="flex flex-col mt-16">
                    <div class="container px-4">
                        <div class="flex flex-wrap">
                            <!-- N0 #1 -->
                            <div
                                v-for="c in categories"
                                :key="c.id"
                                class="w-full md:w-6/12 lg:w-3/12 mb-6 px-6 sm:px-6 lg:px-4"
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
                    Copyright @2013
                    <a href="https://branchoutwithspanish.com/"
                        >BranchOutWithSpanish.com</a
                    >
                </span>
                <span
                    class="inline-block justify-end text-white text-center p-4 mt-3 mb-3"
                >
                    <Link
                        href="/admin/login"
                        class="py-4 px-8 bg-btn-color hover:bg-white hover:text-blue-500 hover:border border-white"
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
</style>
