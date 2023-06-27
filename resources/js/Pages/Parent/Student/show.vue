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
                                    <a
                                        href="#"
                                        class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white"
                                        >Quiz</a
                                    >
                                </div>
                            </li>
                        </ol>
                    </nav>


                    <div class="flex flex-col mt-4 lg:w-[70vw]  bg-white border shadow-sm rounded-xl p-4 md:p-5 dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
              
                        <div v-for="s in child" :key="s.id" class="grid lg:grid-cols-6 gap-3 mt-3 mb-2">
      
      <div class="col-span-2">
        <img :src="'/img/profile-img/' + s.profile_image" class="border rounded rounded-lg p-img"/>
      </div>
      <div class="col-span-2 pt-1 hidden-small">
      <div class="p-2"><span class="px-3">First Name: </span>  </div>
      <div class="p-2"><span class="px-3">Last Name: </span>  </div>
      <div v-show="s.parent_index !=null" class="p-2"><span class="px-3">Parent First Name: </span> </div>
      <div v-show="s.parent_index !=null" class="p-2"><span class="px-3">Parent Last Name: </span> </div>
      <div class="p-2"><span class="px-3">Email: </span> </div>
      <div class="p-2"><span class="px-3">Student ID: </span></div>
      <div v-show="s.parent_index !=null" class="p-2"><span class="px-3">Child School: </span> </div>
      <div v-show="s.parent_index !=null" class="p-2"><span class="px-3">Parent Residence: </span></div>
      <div class="p-2"><span class="px-3">Admission Status:  </span> 
      </div>

      </div>
      <div class="col-span-2 hidden-small">
      <div class="p-2"><span class="">{{s.child_firstname}}</span>  </div>
      <div class="p-2"><span class="">{{s.child_lastname}}</span> </div>
      <div v-show="s.parent_index !=null" class="p-2"><span class="">{{s.parent_firstname}}</span>  </div>
      <div v-show="s.parent_index !=null" class="p-2"><span class="">{{s.parent_lastname}}</span> </div>
      <div class="p-2"><span class="">{{s.email}}</span>  </div>
      <div class="p-2"><span class="">{{s.student_id}}</span> </div>
      <div v-show="s.parent_index !=null" class="p-2"><span class="">{{s.child_school}}</span> </div>
      <div v-show="s.parent_index !=null" class="p-2"><span class="">{{s.parent_residence}}</span> </div>
      <div class="p-2">
              <span v-if="s.student_status == null" class="text-yellow-400 ">
              <b> Processing</b></span>
              <span v-else class="text-green-400 "> {{ s.student_status}}</span>  
      </div>

      </div>
      <div class="lg:hidden md:hidden">
      <div class="col-span-4 pt-1">
  <div class="p-1"><span class="px-1">First Name: </span> <span class="px-1">{{s.child_firstname}}</span>  </div>
      <div class="p-1"><span class="px-1">Last Name: </span> <span class="px-1">{{s.child_lastname}}</span> </div>
      <div class="p-1"><span class="px-1">Parent First Name: </span> <span class="px-1">{{s.parent_firstname}}</span>  </div>
      <div class="p-1"><span class="px-1">Parent Last Name: </span> <span class="px-1">{{s.parent_lastname}}</span> </div>
      <div class="p-1"><span class="px-1">Email: </span> <span class="px-1">{{s.email}}</span>  </div>
      <div class="p-1"><span class="px-1">Student ID: </span> <span class="px-1">{{s.student_id}}</span> </div>
      <div class="p-1"><span class="px-1">Child School: </span> <span class="px-1">{{s.child_school}}</span> </div>
      <div class="p-1"><span class="px-1">Parent Residence: </span> <span class="px-1">{{s.parent_residence}}</span> </div>
      <div class="p-1"><span class="px-1">Admission Status:  </span>
              <span v-if="s.student_status == null" class="text-yellow-400 px-1">
              <b> Processing</b></span>
              <span v-else class="text-green-400 px-1"> {{ s.student_status}}</span>  
      </div>

      </div>
      </div>
  </div>
                    </div>

                    
                </div>
            </main>
        </div>
    </div>
</template>
<style >
 
 .p-img{
  height: 360px;
  width: 300px;
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