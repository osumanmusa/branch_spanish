<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";
import Navbar from "../Components/Navbar.vue";

const props = defineProps({
    quizes: Array,
});
const currentQNo = ref(0);
const checkedanswer = ref([]);
const next = () => {
    let no = currentQNo.value;
    if (props.quizes.length - 1 < no + 1) {
        //    window.alert(props.quizes.length + ' ' + no+1)
        return;
    }
    currentQNo.value = currentQNo.value + 1;
    //window.alert('nxt')
};
const prev = () => {
    if (currentQNo.value < 1) {
        //   window.alert(props.quizes.length + ' ' + no+1)
        return;
    }
    currentQNo.value = currentQNo.value - 1;
    // window.alert('nxt')
};

const form = useForm({
    checkedanswer: [],
});

const submit = () => {
    form.post(route("quiz.store", props.quizes[0].category_id));
};
</script>

<template>
    <Head title="Quiz" />
    <Navbar />

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
                            <div class="pl-4 text-sm font-normal">
                                {{ $page.props.flash.successmessage }}
                            </div>
                            <button
                                type="button"
                                class="justify-end group mr-2 p-2"
                                @click="
                                    $page.props.flash.successmessage = false
                                "
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
    <div class="container my-6 mx-auto px-4 md:px-12">
        <div class="flex flex-wrap justify-center mx-1 lg:-mx-4">
            <div class="flex items-center justify-between">
                <button
                    @click="currentQNo = i"
                    v-for="(q, i) in quizes"
                    :key="i"
                    class="lg:ml-auto lg:mr-3 py-2 px-6 rounded-lg hover:bg-red-700 hover:text-white border border-white hover:text-blue text-sm border border-primary-100 font-bold transition duration-200"
                    :class="{
                        'bg-white': currentQNo == i,
                    }"
                >
                    {{ i + 1 }}
                </button>
            </div>
        </div>
    </div>

    <section v-if="$props.quizes.length > 0">
        <!-- Page Container -->
        <div class="container my-6 mx-auto px-4 md:px-12">
            <form @submit.prevent="submit">
                <div
                    v-for="(quizes, i) in quizes"
                    :key="i"
                    v-show="currentQNo == i"
                    class="flex flex-wrap justify-center mx-1 lg:-mx-4"
                >
                    <!-- Column -->
                    <div
                        class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/2"
                    >
                        <!-- Article -->
                        <article
                            class="overflow-hidden rounded-lg shadow-lg max bg-white border border-yellow-500 flashcontent"
                        >
                            <header
                                class="flex items-center justify-center leading-tight p-2 md:p-4 flex items-center justify-center h-[50vh] bg-gray-100"
                            >
                                <div class="px-6 py-4">
                                    <h1 class="text-gray-700 text-3xl text-2xl">
                                        {{ quizes.question }}
                                    </h1>
                                </div>
                            </header>
                        </article>
                        <!-- END Article -->
                    </div>

                    <!-- END Column -->
                    <!-- <div class='flex items-center  justify-center mx-auto  p-6 '>
  <ul  class="mx-auto max-w-full w-full lg:grid-cols-6 sm:grid-cols-3 lg:gap-x-4 lg:px-8">
    
  <li class="answers">
    
    <label class="flex justify-center mb-3 cursor-pointer border border-gray-300 py-4 px-4 text-white hover:bg-white hover:text-blue-500 border border-white hover:text-blue text-sm border border-primary-100 font-bold focus:outline-none " for="yes">
        
        <input
                                    type="radio"
                                    :name="'option' + quizes.id"
                                    id="quiz1"
                                    @input="
                                        form.checkedanswer[i] = {
                                            chossenAnswer: $event.target.value,
                                            questionId: quizes.id,
                                        }
                                    "
                                    v-bind:value="quizes.answer_1"
                                />  
                                <span
                                    class="px-16 py-2 overflow-hidden rounded-lg w-[13vw] h-[8vh] text-center"
                                    @click="next"
                                    >{{ quizes.answer_1 }}</span>
       </label>
</li>
<li class="">
    <label   class="flex justify-center mb-3 cursor-pointer py-4 px-4 text-white hover:bg-white hover:text-blue-500 border border-white hover:text-blue text-sm border border-primary-100 font-bold focus:outline-none ">Sign Up</label>
</li>

<li class="">
    <label   class="flex justify-center cursor-pointer py-4 px-4 text-white hover:bg-white hover:text-blue-500 border border-white hover:text-blue text-sm border border-primary-100 font-bold focus:outline-none  " >Reset Password</label>
</li>
</ul>
</div> -->
                    <div
                        class="my-4 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/6 flex flex-wrap justify-center items-center mx-3"
                    >
                        <!-- Article -->
                        <div v-show="quizes.answer_1 != null" class="answers mt-1">
                            <label type="button">
                                <input
                                    type="radio"
                                    :name="'option' + quizes.id"
                                    id="quiz1"
                                    @input="
                                        form.checkedanswer[i] = {
                                            chossenAnswer: $event.target.value,
                                            questionId: quizes.id,
                                        }
                                    "
                                    v-bind:value="quizes.answer_1"
                                />
                                <!-- <input type="hidden" :value="quizes.id" v-model="form.chosenanswer.quizes.id"/> -->
                                <span
                                    class="px-16 py-2 overflow-hidden rounded-lg w-52 text-center"
                                    
                                    >{{ quizes.answer_1 }}</span
                                >
                            </label>
                        </div>
                        <div v-show="quizes.answer_2 != null" class="answers mt-1">
                            <label type="button">
                                <input
                                    type="radio"
                                    :name="'option' + quizes.id"
                                    id="quiz2"
                                    @input="
                                        form.checkedanswer[i] = {
                                            chossenAnswer: $event.target.value,
                                            questionId: quizes.id,
                                        }
                                    "
                                    v-bind:value="quizes.answer_2"
                                />
                                <span
                                    class="px-16 py-2 overflow-hidden rounded-lg w-52 justify-center text-center"
                                   
                                    >{{ quizes.answer_2 }}</span
                                >
                            </label>
                        </div>
                        <div v-show="quizes.answer_3 != null" class="answers mt-1">
                            <label type="button">
                                <input
                                    type="radio"
                                    :name="'option' + quizes.id"
                                    id="quiz3"
                                    @input="
                                        form.checkedanswer[i] = {
                                            chossenAnswer: $event.target.value,
                                            questionId: quizes.id,
                                        }
                                    "
                                    v-bind:value="quizes.answer_3"
                                />
                                <span
                                    class="px-16 py-2 overflow-hidden rounded-lg w-52 text-center"
                                  
                                    >{{ quizes.answer_3 }}</span
                                >
                            </label>
                        </div>
                        <div v-show="quizes.answer_4 != null" class="answers mt-1">
                            <label type="button">
                                <input
                                    type="radio"
                                    :name="'option' + quizes.id"
                                    id="quiz4"
                                    @input="
                                        form.checkedanswer[i] = {
                                            chossenAnswer: $event.target.value,
                                            questionId: quizes.id,
                                        }
                                    "
                                    v-bind:value="quizes.answer_4"
                                />
                                <span
                                    class="px-16 py-2 overflow-hidden rounded-lg w-52 text-center"
                              
                                    >{{ quizes.answer_4 }}</span
                                >
                            </label>
                        </div>
                        <!-- END Article -->
                    </div>
                </div>
                <!-- <div class="container my-12 mx-auto px-4 md:px-12">
        <div class="flex flex-wrap mx-1 button_center lg:-mx-4">
            <div class="my-1 px-1 w-full md:w-2/12 ">
                <label v-if = " currentQNo > 0" @click = "prev" class=" lg:ml-auto lg:mr-3 py-2 px-6 bg-btn-color text-white hover:bg-white hover:text-blue-500 border border-white hover:text-blue text-sm border border-primary-100 font-bold transition duration-200 p-2 md:p-4 flex items-center justify-center " >
                Prev
                </label>
                <label v-if = "quizes.length-1 > currentQNo" @click = "next" class=" lg:ml-auto lg:mr-3 py-2 px-6 bg-btn-color text-white hover:bg-white hover:text-blue-500 border border-white hover:text-blue text-sm border border-primary-100 font-bold transition duration-200 p-2 md:p-4 flex items-center justify-center " >
                Next
                </label>
                <Button v-else class=" lg:ml-auto lg:mr-3 py-2 px-6 bg-btn-color text-white hover:bg-white hover:text-blue-500 border border-white hover:text-blue text-sm border border-primary-100 font-bold transition duration-200 p-2 md:p-4 flex items-center justify-center " >
                Submit
                </Button>
            </div>
        </div>

    </div>   -->
                <br />
                <div class="flex flex-wrap justify-center mx-1 lg:my-12">
                    <div class="flex items-center justify-between">
                        <label
                            v-if="currentQNo > 0"
                            @click="prev"
                            class="w-48 h-16 lg:ml-auto lg:mr-3 py-2 bg-btn-color text-white hover:bg-white hover:text-blue-500 border border-white hover:text-blue text-sm border border-primary-100 font-bold transition duration-200 p-2 md:p-4 flex items-center justify-center"
                        >
                            Prev
                        </label>
                        <label
                            v-if="quizes.length - 1 > currentQNo"
                            @click="next"
                            class="w-48 h-16 lg:ml-auto lg:mr-3 py-2 px-6 bg-btn-color text-white hover:bg-white hover:text-blue-500 border border-white hover:text-blue text-sm border border-primary-100 font-bold transition duration-200 p-2 md:p-4 flex items-center justify-center"
                        >
                            Next
                        </label>
                        <Button
                            v-else
                            class="w-48 h-16 lg:ml-auto lg:mr-3 py-2 px-6 bg-btn-color text-white hover:bg-white hover:text-blue-500 border border-white hover:text-blue text-sm border border-primary-100 font-bold transition duration-200 p-2 md:p-4 flex items-center justify-center"
                            :disabled="form.processing">
                            Submit
                        </Button>
                    </div>
                </div>
            </form>
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
            </div>
        </div>
    </section>
    <section v-else>
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

<style>
body {
    background-color: rgb(59 130 246);
}

nav {
    z-index: 30;
}
.button_center {
    padding-left: 32vw;
}
.logo {
    width: 120px;
    margin-left: 20px;
}
.bg-btn-color {
    background: #f58c28;
}
.bg-adminbtn-color {
    background:  rgb(59 130 246);
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
.bg-btn-color {
    background: #f58c28;
}

.kid-icon {
    position: relative;
    width: 117.38px;
    height: 128.42px;
    left: 1197px;
    z-index: 1;
}
.answers input[type="radio"]:checked + span {
    background: rgb(7, 122, 7);
    color: whitesmoke;
}
.answers span {
    display: inline-block;
    padding: 18px;
    text-transform: uppercase;
    border: 2px solid white;
    border-radius: 3px;
    color: black;
    background: #f58c28;
}
.answers input[type="radio"] {
    display: none;
}

.tostr{
  
  position:fixed;
  right:1rem;
  top:1rem;
  z-index: 1000;
}
.fade-enter-active,
.fade-leave-active {
    transition: opacity 2.5s ease-out;
}
.fade-enter,
.fade-leave-to {
    opacity: 0;
}
</style>
