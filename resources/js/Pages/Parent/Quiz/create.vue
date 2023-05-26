<script setup>
import {  Head, Link, useForm } from '@inertiajs/vue3';
import AdminNavbar from "../../../Components/Admin/AdminNavbar.vue";
import AdminSidebar from "../../../Components/Admin/AdminSidebar.vue";

const props=defineProps({
    categories: Object,
    message:String,

});
const form = useForm({
    category: '',
    question: '',
    answer1: '',
    answer2: '',
    answer3: '',
    answer4: '',
    answer: '',
});

const submit = () => {
    form.post(route('admin.quiz.store'));
};

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
<form @submit.prevent="submit">
    <div class="grid gap-4 mb-3 md:grid-cols-2 p-3">
        <div>
         <label for="input-label" class=" text-sm mb-2 dark:text-white">Flash Cards Category</label>
         <select  id="category" v-model="form.category" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
            <option v-for="c in categories" :key="c.id" :value="c.id ">{{ c.category_name }}</option>
         </select>
         </div>
    </div>
    <div class="p-3">
         <label for="input-label" class="block text-sm  mb-2 dark:text-white">Question </label>
         <input type="text" id="question" v-model="form.question" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" placeholder="Enter Title">
    </div>
    <div class="p-3">
         <label for="input-label" class="block text-sm  mb-2 dark:text-white">Possible Answer A</label>
         <input type="text" id="answer1" v-model="form.answer1"  class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" placeholder="">
    </div>
    <div class="p-3">
         <label for="input-label" class="block text-sm  mb-2 dark:text-white">Possible Answer B</label>
         <input type="text" id="answer2" v-model="form.answer2" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" placeholder="">
    </div>
    <div class="p-3">
         <label for="input-label" class="block text-sm  mb-2 dark:text-white">Possible Answer C</label>
         <input type="text" id="answer3" v-model="form.answer3" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" placeholder="">
    </div>
    <div class="p-3">
         <label for="input-label" class="block text-sm  mb-2 dark:text-white">Possible Answer D</label>
         <input type="text" id="answer4" v-model="form.answer4" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" placeholder="">
    </div>
    <div class="grid gap-4 mb-3 md:grid-cols-2 p-3">
        <div>
         <label for="input-label" class=" text-sm mb-2 dark:text-white">Correct Answer (Enter Answer Letter)</label>
         <input type="text" id="answer" v-model="form.answer" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" placeholder="">
         </div>
    </div>

  <div class="lg:px-16 lg:right-0 ">

    <button class="card-submit py-3 px-4 text-right gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
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