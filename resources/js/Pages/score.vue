<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";
import Navbar from "../Components/Navbar.vue";
import paginate from "../Components/paginate.vue";
import { shuffle as _shuffle } from "lodash-es";

const props = defineProps({
    score: Object,
    totalanswer: Object,
    grade: Object,
    user_score: Object,
});
</script>

<template>
    <Head title="Welcome" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <Navbar />

    <section>
        <!-- Page Container -->

        <div class="container my-12 mx-auto px-4 md:px-12">
            <div class="flex flex-wrap justify-center mx-1 lg:-mx-4">
                <div class="w-full md:w-8/12 lg:w-12/12 lg:px-16">
                    <!-- Header -->
                    <h1 class="lg:px-16 text-white text-4xl font-bold"></h1>
                </div>

                <!-- Column -->

                <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/2">
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <transition name="flip" mode="out-in">
                                <div class="flip-card-front">
                                    <!-- Article -->
                                    <article
                                        class="overflow-hidden rounded-lg bg-white border border-yellow-500 box"
                                    >
                                        <header
                                            class="flex items-center justify-center leading-tight p-2 md:p-4 h-[50vh]"
                                        >
                                            <div class="grid grid-cols-2 gap-1">
                                                <div>
                                                    <img src="/img/c1.png" />
                                                </div>
                                                <!-- ... -->
                                                <div class="text-4xl">
                                                    <h1
                                                        class="text-gray-700 text-4xl"
                                                    >
                                                        Well Done
                                                    </h1>
                                                    <h2>You Scored:</h2>
                                                    <p>
                                                        <b
                                                            >{{ $props.score }}
                                                            /
                                                            {{
                                                                $props.totalanswer
                                                            }}</b
                                                        >
                                                    </p>
                                                    <hr />
                                                    <p>
                                                        <b
                                                            >{{
                                                                $props.user_score
                                                            }}%
                                                            {{
                                                                $props.grade
                                                            }}</b
                                                        >
                                                    </p>
                                                    <p><b></b></p>
                                                </div>
                                            </div>
                                        </header>
                                    </article>
                                    <!-- END Article -->
                                </div>
                            </transition>
                        </div>
                    </div>
                    <div
                        class="flex flex-wrap justify-center mx-1 lg:-mx-4 lg:my-12"
                    >
                        <div class="flex items-center justify-between">
                            <Link
                                :href="route('quizme')"
                                Class="lg:ml-auto mx-1 lg:mr-3 py-4 px-6 bg-btn-color font-bold rounded text-gray-900 hover:bg-white hover:text-blue-500  hover:text-blue text-sm border border-primary-100 font-bold transition duration-200 "
                            >
                                Next Card
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="">
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
</template>

<style>
/* body{
        background-color:  rgb(29 78 236);
    } */

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

.kid-icon {
    position: relative;
    width: 117.38px;
    height: 128.42px;
    left: 1197px;
    z-index: 1;
}
.flip-card {
    background-color: transparent;
    perspective: 1000px; /* Remove this if you don't want the 3D effect */
}
.box {
    border: 10px solid rgba(255, 166, 0, 0.925);
}

/* This container is needed to position the front and back side */
.flip-card-inner {
    position: relative;
    width: 100%;
    text-align: center;
    transition: transform 0.8s;
    transform-style: preserve-3d;
}
.bg-btn-color {
    background: #f58c28;
} /* 1. declare transition */
.shuffle-move,
.shuffle-enter-active,
.shuffle-leave-active {
    transition: all 0.5s cubic-bezier(0.55, 0, 0.1, 1);
}

/* 2. declare enter from and leave to state */
.shuffle-enter-from,
.shuffle-leave-to {
    opacity: 0;
    transform: scaleY(0.01) translate(30px, 0);
}

/* 3. ensure leaving items are taken out of layout flow so that moving
      animations can be calculated correctly. */
.shuffle-leave-active {
    position: absolute;
}
/* 1. declare transition */
.flip-enter-active {
    animation: flip-in 0.5s;
}
.flip-leave-active {
    animation: flip-in 0.5s reverse;
}
@keyframes flip-in {
    0% {
        transform: scaleX(0);
    }
    50% {
        transform: scaleX(1);
    }
    100% {
        transform: scaleX(1);
    }
}
</style>
