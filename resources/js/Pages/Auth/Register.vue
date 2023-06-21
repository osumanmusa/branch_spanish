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

function validateStep1() {
    if (
        form.parent_firstname &&
        form.parent_lastname &&
        form.parent_residence
    ) {
        step.value = 2;
    } else {
        errormsg.value = "Please fill in all required fields.";
    }
}

function validateStep2() {
    if (form.parent_name && form.parent_email && form.parent_password) {
        step.value = 3;
    } else {
        errormsg2.value = "Please fill in all required fields.";
    }
}

function submit() {
    if (
        form.child_firstname &&
        form.child_lastname &&
        form.child_school &&
        form.child_email &&
        form.child_password
    ) {
        form.post(route("register"), {
            onFinish: () => form.reset("password", "password_confirmation"),
        });
    } else {
        errormsg3.value = "Please fill in all required fields.";
    }
}

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
    <div class="flex items-center lg:ml-32 pt-12 pb-4 px-8">
            <h1 class="text-white text-2xl lg:px-6 sm:text-center">
                <b>Create New Account </b>
            </h1>
        </div>

        <div class="flex items-center  justify-center mt-1 ">
        <ul class="mx-auto grid max-w-full w-full px-4 lg:px-10 ">
            <li class="">
                <div
                    class="bg-color border-indigo-300 rounded-lg w-[77vw] mx-auto"
                >
                    <form @submit.prevent="submit" class="mb-10">
                        <TransitionGroup name="list">
                    <div
                        id="step1"
                        v-show="step == 1"
                        :key="step"
                        class="form-step form-step-active "
                    >
                        <div class="space-x-4">
                            <button
                                class="px-10 py-3 btn-log text-black rounded hover:bg-white hover:text-yellow-700 text-xl"
                            >
                                <b>Enter Details of Parent</b>
                            </button>
                        </div>
                        <div class="mt-4 grid lg:grid-cols-1 gap-4">
                            <div>
                                <label
                                    for="name"
                                    class="text-lg text-white block mb-1"
                                    >Parent First Name:</label
                                >
                                <input
                                    type="text"
                                    id="parent_firstname"
                                    v-model="form.parent_firstname"
                                    class="bg-gray-100 border border-gray-200 rounded py-3 px-3 block focus:ring-blue-500 text-gray-700 w-full"
                                    placeholder="Enter Parent First name"
                                    required
                                />
                                <span
                                    v-if="errormsg"
                                    class="text-red-600 bg-white"
                                    ><span class="text-red-700">*</span>
                                    {{ errormsg
                                    }}<span class="text-red-700">*</span></span
                                >
                            </div>

                            <div>
                                <label
                                    for="email"
                                    class="text-lg text-white block mb-1 font-medium"
                                    >Parent Last Name:</label
                                >
                                <input
                                    type="text"
                                    id="parent_lastname"
                                    v-model="form.parent_lastname"
                                    class="bg-gray-100 border border-gray-200 rounded py-3 px-3 block focus:ring-blue-500 text-gray-700 w-full"
                                    placeholder="Enter Parent Last name"
                                    required
                                />
                                <span
                                    v-if="errormsg"
                                    class="text-red-600 bg-white"
                                    ><span class="text-red-700">*</span>
                                    {{ errormsg
                                    }}<span class="text-red-700">*</span></span
                                >
                            </div>

                            <div>
                                <label
                                    for="email"
                                    class="text-lg text-white block mb-1 font-medium"
                                    >Place of Residence:</label
                                >
                                <input
                                    type="text"
                                    id="parent_residence"
                                    v-model="form.parent_residence"
                                    class="bg-gray-100 border border-gray-200 rounded py-3 px-3 block focus:ring-blue-500 text-gray-700 w-full"
                                    placeholder="Enter Residence"
                                    required
                                />
                                <span
                                    v-if="errormsg"
                                    class="text-red-600 bg-white"
                                    ><span class="text-red-700">*</span>
                                    {{ errormsg
                                    }}<span class="text-red-700">*</span></span
                                >
                            </div>
                            <div class="py-3">
                                <p class="text-white"> Already have an account? <a href="login" class="text-yellow-200"> Click here to login</a></p>
                            </div>
                            <div>
                                <button
                                    @click.prevent="validateStep1"
                                    class="px-8 py-3 btn-log text-black rounded hover:bg-white hover:text-yellow-700 text-xl"
                                >
                                    <b>Next</b>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div id="step2" v-show="step == 2" :key="step">
                        <div class="space-x-4">
                            <button
                                type="submit"
                                class="px-10 py-3 btn-log text-black rounded hover:bg-white hover:text-yellow-700 text-xl"
                            >
                                <b> Create Account for Parent/Care taker</b>
                            </button>
                        </div>
                        <div class="mt-4 grid lg:grid-cols-1 gap-4">
                            <div>
                                <label
                                    for="name"
                                    class="text-lg text-white block mb-1 "
                                    >Username:</label
                                >
                                <input
                                    type="text"
                                    id="parent_name"
                                    v-model="form.parent_name"
                                    class="bg-gray-100 border border-gray-200 rounded py-3 px-3 block focus:ring-blue-500 text-gray-700 w-full"
                                    placeholder="Enter Parent username"
                                    required
                                />
                                <span
                                    v-if="errormsg2"
                                    class="text-red-600 bg-white"
                                    ><span class="text-red-700">*</span>
                                    {{ errormsg2
                                    }}<span class="text-red-700">*</span></span
                                >
                            </div>

                            <div>
                                <label
                                    for="email"
                                    class="text-lg text-white block mb-1 font-medium"
                                    >Email:</label
                                >
                                <input
                                    type="email"
                                    id="parent_email"
                                    v-model="form.parent_email"
                                    class="bg-gray-100 border border-gray-200 rounded py-3 px-3 block focus:ring-blue-500 text-gray-700 w-full"
                                    placeholder="Enter Parent Email"
                                    required
                                />
                                <span
                                    v-if="errormsg2"
                                    class="text-red-600 bg-white"
                                    ><span class="text-red-700">*</span>
                                    {{ errormsg2
                                    }}<span class="text-red-700">*</span></span
                                >
                            </div>

                            <div>
                                <label
                                    for="email"
                                    class="text-lg text-white block mb-1 font-medium"
                                    >Password:</label
                                >
                                <input
                                    type="text"
                                    id="parent_password"
                                    v-model="form.parent_password"
                                    class="bg-gray-100 border border-gray-200 rounded py-3 px-3 block focus:ring-blue-500 text-gray-700 w-full"
                                    placeholder="Enter Parent Password"
                                    required
                                />
                                <span
                                    v-if="errormsg2"
                                    class="text-red-600 bg-white"
                                    ><span class="text-red-700">*</span>
                                    {{ errormsg2
                                    }}<span class="text-red-700">*</span></span
                                >
                            </div>
                            <div>
                                <button
                                    @click.prevent="validateStep2"
                                    class="px-8 py-3 btn-log text-black rounded hover:bg-white hover:text-yellow-700 text-xl"
                                >
                                    <b>Next</b>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div id="step3" v-show="step == 3" :key="step">
                        <div class="space-x-4">
                            <button
                                type="submit"
                                class="px-10 py-3 btn-log text-black rounded hover:bg-white hover:text-yellow-700 text-xl"
                            >
                                <b>Enter Details of Child</b>
                            </button>
                        </div>
                        <div class="mt-4 grid lg:grid-cols-1 gap-4">
                            <div>
                                <label
                                    for="name"
                                    class="text-lg text-white block mb-1 "
                                    >Child's First Name:</label
                                >
                                <input
                                    type="text"
                                    id="child_firstname"
                                    v-model="form.child_firstname"
                                    class="bg-gray-100 border border-gray-200 rounded py-3 px-3 block focus:ring-blue-500 text-gray-700 w-full"
                                    placeholder="Enter Child First name"
                                    required
                                />
                            </div>

                            <div>
                                <label
                                    for="email"
                                    class="text-lg text-white block mb-1 font-medium"
                                    >Child's Last Name:</label
                                >
                                <input
                                    type="text"
                                    id="child_lastname"
                                    v-model="form.child_lastname"
                                    class="bg-gray-100 border border-gray-200 rounded py-3 px-3 block focus:ring-blue-500 text-gray-700 w-full"
                                    placeholder="Enter Child Last name"
                                    required
                                />
                            </div>

                            <div>
                                <label
                                    for="email"
                                    class="text-lg text-white block mb-1 font-medium"
                                    >Email:</label
                                >
                                <input
                                    type="email"
                                    id="child_email"
                                    v-model="form.child_email"
                                    class="bg-gray-100 border border-gray-200 rounded py-3 px-3 block focus:ring-blue-500 text-gray-700 w-full"
                                    placeholder="Enter Child Email"
                                    required
                                />
                            </div>

                            <div>
                                <label
                                    for="email"
                                    class="text-lg text-white block mb-1 font-medium"
                                    >Password:</label
                                >
                                <input
                                    type="text"
                                    id="child_password"
                                    v-model="form.child_password"
                                    class="bg-gray-100 border border-gray-200 rounded py-3 px-3 block focus:ring-blue-500 text-gray-700 w-full"
                                    placeholder="Enter Child Password"
                                    required
                                />
                            </div>

                            <div>
                                <label
                                    for="email"
                                    class="text-lg text-white block mb-1 font-medium"
                                    >School of Child:</label
                                >
                                <input
                                    type="text"
                                    id="child_school"
                                    v-model="form.child_school"
                                    class="bg-gray-100 border border-gray-200 rounded py-3 px-3 block focus:ring-blue-500 text-gray-700 w-full"
                                    placeholder="School of Child"
                                    required
                                />
                            </div>
                            <div>
                                <button
                                    class="px-8 py-3 btn-log text-black rounded hover:bg-white hover:text-yellow-700 text-xl"
                                >
                                    <b>Submit</b>
                                </button>
                            </div>
                        </div>
                    </div>
                </TransitionGroup>

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
.log-button{
  background: #007FFF;
  color:white !important;
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
.display-right{
    float: right;
}
</style>
