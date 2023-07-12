<script setup>
import { Head, Link, useForm} from '@inertiajs/vue3';
import { ref  } from 'vue';
import login from '../../Components/login.vue';
import registercomponent from '../../Components/register.vue';
import resetpassword from'../../Components/resetpassword.vue';
import {useSidebarStore} from '../../../js/Store/useSidebarstore'


const sidebar = useSidebarStore()

const selected = ref(-1);
const changeSelected = (i) => {
  selected.value = i;

}
</script>
<template>
    
<div  :class="sidebar.isOpen ? 'block' : 'hidden'" @click="sidebar.toggleOpen" class="sidebar fixed inset-0 z-20 transition-opacity bg-black opacity-50 lg:hidden"></div>
    
    <div  :class="sidebar.isOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class="sidebar fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto transition duration-300 transform bg-blue-500 lg:translate-x-0 lg:static lg:inset-0">
        <div class="flex items-center justify-center mt-8">
            <div class="flex flex-col items-center">
                
                <span class="mx-2 font-semibold text-white ">{{ $page.props.auth.user.name }}</span>
                <p class="pt-2 text-white">{{ $page.props.auth.user.role }}</p>
            </div>
        </div>
    
        <nav class="mt-10">
            <Link class="flex items-center px-6 py-2 mt-4 text-gray-100 font-bold hover:text-gray-100 hover:bg-gray-700 hover:bg-opacity-25" href="/adminhome" :class="{ 'selected': $page.url === '/adminhome' }">
                <img src="/img/dashboard/1.png"/>
    
                <span class="mx-3">Dashboard</span>
            </Link>
    
            <Link  class="flex items-center px-6 py-2 mt-4 text-gray-100 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="/admin/category" :class="{ 'selected': $page.url === '/admin/category' }">
                <img src="/img/dashboard/5.png"/>
    
                <span class="mx-3">Categories</span>
            </Link>

            <Link  class="flex items-center px-6 py-2 mt-4 text-gray-100 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="/admin/flashcards" :class="{ 'selected': $page.url === '/admin/flashcards' }">
                <img src="/img/dashboard/2.png"/>
    
                <span class="mx-3">Flash Cards</span>
            </Link>
    
            <Link  class="flex items-center px-6 py-2 mt-4 text-gray-100 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="/admin/pronounciation" :class="{ 'selected': $page.url === '/admin/pronounciation' }">
                <img src="/img/dashboard/3.png"/>
    
                <span class="mx-3">Pronunciation</span>
            </Link>
    
            <Link  class="flex items-center px-6 py-2 mt-4 text-gray-100 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="/admin/quiz" :class="{ 'selected': $page.url === '/admin/quiz' }">
                <img src="/img/dashboard/4.png"/>
    
                <span class="mx-3">Quiz me</span>
            </Link>
            <Link  class="flex items-center px-6 py-2 mt-4 text-gray-100 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="/admin/students" :class="{ 'selected': $page.url === '/admin/students' }">
                <img src="/img/i6.png" class="w-6 h-6"/>

                <span class="mx-3">Students</span>
            </Link>
    
            <Link  class="flex items-center px-6 py-2 mt-4 text-gray-100 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="/admin/accounts" :class="{ 'selected': $page.url === '/admin/accounts' }">
                <img src="/img/i5.jpg" class="w-6 h-6"/>

                <span class="mx-3">Accounts</span>
            </Link>
    

        </nav>
    </div>
</template>
<style scoped>
.selected {
      background-color: #f6f8f8 !important;
      color:rgb(39, 128, 201);
    }
.select-highlight {
  position: absolute;
  right: 0;
  top: 135px;
  height: 30px;
  width: 4px;
  background-color: #f6f8f8;
  transition: 0.1s top ease-out;
}
</style>