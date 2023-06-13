<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import AdminNavbar from "../../Components/SuperAdmin/AdminNavbar.vue";
import AdminSidebar from "../../Components/SuperAdmin/AdminSidebar.vue";
import pagination from "../../Components/pagination.vue";
import {ref ,onMounted} from 'vue';
import { Modal } from "flowbite";
const props=defineProps({
    total_students: Object,
    quiz: Object,
    categories: Object,
    flashcard: Object,
    parents: Object,
    voice: Object,
    students: Object,
    parents: Object,
    message:String,
    successmessage: Object,
    errormessage: Object,

});
const studentlist = ref(true);
const parentlist = ref(false);
function listparent(){
    parentlist.value = !parentlist.value;
    studentlist.value = false;
}
function liststudent(){
    parentlist.value = false;
    studentlist.value = !studentlist.value;
}
const form = useForm({
    search: '',

});
const submit = () => {
    form.get('/superadminhome');
	

};
</script>
<template>
    <Head title="Dashboard" />

    <div class="flex h-screen bg-blue">
        <AdminSidebar />

        <div class="flex-1 flex flex-col overflow-hidden">
            <AdminNavbar />

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-white">
                <div class="container mx-auto px-6 py-8">
<Transition name="fade" mode="out-in">
    <div v-if="$page.props.flash.successmessage"  class="toast-right flex mt-2 items-center w-full max-w-xs p-4 space-x-4 text-green-500 bg-gray-100 divide-x divide-gray-200 rounded-lg shadow dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800" role="alert">
        <svg class="w-7 h-7 text-green-600 " fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <div class="pl-4 text-sm font-normal"> {{ $page.props.flash.successmessage }}</div>    
        <button type="button" class="justify-end group mr-2 p-2" @click="$page.props.flash.successmessage = false">
      <svg
        class="block w-4 h-3 fill-green-800 "
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
    <div v-if="$page.props.flash.errormessage" id="toast-simple" class="toast-right flex mt-2 mr-3 items-center w-full max-w-xs p-4 space-x-4 text-red-500 bg-white divide-x divide-gray-200 rounded-lg shadow dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800" role="alert">
        <svg class="w-7 h-7 text-red-600 " fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <div class="pl-4 text-sm font-normal">{{ $page.props.flash.errormessage }}</div>
        <button type="button" class="justify-end group mr-2 p-2" @click="$page.props.flash.errormessage  = false">
      <svg
        class="block w-4 h-3 fill-red-600 "
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
                    <!-- <div
                        class="mb-6 bg-green-600 lg:w-[18vw] border rounded-xl shadow-sm sm:flex dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]"
                    >
                        <div class="flex flex-wrap">
                            <div class="p-1 flex flex-col h-full sm:p-7">
                                <h3
                                    class="text-lg font-bold text-gray-100 dark:text-white"
                                >
                                    Student
                                </h3>
                                <p
                                    class="mt-1 text-gray-100 dark:text-gray-400"
                                >
                                    {{ total_students }}
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-wrap">
                            <div class="p-1 flex flex-col h-full sm:p-7">
                                <p class="mt-1">
                                    <img src="/img/icon.png" class="h[10vh]" />
                                </p>
                            </div>
                        </div>
                    </div> -->
                    <div class="grid lg:grid-cols-3 gap-8">
                        <div class="bg-green-600 h-32 border rounded-xl">
                            <div class="flex p-8 text-white justify-between">
                                <div class="px-4 text-center">
                                    <p class="py-1">
                                    Students</p>
                                    <p class="py-4">
                                    {{ total_students }}</p>
                                </div>
                                <div class="px-4 font-right">
                                    <i class="fa fa-user-group text-7xl text-white" ></i>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-green-600 h-32 border rounded-xl">
                            <div class="flex p-8 text-white justify-between">
                                <div class="px-4 text-center">
                                    <p class="py-1">Parents</p>
                                    <p class="py-4">
                                    {{ parents }}</p>
                                </div>
                                <div class="px-4 font-right">
                                    <i class="fa fa-users text-7xl text-white" ></i>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-green-600 h-32 border rounded-xl">
                            <div class="flex p-8 text-white justify-between">
                                <div class="px-4 text-center">
                                    <p class="py-1">Flashcards</p>
                                    <p class="py-4">
                                    {{ flashcard }}</p>
                                </div>
                                <div class="px-4 font-right">
                                    <i class="fa fa-sticky-note text-7xl text-white" ></i>
                                </div>
                            </div>
                        </div>

                        
                        <div class="bg-green-600 h-32 border rounded-xl">
                            <div class="flex p-8 text-white justify-between">
                                <div class="px-4 text-center">
                                    <p class="py-1">Pronounciations</p>
                                    <p class="py-4">
                                    {{ voice }}</p>
                                </div>
                                <div class="px-4 font-right">
                                    <i class="fa fa-microphone text-7xl text-white" ></i>
                                </div>
                            </div>
                        </div>
                        <div class="bg-green-600 h-32 border rounded-xl">
                            <div class="flex p-8 text-white justify-between ">
                                <div class="px-4 text-center">
                                    <p class="py-1">Categories</p>
                                    <p class="py-4">
                                    {{ categories }}</p>
                                </div>
                                <div class="px-4 font-right">
                                    <i class="fa fa-object-group text-7xl text-white" ></i>
                                </div>
                            </div>
                        </div>

                        <div class="bg-green-600 h-32 border rounded-xl">
                            <div class="flex p-8 text-white justify-between ">
                                <div class="px-4 text-center">
                                    <p class="py-1">Quizes</p>
                                    <p class="py-4">
                                    {{ quiz }}</p>
                                </div>
                                <div class="px-4 font-right">
                                    <i class="fa fa-question-circle text-7xl text-white" ></i>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--Componen end-->
                </div>
            </main>
        </div>
    </div>
</template>
<style scoped>
.hr{
    border: 2px solid rgb(184, 181, 181);
}
.toast-right{
    float:right;
}

</style>
