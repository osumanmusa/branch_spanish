<script setup>
import {  Head, Link, useForm } from '@inertiajs/vue3';
import AdminNavbar from "../../Components/Admin/AdminNavbar.vue";
import AdminSidebar from "../../Components/Admin/AdminSidebar.vue";

</script>
<template>
    <Head title="Dashboard" />

	<!--Regular Datatables CSS-->
	<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
	<!--Responsive Extension Datatables CSS-->
	<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
        <div  class="flex h-screen bg-blue ">
            <AdminSidebar/>
            
            <div class="flex-1 flex flex-col overflow-hidden">
                <AdminNavbar/>

                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-white">
                    <div class="container mx-auto px-6 py-8">


            <!-- component -->
<div class="bg-green-600 lg:w-[25vw] border rounded-xl shadow-sm sm:flex dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">

    <div class="flex flex-wrap">
        <div class="p-2 flex flex-col h-full sm:p-7">
             <h3 class="text-lg font-bold text-gray-100 dark:text-white">
                  Student
            </h3>
                <p class="mt-1 text-gray-100 dark:text-gray-400">
                    15
                </p>

        </div>
    </div>
    <div class="flex flex-wrap">
    <div class="p-2 flex flex-col h-full sm:p-7">
      <p class="mt-1 ">
        <img src="/img/icon.png" class="h[10vh]"/>
      </p>

    </div>
  </div>
</div>



            <!--Componen end-->
<!--Table start-->

<div class="flex flex-col mt-12">
  <div class="-m-1.5 overflow-x-auto">
    <div class="p-1.5 min-w-full inline-block align-middle">
      <div class="">
        <div class="py-3 px-4">
          <div class="relative max-w-xs">
            <label for="hs-table-with-pagination-search" class="sr-only">Search</label>
            <input type="text" name="hs-table-with-pagination-search" id="hs-table-with-pagination-search" class="p-3 pl-10 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" placeholder="Search for items">
            <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none pl-4">
              <svg class="h-3.5 w-3.5 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
              </svg>
            </div>
          </div>
        </div>
        <div class="overflow-hidden">
          <table class="border rounded-lg  divide-x divide-gray-400 divide-y divide-gray-400 dark:border-gray-700 dark:divide-gray-700 min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-200 dark:bg-gray-700">
              <tr class="divide-y divide-gray-400 divide-x divide-gray-400">
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Student ID</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date Enrolled</th>
                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Status of Child</th>
                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Status of Child</th>

            </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
              <tr>

                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">John Brown</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">4125sdzf5</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">21/11/2016</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">21/11/2016</td>

                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                  <a class="text-blue-500 hover:text-blue-700" href="#">Enrolled</a>
                </td>
              </tr>

            </tbody>
          </table>
        </div>
        <div class="py-1 px-4">
          <nav class="flex items-center space-x-2">
            <a class="text-gray-400 hover:text-blue-600 p-4 inline-flex items-center gap-2 font-medium rounded-md" href="#">
              <span aria-hidden="true">«</span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="w-10 h-10 bg-blue-500 text-white p-4 inline-flex items-center text-sm font-medium rounded-full" href="#" aria-current="page">1</a>
            <a class="w-10 h-10 text-gray-400 hover:text-blue-600 p-4 inline-flex items-center text-sm font-medium rounded-full" href="#">2</a>
            <a class="w-10 h-10 text-gray-400 hover:text-blue-600 p-4 inline-flex items-center text-sm font-medium rounded-full" href="#">3</a>
            <a class="text-gray-400 hover:text-blue-600 p-4 inline-flex items-center gap-2 font-medium rounded-md" href="#">
              <span class="sr-only">Next</span>
              <span aria-hidden="true">»</span>
            </a>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Table end-->
                    </div>
                </main>
            </div>
        </div>






</template>

  