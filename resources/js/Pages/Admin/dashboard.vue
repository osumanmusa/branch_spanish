<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import AdminNavbar from "../../Components/Admin/AdminNavbar.vue";
import AdminSidebar from "../../Components/Admin/AdminSidebar.vue";
import pagination from "../../Components/pagination.vue";
import {ref ,onMounted} from 'vue';
import { Modal } from "flowbite";
const props=defineProps({
    total_students: Object,
    students: Object,
    parents: Object,
    message:String,

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

</script>
<template>
    <Head title="Dashboard" />

    <div class="flex h-screen bg-blue">
        <AdminSidebar />

        <div class="flex-1 flex flex-col overflow-hidden">
            <AdminNavbar />

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-white">
                <div class="container mx-auto px-6 py-8">
                    <!-- component -->
                    <div
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
                    </div>

                    <!--Componen end-->
                    <!--Table start-->
                    <div class="mb-4 border-b border-gray-200 dark:border-gray-700 mt-6">
                        <ul class="flex -mb-px text-sm font-medium text-center" >
                            <li class="mr-2" >
                                <button @click="liststudent" class="register inline-block py-2 px-6 bg-blue-500 text-white hover:bg-blue-50 text-sm hover:text-white border border-primary font-bold transition duration-200" >
                                    Students</button>
                            </li>
                            <li class="mr-2">
                                <button @click="listparent " class="inline-block p-4 py-2 px-6 bg-white text-gray-400 hover:bg-blue-50 text-sm hover:text-white border border-default font-bold transition duration-200"  >
                                Parents
                                </button>
                            </li>
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
                        </ul>
                        
                    </div>


                    <div v-if="studentlist" class="mx-auto max-w-screen-l lg:px-3">
                        <!-- Start coding here -->
                        <div
                            class="bg-white dark:bg-gray-800 relative sm:rounded-lg overflow-hidden"
                        >
                            
                            <div class="overflow-x-auto">
                                <table
                                    class="w-full text-sm text-left border border-b text-gray-500 dark:text-gray-400"
                                >
                                    <thead
                                        class="text-xs text-center text-gray-700 items-center border border-b uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                                    >
                                        <tr>
                                            <th
                                                scope="col"
                                                class="px-4 py-3 border"
                                            >
                                                Student name
                                            </th>
                                            <th scope="col" class="px-4 py-3">
                                                Studnt Id
                                            </th>
                                            <th
                                                scope="col"
                                                class="px-4 py-3 border"
                                            >
                                                Date Enrolled
                                            </th>
                                            <th
                                                scope="col"
                                                class="px-4 py-3 border"
                                            >
                                                Status
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody
                                        class="divide-y divide-gray-200 dark:divide-gray-700"
                                    >
                                        <tr v-for="s in students.data" :key="s.id" class="hover:bg-gray-100">
                                            <td
                                                class="px-6 py-4 border text-center text-sm font-medium text-gray-800 dark:text-gray-200"
                                            >
                                                {{s.child_firstname +' ' + s.child_lastname}}
                                            </td>
                                            <td
                                                class="px-6 py-4 border text-center text-sm text-gray-800 dark:text-gray-200"
                                            >
                                                {{ s.student_id }}
                                            </td>
                                            <td
                                                class="px-6 py-4 border text-center text-sm text-gray-800 dark:text-gray-200"
                                            >
                                                {{ s.created_at }}
                                            </td>

                                            <td
                                                class="px-6 py-4 border whitespace-nowrap text-center text-sm font-medium"
                                            >
                                                {{ s.student_status }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <pagination />
                        </div>
                    </div>

                    <!--Table end-->

                    
                    <div v-if="parentlist" class="mx-auto max-w-screen-l lg:px-3">
                        <!-- Start coding here -->
                        <div
                            class="bg-white dark:bg-gray-800 relative sm:rounded-lg overflow-hidden"
                        >
                            
                            <div class="overflow-x-auto">
                                <table
                                    class="w-full text-sm text-left border border-b text-gray-500 dark:text-gray-400"
                                >
                                    <thead
                                        class="text-xs text-center text-gray-700 items-center border border-b uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                                    >
                                        <tr>
                                            <th
                                                scope="col"
                                                class="px- py-3 border"
                                            >
                                                No
                                            </th>
                                            <th
                                                scope="col"
                                                class="px-4 py-3 border"
                                            >
                                                Parent name
                                            </th>
                                            <th scope="col" class="px-4 py-3">
                                                child name
                                            </th>
                                            <th
                                                scope="col"
                                                class="px-4 py-3 border"
                                            >
                                                Email Address
                                            </th>
                                            <th
                                                scope="col"
                                                class="px-4 py-3 border"
                                            >
                                                Phone Number
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody
                                        class="divide-y divide-gray-200 dark:divide-gray-700"
                                    >
                                        <tr v-for="p in parents.data" :key="p.id" class="hover:bg-gray-100">
                                            <td
                                                class="px-6 py-4 border text-center text-sm font-medium text-gray-800 dark:text-gray-200"
                                            >
                                                {{p.parent_firstname +' ' + p.parent_lastname}}
                                            </td>
                                            <td
                                                class="px-6 py-4 border text-center text-sm text-gray-800 dark:text-gray-200"
                                            >
                                            {{p.child_firstname +' ' + p.child_lastname}}
                                            </td>
                                            <td
                                                class="px-6 py-4 border text-center text-sm text-gray-800 dark:text-gray-200"
                                            >
                                                {{ p.email }}
                                            </td>

                                            <td
                                                class="px-6 py-4 border whitespace-nowrap text-center text-sm font-medium"
                                            >
                                                {{ p.mobile }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <pagination />
                        </div>
                    </div>

                    <!--Table end-->
                </div>
            </main>
        </div>
    </div>
</template>
<style scoped>
.hr{
    border: 2px solid rgb(184, 181, 181);
}
</style>
