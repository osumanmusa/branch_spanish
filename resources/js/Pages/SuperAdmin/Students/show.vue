<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import AdminNavbar from "../../../Components/SuperAdmin/AdminNavbar.vue";
import AdminSidebar from "../../../Components/SuperAdmin/AdminSidebar.vue";
import pagination from "../../../Components/pagination.vue";
import { Modal } from "flowbite";
import {ref ,onMounted} from 'vue';

const props = defineProps({
    studentquiz: Object,
});

let QNo=1;


</script>
<template>
    <Head title="Flashcards" />

    <div class="flex h-screen bg-blue">
        <AdminSidebar />

        <div class="flex-1 flex flex-col overflow-hidden">
            <AdminNavbar />

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-white">
                <div class="container mx-3 px-3 py-8">
                    <!-- Breadcrumb -->
                    <nav
                        class="flex w-[25vw] px-5 py-3 text-gray-700 border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700"
                        aria-label="Breadcrumb"
                    >
                        <ol
                            class="inline-flex items-center space-x-1 md:space-x-3"
                        >
                            <li>
                                <div class="flex items-center">
                                    <a
                                        href="/superadmin/students"
                                        class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white"
                                        >Students</a
                                    >
                                </div>
                            </li>
                        </ol>
                    </nav>
                    
                    <div class="mb-4 border-b border-gray-200 dark:border-gray-700 mt-6">
                        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" >
                            <li class="mr-2" >
                                <button @click="listquestions" class="register inline-block py-2 px-6 bg-blue-500 text-white hover:bg-blue-50 text-sm hover:text-white border border-primary font-bold transition duration-200" >
                                    Questions</button>
                            </li>
                        </ul>
                    </div>

                    <div v-for="q in studentquiz" :key="q.id" class="mt-5 mb-5">
                    <h2 id="accordion-collapse-heading-1 " >
                        <p type="button" class="flex items-center px-6 justify-between w-[75vw] p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 rounded-t-xl  bg-gray-100">
                        <span>Question {{ QNo++ }}</span>
                     </p>
                    </h2>
                    <div class="border border-gray-200 w-[75vw]">
                        <div class="p-5 px-16 border border-b-0 border-gray-200 ">
                        <p class="mb-2 text-gray-500 dark:text-gray-400">A: {{ q.question }}</p>
                        <hr class="hr mb-3"/>
                        <p class="mb-2 text-gray-500 dark:text-gray-400">B: {{ q.answer_1 }}</p>
                        <p class="mb-2 text-gray-500 dark:text-gray-400">C: {{ q.answer_2 }}</p>
                        <p class="mb-2 text-gray-500 dark:text-gray-400">D: {{ q.answer_3 }}</p>
                        <p class="mb-2 text-gray-500 dark:text-gray-400">E: {{ q.answer_4 }}</p>
                        <br>
                        <p class="mb-2 text-gray-500 dark:text-gray-400">Correct Answer: {{ q.answer }}</p>
                        <p class="mb-2 text-gray-500 dark:text-gray-400">Selected Answer: {{ q.user_answer }}</p>
                        </div>
                    </div>
                    </div>


                    
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
