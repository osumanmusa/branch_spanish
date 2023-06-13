<script setup>
import { ref, onMounted } from "vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import Navbar from "../../Components/Navbar.vue";
const props = defineProps({
    status: String,
    canLogin: Boolean,
    canRegister: Boolean,
    successmessage: Object,
    errormessage: Object,
    email: String,
    token: String,
});

const resetform = useForm({
    email: props.email,
});

const submit = () => {
    resetform.post(route('user.passrestore'));
};
let showMenu = ref(false);
const toggleNav = () => (showMenu.value = !showMenu.value);
</script>
<template>
    <Head title="Authentication Page" />

<Navbar />
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

    <!-- component -->
    <div class="flex items-center lg:ml-24 pt-12 pb-4 px-8">
            <h1 class="text-white text-2xl lg:px-6 sm:text-center">
                <b>PASSWORD RESET </b>
            </h1>
        </div>

<div class="flex items-center  justify-center mt-1 ">
    <ul class="mx-auto grid max-w-full w-full px-4 lg:px-10 ">
            <li class="">
                <div
                    class="bg-color  border-indigo-300 rounded-lg w-[77vw] mx-auto"
                >
                    <form @submit.prevent="submit" class="mb-10">
                <div class="mt-1 grid lg:grid-cols-1 gap-4">
      <div>
        <label for="name" class="text-lg text-white block mb-2  font-bold ">Parent Email Address</label>
        <input type="email" id="email" v-model="resetform.email" class="bg-gray-100 border border-gray-200 rounded py-3 px-3 block focus:ring-blue-500 text-gray-700 w-full" placeholder="Enter your name" required/>
      </div>
    </div>
    <div class="mt-4 grid lg:grid-cols-1 gap-4">
        <p class="text-lg text-yellow-300 block mb-2  ">Password reset instruction would be sent to parent email address</p>
        
    </div>

    <div class="space-x-4 mt-8">
      <button type="submit" class="px-8 py-3 btn-log text-black rounded hover:bg-white hover:text-yellow-700 text-xl"><b> Reset </b> </button>


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
.log-button{
  background: #007FFF;
  color:white !important;
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
    height: 55px;
    width:  55px;
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
