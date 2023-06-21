<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import AdminNavbar from "../../../Components/SuperAdmin/AdminNavbar.vue";
import AdminSidebar from "../../../Components/SuperAdmin/AdminSidebar.vue";
import pagination from "../../../Components/pagination.vue";
import { Modal } from "flowbite";
import {ref ,onMounted} from 'vue';

const props = defineProps({
    quizes: Object,
    grades: Object,
    message: String,
});


const questionslist = ref(true);
const gradeslist = ref(false);
function listquestions(){
    questionslist.value = !questionslist.value;
    gradeslist.value = false;
}
function listgrades(){
    questionslist.value = false;
    gradeslist.value = !gradeslist.value;
}


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
                                        href="/superadmin/quiz"
                                        class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white"
                                        >Quizes</a
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
                            <li class="mr-2">
                                <button @click="listgrades " class="inline-block p-4 py-2 px-6 bg-white text-gray-400 hover:bg-blue-50 text-sm hover:text-white border border-default font-bold transition duration-200"  >
                                Grades
                                </button>
                            </li>
                        </ul>
                    </div>

                    <div v-if="questionslist">
                    <div v-for="(q,i) in quizes" :key="q.id" class="mt-5 mb-5">
                    <h2 id="accordion-collapse-heading-1 " >
                        <div type="button" class="flex items-center px-6 justify-between w-[75vw] p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 rounded-t-xl  bg-gray-100">
                        <span>Question {{ i +1 }}</span>
                        <div class="delbutton flex text-red-500"><a :href="route('superadmin.delquiz',q.id)">
                            <i class="fa fa-trash"></i> Delete
                            
                           </a>
                        </div>
                     </div>
                    </h2>
                    <div class="border border-gray-200 w-[75vw]">
                        <div class="p-5 px-16 border border-b-0 border-gray-200 ">
                        <p class="mb-2 text-gray-500 dark:text-gray-400">Q{{ i +1 }}: {{ q.question }}</p>
                        <hr class="hr mb-3"/>
                        <p class="mb-2 text-gray-500 dark:text-gray-400">A: {{ q.answer_1 }}</p>
                        <p class="mb-2 text-gray-500 dark:text-gray-400">B: {{ q.answer_2 }}</p>
                        <p class="mb-2 text-gray-500 dark:text-gray-400">C: {{ q.answer_3 }}</p>
                        <p class="mb-2 text-gray-500 dark:text-gray-400">D: {{ q.answer_4 }}</p>
                        </div>
                    </div>
                    </div>
                    </div>

<div v-if="gradeslist">

    <div class="overflow-x-auto">
                <table class="w-full text-sm text-left border border-b text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-center text-gray-700 items-center border border-b uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="lg:px-4 lg:py-3 border ">Student name</th>
                            <th scope="col" class="lg:px-4 lg:py-3 border ">Student Id</th>
                            <th scope="col" class="lg:px-4 lg:py-3 border ">Grade</th>
                            <th scope="col" class="lg:px-4 lg:py-3 border ">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                      <tr v-for="g in grades.data" :key="g.id" class="hover:bg-gray-100">
        
                        <td class="px-6 py-4 border text-center text-sm font-medium text-gray-800 dark:text-gray-200"> {{g.child_firstname +' ' + g.child_lastname}} </td>
                        <td class="px-6 py-4 border text-center text-sm text-gray-800 dark:text-gray-200">{{g.student_id}} </td>
                        <td class="px-6 py-4 border text-center text-sm text-gray-800 dark:text-gray-200">{{g.user_score + '% ' +'/ '+g.grade}} </td>
                        <td class="px-6 py-4 border text-center text-sm text-gray-800 dark:text-gray-200">
                            
                         <Link class="p-2 text-blue-500 hover:text-blue-300 flex justify-center inline-block" v-bind:href="route('superadmin.viewstudent', g.id)">
                            <svg class="w-5 h-5 " fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg> view
                          </Link>
                        </td>
        
                      </tr>
        
                    </tbody>
                </table>
            </div>
            <pagination class="justify-end" :links="grades.links"/>
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
.delbutton{
    float: right;
}
</style>
