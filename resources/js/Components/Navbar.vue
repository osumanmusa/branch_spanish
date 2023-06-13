<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref,  onMounted  } from 'vue';
import Dropdown from '../Components/Dropdown.vue';
import DropdownLink from '../Components/DropdownLink.vue';



let showMenu = ref(false);
    const toggleNav = () => (showMenu.value = !showMenu.value);


</script>
<template>
      <nav
      class="sticky top-0 nav
        py-4
        md:flex bg-white shadow-md 
      "
    >
      <div class="flex items-center ">
        <a href="/" class="lg:ml-6 "
          >
            <img src="/img/bg.png" class="logo"/>
      </a>
        <a href="/" class="lg:ml-1 px-4"
          >
            <img src="/img/logo2.jpg" class=" logo2"/>
      </a>
        <!-- <button type="button" class="lg:ml-12 py-6 text-gray-700 border border-gray-700 font-medium rounded-lg text-lg px-8 text-center mb-2 ">
          Branch Out With Spanish</button> -->

        <div @click="toggleNav" class="flex md:hidden px-3">
          <button
            type="button"
            class="
              text-yellow-800
              hover:text-gray-400
              focus:outline-none focus:text-gray-400
            "
          >
            <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
              <path
                fill-rule="evenodd"
                d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"
              ></path>
            </svg>
          </button>
        </div>
      </div>
      
      <ul
        :class="showMenu ? 'flex' : 'hidden'"
        class="
          flex-col
          mt-8
          space-y-4
          md:flex md:space-y-0 md:mt-0 lg:ml-15 px-3 pl-8
        "
      ><div class="lg:flex md:w-[45vw] justify-center items-center">
        <Link href="/flashcards" class="lg:inline-block md:inline-block md:mx-4 px-4 hover:bg-gray-50">
          <img src="/img/i1.png" class="nav-icon p-2 ml-4" />
                
                <p class="nav-text lg:text-l"><b>FLASH CARDS</b></p></Link>
        <Link href="/pronounciations" class="lg:inline-block md:inline-block md:mx-4 px-4 hover:bg-gray-50">
          <img src="/img/i2.png" class="nav-icon p-2 ml-8"/>
    
        <p class="nav-text lg:text-l"><b>PRONOUNCIATION</b></p></Link>
        <Link href="/quizme" class="lg:inline-block md:inline-block md:mx-4 px-4 hover:bg-gray-50 ">
          <img src="/img/i3.png" class="nav-icon p-2 ml-0.5"/>
    
        <p class="nav-text lg:text-l"><b>QUIZ ME</b></p>
        </Link>
        </div>
        </ul>
      <ul
        :class="showMenu ? 'flex' : 'hidden'"
        class="
          flex-col
          mt-8
          space-y-4
          md:flex md:space-y-0  md:mt-0 justify-end px-2
        "
      ><div v-if="$page.props.auth.user" class="lg:w-[25vw] lg:text-end pl-8 lg:mb-4">
        <Link href="#" class="lg:inline-block mx-10 lg:ml-auto px-4 hover:bg-gray-50">
          
          <img class="logged-icon ml-2 mr-2" src="/img/avatar.png" alt="Your avatar">
    
        <p class="nav-text lg:text-center px-2">{{ $page.props.auth.user.name }}</p>
        </Link>

        <Link :href="route('logout')" method="post" class="lg:inline-block mx-10 lg:ml-auto px-4 hover:bg-gray-50">
          <img src="/img/logout1.jpg" class="nav-icon p-2 sm:jstify-start"/>
    
        <p class="nav-text">Logout</p>
        </Link>
            

      </div>
      <div v-else class="lg:w-[25vw] lg:text-end lg:mr-10 lg:mb-3 space-x-6 mb-6 pl-8 ">
        <Link 
            :href="route('login')" class="lg:inline-block lg:mx-5 lg:ml-auto  py-3 px-8 bg-white nav-text  border border-primary font-bold "> 
            <b>LOGIN</b></Link>
        <Link 
            :href="route('register')" class="lg:inline-block lg:mx-5 lg:ml-auto py-3 px-8 log-button text-white font-bold">
            <b>SIGNUP</b></Link>
      </div>
          </ul>
    </nav>
    <div  
        :class="showMenu ? 'flex' : 'hidden'" @click="toggleNav" class="sidebar fixed inset-0 z-20 transition-opacity bg-black opacity-50 lg:hidden"></div>

<!-- 
<div class="nav flex flex-wrap sticky top-0 ">
    <nav class="flex justify-between bg-white text-white w-screen ">
      <div class="px-5 xl:px-12 py-6 flex items-center">
        <a class="text-3xl font-bold font-heading px-6" href="/">
          <img src="/img/bg.png" class="logo"/>
        </a> 
        <button type="button" class="lg:ml-12 lg:py-6 text-gray-700 border border-gray-700 font-medium rounded-lg text-lg lg:px-8 text-center mb-2 ">
          Branch Out With Spanish</button>

        <div @click="toggleNav" class="flex md:hidden">
          <button
            type="button"
            class="
              text-yellow-800
              hover:text-gray-400
              focus:outline-none focus:text-gray-400 px-4
            "
          >
            <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
              <path
                fill-rule="evenodd"
                d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"
              ></path>
            </svg>
          </button>
        </div>
      </div>
      
      <ul 
        :class="showMenu ? 'flex' : 'hidden'" class=" w-full md:items-center md:w-auto md:flex px-4 mx-auto  space-x-12">
           
          <Link href="/flashcards" class="lg:inline-block md:inline-block md:mx-6 hover:bg-gray-50"><img src="/img/i1.png" class="nav-icon p-2 " />
                
                <p class="nav-text lg:text-xl"><b>FLASH CARDS</b></p></Link>
        <Link href="/pronounciations" class="lg:inline-block md:inline-block md:mx-6 px-4 hover:bg-gray-50"><img src="/img/i2.png" class="nav-icon p-2"/>
    
        <p class="nav-text lg:text-xl"><b>PRONOUNCIATION</b></p></Link>
        <Link href="/quizme" class="lg:inline-block md:inline-block md:mx-6 px-4 hover:bg-gray-50"><img src="/img/i3.png" class="nav-icon p-2"/>
    
        <p class="nav-text lg:text-xl"><b>QUIZ ME</b></p>
        </Link>
        </ul>
        <div  
        :class="showMenu ? 'flex' : 'hidden'" class=" xl:flex items-center space-x-5 items-center mr-3">

          <Link 
            :href="route('login')" class="lg:inline-block lg:mx-10 lg:ml-auto  py-4 px-6 bg-white nav-text  border border-primary font-bold "> 
            Login</Link>
        <Link 
            :href="route('login')" class="lg:inline-block mx-10 lg:ml-auto py-4 px-6  bg-blue-500 text-sm text-white font-bold">
            Register</Link>
          
        </div>

    </nav>
    
</div> -->


</template>
<style scoped>
.logged-icon{
    height: 40px;
    width: 40px;
}
.log-button{
  background: #007FFF;
}
.logo2{
    width: 220px;
    margin-left: 20px;
    height: 60px;
}
.nav-text{
  color: #007FFF;
}
</style>