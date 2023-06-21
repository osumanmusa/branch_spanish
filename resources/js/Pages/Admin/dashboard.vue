<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import AdminNavbar from "../../Components/Admin/AdminNavbar.vue";
import AdminSidebar from "../../Components/Admin/AdminSidebar.vue";
import pagination from "../../Components/pagination.vue";
import { ref, onMounted } from "vue";
import { Modal } from "flowbite";
import moment from "moment";
const props = defineProps({
    total_students: Object,
    quiz: Object,
    categories: Object,
    flashcard: Object,
    parents: Object,
    voice: Object,
    students: Object,
    liststudents: Object,
    message: String,
    successmessage: Object,
    errormessage: Object,
});

const studentlist = ref(true);
const parentlist = ref(false);
function listparent() {
    parentlist.value = !parentlist.value;
    studentlist.value = false;
}
function liststudent() {
    parentlist.value = false;
    studentlist.value = !studentlist.value;
}
const form = useForm({
    search: "",
});
const submit = () => {
    form.get("/adminhome");
};
</script>
<template>
    <Head title="Dashboard" />

    <div class="flex h-screen bg-blue">
        <AdminSidebar />

        <div class="flex-1 flex flex-col overflow-hidden">
            <AdminNavbar />
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

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-white">
                <div class="container mx-auto px-6 py-8">

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
                    <!--Table end-->


                    
                    <!--Table start-->
                    <div
                        class="mb-4 border-b border-gray-200 dark:border-gray-700 mt-16"
                    >
                        <ul class="flex -mb-px text-sm font-medium text-center">
                            <div class="w-full md:w-1/2">
                                <form class="flex items-center">
                                    <label for="simple-search" class="sr-only"
                                        >Search</label
                                    >
                                    <div class="relative w-full">
                                        <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none"
                                        >
                                            <svg
                                                aria-hidden="true"
                                                class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                fill="currentColor"
                                                viewbox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                    clip-rule="evenodd"
                                                />
                                            </svg>
                                        </div>
                                        <input
                                            v-model="form.search"
                                            @keyup="submit"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Search"
                                            required=""
                                        />
                                    </div>
                                </form>
                            </div>
                        </ul>
                    </div>

                    <div class="mx-auto max-w-screen-l lg:px-3">
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
                                                Student Id
                                            </th>
                                            <th
                                                scope="col"
                                                class="px-4 py-3 border"
                                            >
                                                Parent name
                                            </th>
                                            <th scope="col" class="px-4 py-3">
                                                student School
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
                                                Enrollement Status
                                            </th>

                                            <th
                                                scope="col"
                                                class="px-4 py-3 border"
                                            >
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody
                                        class="divide-y divide-gray-200 dark:divide-gray-700"
                                    >
                                        <tr
                                            v-for="p in liststudents.data"
                                            :key="p.id"
                                            class="hover:bg-gray-100"
                                        >
                                           
                                           <td
                                               class="px-6 py-4 border text-center text-sm font-medium text-gray-800 dark:text-gray-200"
                                           >
                                               <a :href="
                                                       route('admin.studentdetails', p.id
                                                       )">{{p.child_firstname +' ' + p.child_lastname}}</a>
                                           </td>
                                           <td
                                               class="px-6 py-4 border text-center text-sm text-gray-800 dark:text-gray-200"
                                           >
                                               <a :href="
                                                       route('admin.studentdetails', p.id
                                                       )">{{ p.student_id }}</a>
                                           </td>
                                           <td
                                               class="px-6 py-4 border text-center text-sm font-medium text-gray-800 dark:text-gray-200"
                                           >
                                               <a :href="
                                                       route('admin.studentdetails', p.id
                                                       )">{{p.parent_firstname +' ' + p.parent_lastname}}</a>
                                           </td>
                                           <td
                                               class="px-6 py-4 border text-center text-sm text-gray-800 dark:text-gray-200"
                                           >
                                               <a :href="
                                                       route('admin.studentdetails', p.id
                                                       )">{{ p.child_school }}</a>
                                           </td>
                                           <td
                                               class="px-6 py-4 border text-center text-sm text-gray-800 dark:text-gray-200"
                                           >
                                               <!-- {{ p.created_at}} -->
                                               <a :href="
                                                       route('admin.studentdetails', p.id
                                                       )">{{ moment(p.created_at).format("DD-MM-YYYY") }}</a>
                                           </td>
                                           <td
                                               class="px-6 py-4 border text-center text-sm text-gray-800 dark:text-gray-200"
                                           >
                                               <a :href="
                                                       route('admin.studentdetails', p.id
                                                       )">{{ p.student_status }}</a>
                                           </td>

                                            <td
                                                class="px-6 mx-1 py-4 border whitespace-nowrap text-center text-sm font-medium"
                                            >
                                                
                            
                            <a
                                class="p-3 text-blue-500 hover:text-blue-200"
                                v-bind:href="
                                    route('admin.studentdetails', p.id
                                    )
                                "
                            >
                                <i
                                    class="fa fa-sticky-note fa-solid"
                                    aria-hidden="true"
                                ></i>
                                Details
                            </a> 
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <pagination />
                        </div>
                    </div>

                    <!--Table end-->

                    <!--Table end-->
                </div>
            </main>
        </div>
    </div>
</template>
<style scoped>
.hr {
    border: 2px solid rgb(184, 181, 181);
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
