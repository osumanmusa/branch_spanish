<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";
import Navbar from "../Components/Navbar.vue";
import paginate from "../Components/paginate.vue";
import { shuffle as _shuffle } from "lodash-es";
import { Modal } from "flowbite";

const props = defineProps({
    flashcards: Object,
    flashcard: Object,
    category:Object,
    successmessage: Object,
    errormessage: Object,
});
const flashcards = ref([]);
const cardKey = ref();
if (props.flashcard.data.length > 0) {
    cardKey.value = props.flashcard.data[0].flashcard_frontcontent;
}
function Shuffle() {
    flashcards.value = _shuffle(props.flashcards);
}
onMounted(() => {
    Shuffle();
    cardKey;
    handelFlip();
});

const hasFipped = ref(false);
const handelFlip = () => {
    if (!hasFipped.value) {
        cardKey.value = props.flashcard.data[0].flashcard_frontcontent;
    } else {
        cardKey.value = props.flashcard.data[0].flashcard_backcontent;
    }
    hasFipped.value = !hasFipped.value;

    //window.alert(cardKey.value + hasFipped.value);
};
</script>

<template>
    <Head title="Welcome" />
 

    <Navbar />

    <section class="bg-color" v-if="cardKey">
        <transition name="fade" mode="out-in">
            <div
                v-if="$page.props.flash.successmessage"
                class="tostr flex mt-2 items-center w-full max-w-xs p-4 space-x-4 text-green-500 bg-white divide-x divide-gray-200 rounded-lg shadow dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800"
                role="alert"
            >
                <svg
                    class="w-7 h-7 text-green-600"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.5"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                    ></path>
                </svg>
                <div class="pl-4 text-sm font-normal">
                    {{ $page.props.flash.successmessage }}
                </div>
                <button
                    type="button"
                    class="justify-end group mr-2 p-2"
                    @click="$page.props.flash.successmessage = false"
                >
                    <svg
                        class="block w-4 h-3 fill-green-800"
                        xmlns="http://www.w3.org/2000/svg"
                        width="235.908"
                        height="235.908"
                        viewBox="278.046 126.846 235.908 235.908"
                    >
                        <path
                            d="M506.784 134.017c-9.56-9.56-25.06-9.56-34.62 0L396 210.18l-76.164-76.164c-9.56-9.56-25.06-9.56-34.62 0-9.56 9.56-9.56 25.06 0 34.62L361.38 244.8l-76.164 76.165c-9.56 9.56-9.56 25.06 0 34.62 9.56 9.56 25.06 9.56 34.62 0L396 279.42l76.164 76.165c9.56 9.56 25.06 9.56 34.62 0 9.56-9.56 9.56-25.06 0-34.62L430.62 244.8l76.164-76.163c9.56-9.56 9.56-25.06 0-34.62z"
                        />
                    </svg>
                </button>
            </div>
        </transition>

        <Transition name="Efade">
            <div
                v-if="$page.props.flash.errormessage"
                id="toast-simple"
                class="tostr flex mt-2 mr-3 items-center w-full max-w-xs p-4 space-x-4 text-red-500 bg-white divide-x divide-gray-200 rounded-lg shadow dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800"
                role="alert"
            >
                <svg
                    class="w-7 h-7 text-red-600"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.5"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                    ></path>
                </svg>
                <div class="pl-4 text-sm font-normal">
                    {{ $page.props.flash.errormessage }}
                </div>
                <button
                    type="button"
                    class="justify-end group mr-2 p-2"
                    @click="$page.props.flash.errormessage = false"
                >
                    <svg
                        class="block w-4 h-3 fill-red-600"
                        xmlns="http://www.w3.org/2000/svg"
                        width="235.908"
                        height="235.908"
                        viewBox="278.046 126.846 235.908 235.908"
                    >
                        <path
                            d="M506.784 134.017c-9.56-9.56-25.06-9.56-34.62 0L396 210.18l-76.164-76.164c-9.56-9.56-25.06-9.56-34.62 0-9.56 9.56-9.56 25.06 0 34.62L361.38 244.8l-76.164 76.165c-9.56 9.56-9.56 25.06 0 34.62 9.56 9.56 25.06 9.56 34.62 0L396 279.42l76.164 76.165c9.56 9.56 25.06 9.56 34.62 0 9.56-9.56 9.56-25.06 0-34.62L430.62 244.8l76.164-76.163c9.56-9.56 9.56-25.06 0-34.62z"
                        />
                    </svg>
                </button>
            </div>
        </Transition>
        <!-- Page Container -->

        <div class="container my-12 mx-auto px-4 md:px-12">
            <div class="flex flex-wrap justify-center mx-1 lg:-mx-4">
                <div class="w-full md:w-8/12 lg:w-12/12 lg:px-16">
                    <!-- Header -->
                    <h1 class="lg:px-16 text-white text-4xl font-bold">
                        {{category.category_name}}
                    </h1>
                </div>

                <!-- Column -->

                <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/2">
                    <div class="flip-card">
                            <transition name="flip" mode="out-in">
                                <div :key="cardKey" class="flip-card-front">
                                    <!-- Article -->
                                    <article
                                        class="overflow-hidden rounded-lg bg-white border border-yellow-500 box"
                                    >
                                        <header
                                            class="flex items-center justify-center leading-tight p-2 md:p-4 h-[50vh]"
                                        >
                                            <div class="px-6 py-4">
                                                <h1 v-if="cardKey.length <5"
                                                    class="text-gray-700 normal-case text-6xl text-center "
                                                >
                                                    {{ cardKey }}
                                                </h1>
                                                <h1 v-else
                                                    class="text-gray-700 normal-case text-6xl text-center "
                                                >
                                                    {{ cardKey }}
                                                </h1>
                                            </div>
                                        </header>
                                    </article>
                                    <!-- END Article -->
                                </div>
                            </transition>
                    </div>
                    <div class="flex flex-wrap justify-center my-4">
                        <p class="text-white text-2xl">
                            {{ flashcard.data[0].flashcard }}
                        </p>
                    </div>
                    <div
                        class="flex flex-wrap justify-center mx-1 lg:-mx-4 lg:my-12"
                    >
                        <div class="flex items-center justify-between">
                            <Link
                                v-if="flashcard.prev_page_url != NULL"
                                :href="flashcard.prev_page_url"
                                Class="lg:ml-auto mx-1 lg:mr-3 py-4 px-6 bg-btn-color font-bold rounded text-gray-900 hover:bg-white hover:text-blue-500  hover:text-blue text-sm border border-primary-100 font-bold transition duration-200 "
                            >
                                <i class="fa fa-arrow-left"></i>
                                Previous Card
                            </Link>
                            <Button
                                @click="Shuffle"
                                class="lg:ml-auto mx-1 lg:mr-3 py-4 bg-btn-color px-6 font-bold rounded text-gray-900 hover:bg-white hover:text-blue-500 hover:text-blue text-sm border border-primary-100 font-bold transition duration-200"
                            >
                                <i class="fa fa-shuffle fa-solid"></i>
                                Shuffle Deck</Button
                            >

                            <button
                                @click="handelFlip"
                                class="lg:ml-auto mx-1 lg:mr-3 py-4 px-6 bg-btn-color font-bold rounded text-gray-900 hover:bg-white hover:text-blue-500 hover:text-blue text-sm border border-primary-100 font-bold transition duration-200"
                            >
                                <i class="fa fa-rotate fa-solid"></i>
                                Flip Card
                            </button>

                            <Link
                                v-if="flashcard.next_page_url != NULL"
                                v-bind:href="flashcard.next_page_url"
                                class="lg:ml-auto mx-1 lg:mr-3 py-4 px-3 bg-btn-color font-bold rounded text-gray-900 hover:bg-white hover:text-blue-500 hover:text-blue text-sm border border-primary-100 font-bold transition duration-200"
                            >
                                Next Card
                                <i class="fa fa-arrow-right fa-solid"></i>
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section>
            <!-- Page Container -->
            <div class="container my-10 mx-auto px-4 md:px-12">
                <div class="flex flex-wrap -mx-1 lg:-mx-4 justify-center">
     
                    <TransitionGroup name="shuffle">
           
                    <!--Componen end-->
                        <div
                            v-for="f in flashcards"
                            :key="f.id"
                            class="my-1 wrap-items  px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:px-4 lg:w-1/4  "
                        >
                            <!-- Article -->
                            <article v-bind:class="{
                        'bind-bg': flashcard.data[0].flashcard === f.flashcard,
                    }"
                                class="overflow-hidden rounded-lg shadow-lg bg-btn-color "
                            >
                                <header v-bind:class="{
                        'bind-bg': flashcard.data[0].flashcard === f.flashcard,
                    }"
                                    class="flex items-center justify-center leading-tight p-2 md:p-4 lg:h-[40vh]"
                                >
                                    <div class="px-6 py-4">
                                        <h1 
                                            class="text-black font-large object-scale-down normal-case text-center px-1"
                                        >
                                            {{ f.flashcard_title }}
                                        </h1>
                                    </div>
                                </header>
                            </article>
                            <!-- END Article -->
                        </div>
                        <!-- END Column -->
                    </TransitionGroup>
                </div>
            </div>
        </section>

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
    <section v-else class="">
        <div class="container my-12 mx-auto px-4 md:px-12">
            <div class="flex flex-wrap justify-center mx-1 lg:-mx-4">
              
                <!-- Column -->

                <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/2">
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <!-- Article -->
                                <article
                                    class="overflow-hidden rounded-lg bg-white border border-yellow-500 box"
                                >
                                    <header
                                        class="flex items-center justify-center leading-tight p-2 md:p-4 h-[50vh]"
                                    >
                                        <div class="px-6 py-4">
                                            <h1 class="text-red-700 text-xl">
                                                No Data Available
                                            </h1>
                                        </div>
                                    </header>
                                </article>
                                <!-- END Article -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style >
body {
    background: #007fff;
}

nav {
    z-index: 30;
}
.bind-bg{
    background: white;
}
.bg-btn-color {
    background: #f58c28;
}
.bg-adminbtn-color {
    background:  rgb(59 130 246);
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

.flip-card {
    background-color: transparent;
    perspective: 1000px; /* Remove this if you don't want the 3D effect */
}
.box {
    border: 10px solid rgba(255, 166, 0, 0.925);
}

/* This container is needed to position the front and back side */

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
.font-large{
    font-size: 40px;
    text-align: center;
    line-height: 40px;
    vertical-align: baseline;
    letter-spacing: normal;
    word-spacing: 0px;
    font-weight: 400;
    font-style: normal;
    font-variant: normal;
    text-transform: none;
    text-indent: 0px;
}
@media (max-width: 768px) {
      .wrap-items {
        flex-wrap: wrap;
      }
    }
</style>
