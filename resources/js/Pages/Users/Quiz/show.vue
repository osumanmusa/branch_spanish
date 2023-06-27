<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import UserNavbar from "../../../Components/User/UserNavbar.vue";
import UserSidebar from "../../../Components/User/UserSidebar.vue";
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
        <UserSidebar />

        <div class="flex-1 flex flex-col overflow-hidden">
            <UserNavbar />

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-white">
                <div class="container mx-3 px-3 py-8">
                    <!-- Breadcrumb -->
                    <nav
                        class="flex w-[25vw] px-5 py-3 mb-3 text-gray-700 border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700"
                        aria-label="Breadcrumb"
                    >
                        <ol
                            class="inline-flex items-center space-x-1 md:space-x-3"
                        >
                            <li>
                                <div class="flex items-center">
                                    <a
                                        href="#"
                                        class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white"
                                        >Quiz</a
                                    >
                                </div>
                            </li>
                        </ol>
                    </nav>


                    <!-- <div v-for="c in child" :key="c.id"  class="flex p-6 mt-4 flex-col lg:w-[70vw] bg-white border shadow-sm rounded-xl p-4 md:p-5 dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
               
                        <div class="grid lg:grid-cols-2 gap-4 mt-3 mb-2">
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
                    </div> -->
                    


<div v-for="(q,i) in child" :key="q.id" class="mt-5 mb-5">

<!-- <div class="grid lg:grid-cols-2 gap-4 mt-3 mb-2">
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
</div> -->


<!-- <div  class="grid lg:grid-cols-6 gap-3 mt-3 mb-2">
  
  <div class="col-span-2 pt-1 hidden-small">
  <div class="p-2"><span class="px-3">First Name: </span>  </div>
  <div class="p-2"><span class="px-3">Last Name: </span>  </div>
  <div class="p-2"><span class="px-3">Email: </span> </div>
  <div class="p-2"><span class="px-3">Student ID: </span></div>
  <div class="p-2"><span class="px-3">Admission Status:  </span> </div>
  <div class="p-2"><span class="px-3">Category Name: </span></div>
  <div class="p-2"><span class="px-3">Quiz Score: </span></div>
  <div class="p-2"><span class="px-3">Quiz Grade: </span></div>

  </div>
  <div class="col-span-2 hidden-small">
  <div class="p-2"><span class="">{{s.child_firstname}}</span>  </div>
  <div class="p-2"><span class="">{{s.child_lastname}}</span> </div>
  <div class="p-2"><span class="">{{s.email}}</span>  </div>
  <div class="p-2"><span class="">{{s.student_id}}</span> </div>
  <div class="p-2">
          <span v-if="s.student_status == null" class="text-yellow-400 ">
          <b> Processing</b></span>
          <span v-else class="text-green-400 "> {{ s.student_status}}</span>  
  </div>
  <div class="p-2"><span class="">{{s.category_name}} </span>  </div>
  <div class="p-2"><span class="">{{s.user_score}}% </span> </div>
  <div class="p-2"><span class="">{{s.grade }}</span>  </div>

  </div>
  <div class="lg:hidden md:hidden">
  <div class="col-span-4 pt-1">
<div class="p-1"><span class="px-1">First Name: </span> <span class="px-1">{{s.child_firstname}}</span>  </div>
  <div class="p-1"><span class="px-1">Last Name: </span> <span class="px-1">{{s.child_lastname}}</span> </div>
  <div class="p-1"><span class="px-1">Email: </span> <span class="px-1">{{s.email}}</span>  </div>
  <div class="p-1"><span class="px-1">Student ID: </span> <span class="px-1">{{s.student_id}}</span> </div>
  <div class="p-1"><span class="px-1">Child School: </span> <span class="px-1">{{s.child_school}}</span> </div>
  <div class="p-1"><span class="px-1">Parent Residence: </span> <span class="px-1">{{s.parent_residence}}</span> </div>
  <div class="p-1"><span class="px-1">Admission Status:  </span>
          <span v-if="s.student_status == null" class="text-yellow-400 px-1">
          <b> Processing</b></span>
          <span v-else class="text-green-400 px-1"> {{ s.student_status}}</span>  
  </div>
    <div class="p-1"><span class="px-1"> Category Name :</span> {{s.category_name}} </div>
    <div class="p-1"><span class="px-1"> Quiz Score :</span> {{s.user_score}}% </div>
    <div class="p-1"><span class="px-1"> Quiz Grade : {{s.grade }}</span></div>

  </div>
  </div>
</div>

</div> -->



                    <h2 id="accordion-collapse-heading-1 " >
                        <p type="button" class="flex items-center px-6 justify-between w-[75vw] p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 rounded-t-xl  bg-gray-100">
                        <span>Question {{ i +1 }}</span>
                     </p>
                    </h2>
                    <div class="border border-gray-200 w-[75vw]">
                        <div class="p-5 px-16 border border-b-0 border-gray-200 ">
                        <p class="mb-2 text-gray-500 dark:text-gray-400">Q{{ i +1 }}: {{ q.question }}</p>
                        <hr class="hr mb-3"/>
                        <p class="mb-2 text-gray-500 dark:text-gray-400">A: {{ q.answer_1 }}</p>
                        <p class="mb-2 text-gray-500 dark:text-gray-400">B: {{ q.answer_2 }}</p>
                        <p class="mb-2 text-gray-500 dark:text-gray-400">C: {{ q.answer_3 }}</p>
                        <p class="mb-2 text-gray-500 dark:text-gray-400">D: {{ q.answer_4 }}</p>
                        <!-- <p class="mb-2 text-gray-500 dark:text-gray-400">Q{{ i +1 }}: {{ q.question }}</p>
                        <hr class="hr mb-3"/>
                        <p class="mb-2 text-gray-500 dark:text-gray-400">
                        <span v-if="q.answer_1 === q.answer && q.user_answer === q.answer_1" class="bg-green-500 text-white px-2">A: {{ q.answer_1 }}</span>
                       
                        <span v-else-if="q.user_answer != q.answer && q.user_answer === q.answer_1" class="px-2">A: {{ q.answer_1 }}</span>
                        <span v-else class="px-2">A: {{ q.answer_1 }}</span></p>

                        <p class="mb-2 text-gray-500 dark:text-gray-400">
                        <span v-if="q.answer_2 === q.answer" class="bg-green-500 text-white px-2">B: {{ q.answer_2 }}</span>
                        <span v-else class="px-2">B: {{ q.answer_2 }}</span></p>
                        <p class="mb-2 text-gray-500 dark:text-gray-400">
                        <span v-if="q.answer_3 === q.answer" class="bg-green-500 text-white px-2">C: {{ q.answer_3 }}</span>
                        <span v-else class="px-2">C: {{ q.answer_3 }}</span></p>
                        <p class="mb-2 text-gray-500 dark:text-gray-400">
                        <span v-if="q.answer_4 === q.answer" class="bg-green-500 text-white px-2">D: {{ q.answer_4 }}</span>
                        <span v-else class="px-2">D: {{ q.answer_4 }}</span></p> -->
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
<style >
.hr{
    border: 2px solid rgb(184, 181, 181);
}
.hidden-small {
      display: block;
    }

    @media (max-width: 768px) {
      .hidden-small {
        display: none;
      }
    }
</style>
