<script setup>
import { Head, Link } from "@inertiajs/vue3";
import Navbar from "../Components/Navbar.vue";

defineProps({
    quizcategories: Object,
});
</script>

<template>
    <Head title="Welcome" />
    <Navbar />

    <section class="bg-color">
        <!-- Page Container -->
        <div class="bg-color flex flex-wrap mb-2 pt-6">
            <div class="w-full md:w-8/12 lg:w-12/12 px-8 lg:ml-10">
                <!-- Header -->
                <h1 class="text-white text-4xl font-bold">Quiz Me</h1>

                <!-- Description -->
                <p class="text-white text-lg font-light">
                    We are coming to test you on the various lessons we
                    practiced together and we need you to select a card and
                    begin the quiz
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
                                v-for="c in quizcategories"
                                :key="c.id"
                                class="w-full md:w-6/12 lg:w-3/12 mb-6 px-6 sm:px-6 lg:px-4"
                            >
                                <div class="flex flex-col">
                                    <!-- Avatar -->
                                    <a
                                        v-bind:href="route('quiz.show', c.id)"
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
        <div class="">
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

.logo {
    width: 120px;
    margin-left: 20px;
}

.logo2 {
    width: 220px;
    margin-left: 20px;
    height: 60px;
}
.nav-icon {
    height: 60px;
    width: 60px;
}

.bg-img {
    position: relative;
}

.heading1 {
    position: flex;

    font-family: "Gorditas";
    font-style: normal;
    font-weight: 700;
    font-size: 24px;
    /* identical to box height, or 112% */

    text-transform: uppercase;

    color: #000000;
}
.paragraph1 {
    position: flex;
    top: 10px;

    font-family: "Gorditas";
    font-style: normal;
    font-weight: 400;
    font-size: 16px;
    /* or 200% */

    letter-spacing: 0.07em;

    color: rgba(0, 0, 0, 0.83);
}
.section2 {
}

.bg-btn-color {
    background: #f58c28;
}
.bg-adminbtn-color {
    background:  rgb(59 130 246);
}
.kid-icon {
    position: relative;
    width: 117.38px;
    height: 128.42px;
    left: 1197px;
    z-index: 1;
}
</style>
