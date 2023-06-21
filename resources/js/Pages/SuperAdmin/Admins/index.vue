<script setup>
import {  Head, Link, useForm } from '@inertiajs/vue3';
import AdminNavbar from "../../../Components/SuperAdmin/AdminNavbar.vue";
import AdminSidebar from "../../../Components/SuperAdmin/AdminSidebar.vue";
import pagination from "../../../Components/pagination.vue";
import { onMounted } from 'vue';
import { Modal } from 'flowbite';


const props=defineProps({
    admins: Object,
    message:String,
    successmessage: Object,
    errormessage: Object,

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


<Transition name="fade" mode="out-in">
    <div v-if="$page.props.flash.successmessage"  class="tostr flex mt-2 items-center w-full max-w-xs p-4 space-x-4 text-green-500 bg-gray-100 divide-x divide-gray-200 rounded-lg shadow dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800" role="alert">
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
    <div v-if="$page.props.flash.errormessage" id="toast-simple" class="tostr flex mt-2 mr-3 items-center w-full max-w-xs p-4 space-x-4 text-red-500 bg-white divide-x divide-gray-200 rounded-lg shadow dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800" role="alert">
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
<!-- Breadcrumb -->
<nav class="flex lg:w-[15vw] px-5 py-3 text-gray-700 border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
  <ol class="inline-flex items-center space-x-1 md:space-x-3">

    <li>
      <div class="flex items-center">
        <a href="/superadmin/admins" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Add Admin</a>
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
                    <a href="/superadmin/addadmin" class="flex py-3 px-4 inline-flex text-right gap-2 items-center justify-center rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                      Add Admin
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="20" height="20" viewBox="0 0 256 256" xml:space="preserve">

                    <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(46.02023346303501 36.05914396887157) scale(2.03 2.03)" >
	                <path d="M 58.921 90 H 31.079 c -1.155 0 -2.092 -0.936 -2.092 -2.092 V 2.092 C 28.988 0.936 29.924 0 31.079 0 h 27.841 c 1.155 0 2.092 0.936 2.092 2.092 v 85.817 C 61.012 89.064 60.076 90 58.921 90 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
	                <path d="M 90 31.079 v 27.841 c 0 1.155 -0.936 2.092 -2.092 2.092 H 2.092 C 0.936 61.012 0 60.076 0 58.921 V 31.079 c 0 -1.155 0.936 -2.092 2.092 -2.092 h 85.817 C 89.064 28.988 90 29.924 90 31.079 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                    </g>
                    </svg>
                  </a>
                </div>

            </div>
            <div class="overflow-x-auto">                
              <table class="w-full text-sm text-left border border-b text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-center text-gray-700 items-center border border-b uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="lg:px-4 lg:py-3 border ">Admin name</th>
                            <th scope="col" class="lg:px-4 lg:py-3 border ">Admin Email</th>
                            <th scope="col" class="lg:px-4 lg:py-3 border ">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                      <tr v-for="s in admins.data" :key="s.id" class="hover:bg-gray-100">
        
                        <td class="px-6 py-4 border text-center text-sm font-medium text-gray-800 dark:text-gray-200"> {{s.name}} </td>
                        <td class="px-6 py-4 border text-center text-sm text-gray-800 dark:text-gray-200">{{s.email}} </td>
                        <td class="px-6 py-4 border text-center text-sm text-gray-800 dark:text-gray-200">
                            
                         
                          <a class="p-4 mx-1 py-2 px-6 bg-white text-red-500 hover:bg-red-600 text-sm hover:text-white border border-default font-bold transition duration-200" v-bind:href="route('superadmin.deleteadmin', s.id)">
                            <i class="fa fa-trash fa-solid" aria-hidden="true"></i> Delete
                          </a>
                        </td>
        
                      </tr>
        
                    </tbody>
                </table>

            </div>
            <pagination class="justify-end" :links="admins.links"/>
        </div>
    </div>



                    </div>
                </main>
            </div>
        </div>






</template>
<style scoped>

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