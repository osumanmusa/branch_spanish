<script setup>
import {  Head, Link, useForm } from '@inertiajs/vue3';
import AdminNavbar from "../../../Components/SuperAdmin/AdminNavbar.vue";
import AdminSidebar from "../../../Components/SuperAdmin/AdminSidebar.vue";
import pagination from "../../../Components/pagination.vue";
import { onMounted } from 'vue';
import { Modal } from 'flowbite';


const props=defineProps({
    child: Object,
    message:String,
    successmessage: Object,
    errormessage: Object,
    parent:Object,
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
        <a href="/superadmin/students" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Student Account </a>
      </div>
    </li>
  </ol>
</nav>


<div class="flex flex-col lg:w-[70vw] mt-2 bg-white border shadow-sm rounded-xl p-4 md:p-5 dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
<h1 class=" text-gray-400 font-bold text-l py-3"> STUDENT ACCOUNT INFORMATION</h1>
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
    
    <!-- <div><span> <b>First Name: </b></span> {{c.child_firstname}}  </div>
        <div><span> <b>Last Name: </b></span> {{c.child_lastname}} </div>
        <div><span> <b>Parent First Name: </b></span> {{c.parent_firstname}}  </div>
        <div><span> <b>Parent Last Name: </b></span> {{c.parent_lastname}} </div>
        <div><span> <b>Email: </b></span> {{c.email}}  </div>
        <div><span> <b>Student ID: </b></span> {{c.student_id}} </div>
        <div><span> <b>Child School: </b></span> {{c.child_school}} </div>
        <div><span> <b>Parent Residence: </b></span> {{c.parent_residence}} </div>
        <div><span> <b>Admission Status:  </b></span>
                <span v-if="c.student_status == null" class="text-yellow-400">
                <b> Processing</b></span>
                <span v-else class="text-green-400"> {{ c.student_status}}</span>  
        </div> -->
</div>

<div v-for="p in parent" :key="p.id" v-show="p.parent_index !==null" class="flex flex-col lg:w-[70vw] mt-6 bg-white border shadow-sm rounded-xl p-4 md:p-5 dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
<h1 class=" text-gray-400 font-bold text-l py-3"> PARENT ACCOUNT INFORMATION</h1>
    <div  class="grid lg:grid-cols-6 gap-3 mt-3 mb-2">
      
        <div class="col-span-2">
          <img :src="'/img/profile-img/' + p.profile_image" class="border rounded rounded-lg p-img"/>
        </div>
        <div class="col-span-2 pt-1 hidden-small ">
        <div class="p-2"><span class="px-3">First Name: </span>  </div>
        <div class="p-2"><span class="px-3">Last Name: </span>  </div>
        <div class="p-2"><span class="px-3">Child First Name: </span> </div>
        <div class="p-2"><span class="px-3">Child Last Name: </span> </div>
        <div class="p-2"><span class="px-3">Email: </span> </div>
        <div class="p-2"><span class="px-3">Parent Residence: </span></div>

        </div>
        <div class="col-span-2 hidden-small">
        <div class="p-2"><span class="">{{p.parent_firstname}}</span>  </div>
        <div class="p-2"><span class="">{{p.parent_lastname}}</span> </div>
        <div class="p-2"><span class="">{{p.child_firstname}}</span>  </div>
        <div class="p-2"><span class="">{{p.child_lastname}}</span> </div>
        <div class="p-2"><span class="">{{p.email}}</span>  </div>
        <div class="p-2"><span class="">{{p.parent_residence}}</span> </div>

        </div>
        <div class="lg:hidden md:hidden">
        <div class="col-span-4 pt-1">
    <div class="p-1"><span class="px-1">First Name: </span> <span class="px-1">{{p.parent_firstname}}</span>  </div>
        <div class="p-1"><span class="px-1">Last Name: </span> <span class="px-1">{{p.parent_lastname}}</span> </div>
        <div class="p-1"><span class="px-1">Parent First Name: </span> <span class="px-1">{{p.child_firstname}}</span>  </div>
        <div class="p-1"><span class="px-1">Parent Last Name: </span> <span class="px-1">{{p.child_lastname}}</span> </div>
        <div class="p-1"><span class="px-1">Email: </span> <span class="px-1">{{p.email}}</span>  </div>
        <div class="p-1"><span class="px-1">Parent Residence: </span> <span class="px-1">{{p.parent_residence}}</span> </div>

        </div>
        </div>
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