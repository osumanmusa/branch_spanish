<script setup>
import {  Head, Link, useForm } from '@inertiajs/vue3';
import AdminNavbar from "../../../Components/Admin/AdminNavbar.vue";
import AdminSidebar from "../../../Components/Admin/AdminSidebar.vue";
import pagination from "../../../Components/pagination.vue";
import { onMounted } from 'vue';
import { Modal } from 'flowbite';


const props=defineProps({
    categories: Object,
    message:String,

});


</script>
<template>
    <Head title="Flashcards" />

     <div  class="flex h-screen bg-blue ">
            <AdminSidebar/>
            
            <div class="flex-1 flex flex-col overflow-hidden">
                <AdminNavbar/>

                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-white">
                    <div class="container mx-3 px-3 py-8">


<!-- Breadcrumb -->
<nav class="flex w-[25vw]  px-5 py-3 text-gray-700 border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
  <ol class="inline-flex items-center space-x-1 md:space-x-3">

    <li>
      <div class="flex items-center">
      <i class="fa fa-angle-left fa-bold"></i>
        <a href="#" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Flashcards</a>
      </div>
    </li>
  </ol>
</nav>




    <div class="mx-auto py-8 max-w-screen-xl lg:px-3">
        <!-- Start coding here -->
        <div class="bg-white dark:bg-gray-800 relative sm:rounded-lg overflow-hidden">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full md:w-1/2">
                    <form class="flex items-center">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" required="">
                        </div>
                    </form>
                </div>
                <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                    <a href="/admin/create_quiz" class="flex py-3 px-4 inline-flex text-right gap-2 items-center justify-center rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                      Add Quiz
                  </a>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left border border-b text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-center text-gray-700 items-center border border-b uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="lg:px-4 lg:py-3 border ">Category name</th>
                            <th scope="col" class="lg:px-4 lg:py-3 border ">Date Upladed</th>
                            <th scope="col" class="lg:px-4 lg:py-3 border ">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                      <tr v-for="c in categories.data" :key="c.id" class="hover:bg-gray-100">
        
                        <td class="px-6 py-4 border text-center text-sm font-medium text-gray-800 dark:text-gray-200"> {{c.category_name}} </td>
                        <td class="px-6 py-4 border text-center text-sm text-gray-800 dark:text-gray-200">{{c.created_at}} </td>
        
                        <td class="px-6 py-4 border whitespace-nowrap text-center text-sm font-medium">
                         <Link class="p-2 text-blue-500 hover:text-blue-200" v-bind:href="route('admin.viewquiz', c.id)">
                            <i class="fa fa-eye fa-solid" aria-hidden="true"></i> view
                          </Link>
                          <a class="p-3 text-red-500 hover:text-red-200" v-bind:href="route('admin.deletequiz', c.id)" >
                            <i class="fa fa-trash fa-solid" aria-hidden="true"></i> Delete
                          </a>
                        </td>
                      </tr>
        
                    </tbody>
                </table>
            </div>
            <pagination class="justify-end" :links="categories.links"/>
        </div>
    </div>



                    </div>
                </main>
            </div>
        </div>






</template>

  