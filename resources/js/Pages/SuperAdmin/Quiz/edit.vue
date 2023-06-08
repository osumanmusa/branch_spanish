<script setup>
import {  Head, Link, useForm } from '@inertiajs/vue3';
import AdminNavbar from "../../../Components/SuperAdmin/AdminNavbar.vue";
import AdminSidebar from "../../../Components/SuperAdmin/AdminSidebar.vue";


const form = useForm({
    category: '',
    title: '',
    flashcard: '',
    backcontent: '',
    frontcontent:'',
});

const submit = () => {
    form.post(route('superadmin.flashcard.store'));
};

defineProps(['message']);
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
    <div class="p-3">
         <label for="input-label" class="block text-sm mb-2 dark:text-white">Flashcard Category</label>
         <select id="category" v-model="form.category" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
            <option value="El Alfabeto">El Alfabeto</option>
            <option value="En Casa">En Casa</option>
            <option value="En Clase">En Clase</option>
            <option value="Los Días de la Semana">Los Días de la Semana</option>
            <option value="Los Meses">Los Meses</option>
            <option value="Los Números">Los Números</option>
            <option value="Las Estaciones">Las Estaciones</option>
            <option value="¿Qué Hora Es?">¿Qué Hora Es?</option>
            <option value="Los Colores">Los Colores</option>
            <option value="La Familia">La Familia</option>
            <option value="Los Verbos">Los Verbos</option>
            <option value="Los Adjetivos">Los Adjetivos</option>
            <option value="La Comida ">La Comida </option>
            <option value="La Ropa">La Ropa</option>
            <option value="Los Partes del Cuerpo">Los Partes del Cuerpo</option>
            <option value="Technología">Technología</option>
            <option value="Profesiones">Profesiones</option>
            <option value="La Naturaleza">La Naturaleza</option>
         </select>
    </div>
    <div class="p-3">
         <p><b>Content</b></p>
    </div>
    <div class="p-3">
         <label for="input-label" class="block text-sm  mb-2 dark:text-white">Flash card Title</label>
         <input type="text" id="title" v-model="form.title" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" placeholder="Enter Title">
    </div>
    <div class="p-3">
         <label for="input-label" class="block text-sm  mb-2 dark:text-white">say it in a sentence</label>
         <input type="text" id="flashcard" v-model="form.flashcard"  class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" placeholder="">
    </div>
    <div class="p-3">
         <label for="input-label" class="block text-sm  mb-2 dark:text-white">Flash card front content</label>
         <input type="text" id="frontcontent" v-model="form.frontcontent" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" placeholder="">
    </div>
    <div class="p-3">
         <label for="input-label" class="block text-sm  mb-2 dark:text-white">Flash card back content</label>
         <input type="text" id="backcontent" v-model="form.backcontent" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" placeholder="">
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