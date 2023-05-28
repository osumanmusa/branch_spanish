<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import ParentNavbar from "../../../Components/Parent/ParentNavbar.vue";
import ParentSidebar from "../../../Components/Parent/ParentSidebar.vue";
import pagination from "../../../Components/pagination.vue";
import { onMounted } from "vue";
import { Modal } from "flowbite";

const props = defineProps({
    child: Object,
    message: String,
});
</script>
<template>
    <Head title="Flashcards" />

    <div class="flex h-screen bg-blue">
        <ParentSidebar />

        <div class="flex-1 flex flex-col overflow-hidden">
            <ParentNavbar />

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
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
                                    <i class="fa fa-angle-left fa-bold"></i>
                                    <a
                                        href="#"
                                        class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white"
                                        >Quiz</a
                                    >
                                </div>
                            </li>
                        </ol>
                    </nav>


                    <div class="flex flex-col lg:w-[70vw]  bg-white border shadow-sm rounded-xl p-4 md:p-5 dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
              
                        <div v-for="c in child" :key="c.id" class="grid grid-cols-2 gap-4 mt-3 mb-2">
                            <div><span> <b>First Name :</b></span> {{c.child_firstname}}  </div>
                            <div><span> <b>Last Name :</b></span> {{c.child_lastname}} </div>
                            <div><span> <b>Parent First Name :</b></span> {{c.parent_firstname}}  </div>
                            <div><span> <b>Parent Last Name :</b></span> {{c.parent_lastname}} </div>
                            <div><span> <b>Email :</b></span> {{c.email}}  </div>
                            <div><span> <b>Student ID :</b></span> {{c.student_id}} </div>
                            <div><span> <b>Admission Status :</b></span>
                                    <span v-if="c.student_status == null" class="text-yellow-400">
                                    <b> Processing</b></span>
                                    <span v-else class="text-green-400"> {{ c.student_status}}</span>  
                            </div>
                            
                            <div></div>
                            <div><span> <b>Category Name :</b></span> {{c.category_name}} </div>
                            <div><span> <b>Quiz Score :</b></span> {{c.user_score}}% </div>
                            <div><span> <b>Quiz Grade :</b> {{c.grade }}</span></div>
                        </div>
                    </div>

                    
                </div>
            </main>
        </div>
    </div>
</template>
