<script setup>
import { ref, onMounted } from "vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
const props = defineProps({
    status: String,
    canLogin: Boolean,
    canRegister: Boolean,
    successmessage: Object,
    errormessage: Object,
    email: String,
    token: String,
});
const step = ref(1);
const errormsg = ref("");
const errormsg2 = ref("");
const errormsg3 = ref("");
const form = useForm({
    parent_firstname: "",
    parent_lastname: "",
    parent_residence: "",
    parent_name: "",
    parent_email: "",
    parent_password: "",
    child_firstname: "",
    child_lastname: "",
    child_school: "",
    child_email: "",
    child_password: "",
});

const resetform = useForm({
    token: props.token,
    email: props.email,
});

const submit = () => {
    resetform.post(route("password.store"), {
        onFinish: () => resetform.reset("password", "password_confirmation"),
    });
};
let showMenu = ref(false);
const toggleNav = () => (showMenu.value = !showMenu.value);
</script>
<template>
    <Head title="Authentication Page" />

    <nav class="sticky top-0 nav py-4 md:flex bg-white shadow-md">
        <div class="flex items-center">
            <a href="/" class="lg:ml-6">
                <img src="/img/bg.png" class="logo" />
            </a>
            <a href="/" class="lg:ml-1 px-4">
                <img src="/img/logo2.jpg" class="logo2" />
            </a>
            <!-- <button type="button" class="lg:ml-12 py-6 text-gray-700 border border-gray-700 font-medium rounded-lg text-lg px-8 text-center mb-2 ">
          Branch Out With Spanish</button> -->

            <div @click="toggleNav" class="flex md:hidden px-3">
                <button
                    type="button"
                    class="text-yellow-800 hover:text-gray-400 focus:outline-none focus:text-gray-400"
                >
                    <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                        <path
                            fill-rule="evenodd"
                            d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"
                        ></path>
                    </svg>
                </button>
            </div>
        </div>
        <ul
            :class="showMenu ? 'flex' : 'hidden'"
            class="flex-col mt-8 space-y-4 md:flex md:space-y-0 md:mt-0 lg:ml-15 px-3"
        >
            <div class="lg:flex md:w-[45vw] justify-center items-center">
                <Link
                    href="/flashcards"
                    class="lg:inline-block md:inline-block md:mx-4 hover:bg-gray-50"
                    ><img src="/img/i1.png" class="nav-icon p-2" />

                    <p class="nav-text lg:text-xl"><b>FLASH CARDS</b></p></Link
                >
                <Link
                    href="/pronounciations"
                    class="lg:inline-block md:inline-block md:mx-4 px-4 hover:bg-gray-50"
                    ><img src="/img/i2.png" class="nav-icon p-2" />

                    <p class="nav-text lg:text-xl">
                        <b>PRONOUNCIATION</b>
                    </p></Link
                >
                <Link
                    href="/quizme"
                    class="lg:inline-block md:inline-block md:mx-4 px-4 hover:bg-gray-50"
                    ><img src="/img/i3.png" class="nav-icon p-2" />

                    <p class="nav-text lg:text-xl"><b>QUIZ ME</b></p>
                </Link>
            </div>
        </ul>
        <ul
            :class="showMenu ? 'flex' : 'hidden'"
            class="flex-col mt-8 space-y-4 md:flex md:space-y-0 md:mt-0 justify-end px-2"
        >
            <div class="lg:w-[20vw] lg:text-end lg:mr-10 space-x-4 px-4 mb-6">
                <Link
                    :href="route('login')"
                    class="lg:inline-block lg:mx-4 lg:ml-auto py-3 px-5 bg-white nav-text border border-primary font-bold"
                >
                    <b>LOGIN</b></Link
                >
                <Link
                    :href="route('register')"
                    class="lg:inline-block lg:mx-4 lg:ml-auto py-3 px-5 log-button nav-text border border-primary font-bold"
                >
                    <b>SIGNUP</b></Link
                >
            </div>
        </ul>
    </nav>
    <!-- <nav
      class="sticky top-0 
        px-4
        py-4
        mx-auto
        md:flex md:justify-between md:items-center bg-white shadow-md
      "
    >
      <div class="flex items-center justify-between">
        <a href="/"
          >
            <img src="/img/logo.png" class="logo"/>
      </a>
        <div @click="toggleNav" class="flex md:hidden">
          <button
            type="button"
            class="
              text-yellow-800
              hover:text-gray-400
              focus:outline-none focus:text-gray-400
            "
          >
            <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
              <path
                fill-rule="evenodd"
                d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"
              ></path>
            </svg>
          </button>
        </div>
      </div>

      <ul
        :class="showMenu ? 'flex' : 'hidden'"
        class="
          flex-col
          mt-8
          space-y-4
          md:flex md:space-y-0 md:flex-row md:items-center md:space-x-6 md:mt-0 
        "
      >
        <Link href="/flashcards" class="lg:inline-block lg:ml-auto px-6 hover:bg-gray-50"><img src="/img/i1.png" class="nav-icon p-2" />
                
                <p class="nav-text">FLASH CARDS</p></Link>
        <Link href="/pronounciations" class="lg:inline-block lg:ml-auto px-4 hover:bg-gray-50"><img src="/img/i2.png" class="nav-icon p-2"/>
    
        <p class="nav-text">PRONOUNCIATION</p></Link>
        <Link href="/quizme" class="lg:inline-block lg:ml-auto px-4 hover:bg-gray-50"><img src="/img/i3.png" class="nav-icon p-2"/>
    
        <p class="nav-text">QUIZ ME</p>
        </Link>

          </ul>
    </nav> -->

    <Transition name="fade" mode="out-in">
        <div
            v-if="$page.props.flash.successmessage"
            class="tostr flex mt-2 items-center w-full max-w-xs p-4 space-x-4 text-green-500 bg-gray-100 divide-x divide-gray-200 rounded-lg shadow dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800"
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
            <div class="pl-4 text-l font-normal">
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
    </Transition>

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
            <div class="pl-4 text-l font-normal">
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
    <!-- component -->

    <div class="flex items-center mt-12 gap-x-4 px-8 mx-auto p-6">
        <h1 class="text-white text-2xl lg:px-8">
            <b>Create New Account</b>
        </h1>
    </div>

    <div class="flex items-center justify-center mt-1">
        <ul class="mx-auto grid max-w-full w-full grid-cols-6 gap-x-4 px-8">
            <li class="">
                <div
                    class="bg-color absolute p-6 border-indigo-300 rounded-lg w-[85vw] mx-auto"
                >
                    <form @submit.prevent="submit" class="mb-10">
                        <div class="mt-1 grid lg:grid-cols-1 gap-4">
                            <div>
                                <label
                                    for="name"
                                    class="text-lg text-white block mb-2 font-bold"
                                    >Parent Email Address</label
                                >
                                <input
                                    type="email"
                                    id="email"
                                    v-model="resetform.email"
                                    class="bg-gray-100 border border-gray-200 rounded py-3 px-3 block focus:ring-blue-500 text-gray-700 w-full"
                                    placeholder="Enter your name"
                                />
                            </div>
                        </div>
                        <div class="mt-4 grid lg:grid-cols-1 gap-4">
                            <p class="text-lg btn-log block mb-2">
                                Password reset instruction would be sent to
                                parent email address
                            </p>
                        </div>

                        <div class="space-x-4 mt-8">
                            <button
                                type="submit"
                                class="px-8 py-3 btn-log text-black rounded hover:bg-white hover:text-yellow-700 text-xl"
                            >
                                <b> Reset </b>
                            </button>
                        </div>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</template>
<style>
body {
    background: #007fff;
}

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
.log-button {
    background: #007fff;
    color: white !important;
}
.nav-icon {
    height: 60px;
    width: 60px;
}

.toast-right {
    float: right;
}
.tostr {
    position: fixed;
    right: 1rem;
    top: 1rem;
    z-index: 1000;
}
.btn-log {
    background: #f58c28;
}
.nav-text {
    color: #007fff;
}
</style>
