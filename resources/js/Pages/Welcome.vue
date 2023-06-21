<script setup>
import { Head, Link } from "@inertiajs/vue3";
import Navbar from "../Components/Navbar.vue";

defineProps({
    categories: Object,
});
</script>

<template>
    <Head title="Home" />

    <Navbar />

    <section class="bg-color w-full hero-section">
        <div class="flex">
            <img src="img/hero.png" class="hero-img container-fluid" />
        </div>
    </section>

    <div class="lg:mr-0 lg:ml-0 sm:mx-6 justify-center bg-white">
        <br />

        <h2 class="my-4 text-2xl px-4 lg:ml-48 lg:mr-48">
            <b>Learning Strategy</b>
        </h2>

        <p
            class="items-center tracking-wider justify-between px-4 text-l lg:ml-48 lg:mr-48 mb-6"
        >
            Hello, students! Welcome to your Spanish learning site. Here you
            will find some fun and effective ways to learn Spanish. When
            learning a foreign language, it is important to study a little
            everyday. Plan to spend some-time each day practicing pronunciation
            and learning and learning vocabulary, verbs, and phrases. For most
            students, it is more effective to study in smaller increments (15-20
            minutes, 2-3 time a day). Most of all, have fun and never be afraid
            to make mistakes. Little by little, you will go far. Happy learning!
        </p>
        <br />
    </div>

    <section class="bg-color relative" > 
    <div class="kid-container hidden-small">
        <img src="/img/kid-icon.png" class="kid-icon  ">
    </div>
        <!-- Page Container -->
        <div class="container my-12 mx-auto px-1">
            <br />
            <h2
                class="my-4 text-2xl px-4 justify-center text-center text-gray-50"
            >
                Start Learning Spanish With Our Flashcards
            </h2>
            <div class="flex flex-wrap -mx-1 lg:-mx-4">
                <div class="flex flex-col mt-16">
                    <div class="container px-4">
                        <div class="flex flex-wrap">
                            <!-- N0 #1 -->
                            <div
                                v-for="c in categories"
                                :key="c.id"
                                class="w-full md:w-6/12 lg:w-4/12 mb-6 px-1 sm:px-6 lg:py-4"
                            >
                                <div class="flex flex-col">
                                    <!-- Avatar -->
                                    <a
                                        v-bind:href="route('card.show', c.id)"
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
            <div class="flex justify-center p-4">
                <Link
                    class="py-2 px-6 mb-5 pb-5 pt-5 bg-btn-color hover:bg-white hover:text-blue-500 hover:border border-white hover:text-yellow-700 text-sm text-white font-bold transition duration-200"
                    href="/flashcards"
                    >Explore More
                </Link>
            </div>

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
* {
    font-famiy: "Lato";
}
body {
    background-color: white;
}
.bg-color {
    background: #007fff;
}
.bg-btn-color {
    background: #f58c28;
}
.bg-adminbtn-color {
    background:  rgb(59 130 246);
}
.nav {
    z-index: 30;
    overflow: hidden;
    overflow-x: inherit;
}

.hero-container {
    display: inline-flex;
    background-size: cover;
}
.hero-img {
    width: 100%;
}
.hero {
    width: 100%;
}
.section2 {
    line-height: 2;
    padding: 70px 190px;
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
.admin-log {
    float: right;
}
.kid-icon{
    --height :  298.42px; 
    position: absolute;
width: 250.38px;
height: var(--height);
left: 80%;
top: calc(var(--height) * -0.5);

}
.hidden-small {
      display: block;
    }

    @media (max-width: 768px) {
      .hidden-small {
        display: none;
      }
    }
</style>
