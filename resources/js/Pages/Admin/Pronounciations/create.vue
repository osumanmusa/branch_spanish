<script setup>
import {  Head, Link, useForm } from '@inertiajs/vue3';
import AdminNavbar from "../../../Components/Admin/AdminNavbar.vue";
import AdminSidebar from "../../../Components/Admin/AdminSidebar.vue";

const props=defineProps({
    categories: Object,
    flashcards: Object,
    message:String,

});
const form = useForm({
    category: '',
    flashcard: '',
    title: '',
    audio: '',
});

const submit = () => {
    form.post(route('admin.pronounciation.store'));
};
function selectAudio($event) {
            form.audio = $event.target.files[0];
        }
</script>
<template>
    <Head title="Flashcards" />

     <div  class="flex h-screen bg-blue ">
            <AdminSidebar/>
            
            <div class="flex-1 flex flex-col overflow-hidden">
                <AdminNavbar/>

                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-white">
                    <div class="container mx-auto lg:px-6 py-8">

<!--Create form sart-->
<div class="flex flex-col bg-white border shadow-sm rounded-xl p-4 md:p-5 dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
<form @submit.prevent="submit" enctype="multipart/form-data">
    <div class="grid gap-4 mb-3 md:grid-cols-2 p-3">
        <div>
         <label for="input-label" class=" text-sm mb-2 dark:text-white">Flash Cards Category</label>
         <select  id="category" v-model="form.category" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
            <option v-for="c in categories" :key="c.id" :value="c.id ">{{ c.category_name }}</option>
         </select>
         </div>
        <div>
            
         <label for="input-label" class=" text-sm mb-2 dark:text-white">Flash Cards</label>
         <select  id="flashcard" v-model="form.flashcard" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
            <option v-for="f in flashcards" :key="f.id" :value="f.id ">{{ f.flashcard_title }}</option>
         </select>
        </div>
    </div>

    <div class="p-3">
         <label for="input-label" class="block text-sm  mb-2 dark:text-white">Pronounciation Title</label>
         <input type="text" id="title" v-model="form.title" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" placeholder="Enter Title">
    </div>
    <div class="p-3">
    <label for="input-label" class="block text-sm  mb-2 dark:text-white">Upload Voice Recording File</label>

<div class="flex items-center justify-center w-full">
    <label for="audio" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-200 rounded-lg cursor-pointer bg-white dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
        <div class="flex flex-col items-center justify-center pt-5 pb-6">
            <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Upload audio</span></p>
            <a class="py-2 px-6  bg-blue-500 text-sm text-white">SELECT FILE</a>
        </div>
        <input id="audio" v-on:change="selectAudio" type="file" class="hidden" />
    </label>
</div> 

    </div>

  <div class="lg:px-16 lg:right-0 p-3 ">

    <button class="card-submit py-3 px-4 text-right rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
        Save

    </button>

  </div>


</form>
</div>


<!--ceate form end-->



                    </div>
                </main>
            </div>
        </div>






</template>
<style >
.card-submit{
    float:right;
}
</style>