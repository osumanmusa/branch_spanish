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
      class="sticky top-0 
        px-4
        py-4
        mx-auto
        md:flex md:justify-between md:items-center bg-white shadow-md
      "
    >
      <div class="flex items-center justify-between">
        <a href="/"
          >
            <img src="/img/logo.png" class="logo"/>
      </a>
        <!-- Mobile menu button -->
        <div @click="toggleNav" class="flex md:hidden">
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

      <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
      <ul
        :class="showMenu ? 'flex' : 'hidden'"
        class="
          flex-col
          mt-8
          space-y-4
          md:flex md:space-y-0 md:flex-row md:items-center md:space-x-6 md:mt-0 
        "
      ><div v-if="$page.props.auth.user">
        <Link href="/flashcards" class="lg:inline-block lg:ml-auto px-6 hover:bg-gray-50"><img src="/img/i1.png" class="nav-icon p-2" />
                
                <p class="text-blue-400">FLASH CARDS</p></Link>
        <Link href="/pronounciations" class="lg:inline-block lg:ml-auto px-4 hover:bg-gray-50"><img src="/img/i2.png" class="nav-icon p-2"/>
    
        <p class="text-blue-400">PRONOUNCIATION</p></Link>
        <Link href="/quizme" class="lg:inline-block lg:ml-auto px-4 hover:bg-gray-50"><img src="/img/i3.png" class="nav-icon p-2"/>
    
        <p class="text-blue-400">QUIZ ME</p>
        </Link>
        <Link href="#" class="lg:inline-block lg:ml-auto px-4 hover:bg-gray-50">
          
          <img class="nav-icon p-2 h-[9vh]" src="/img/avatar.jpg" alt="Your avatar">
    
        <p class="text-blue-400 md:text-center">{{ $page.props.auth.user.name }}</p>
        </Link>


        <Link :href="route('logout')" method="post" class="lg:inline-block lg:ml-auto px-4 hover:bg-gray-50">
          <img src="/img/i3.png" class="nav-icon p-2 sm:jstify-start"/>
    
        <p class="text-blue-400">Logout</p>
        </Link>
            

      </div>
      <li v-else>
        <Link href="/flashcards" class="lg:inline-block lg:ml-auto px-6 hover:bg-gray-50"><img src="/img/i1.png" class="nav-icon p-2" />
                
                <p class="text-blue-400">FLASH CARDS</p></Link>
        <Link href="/pronounciations" class="lg:inline-block lg:ml-auto px-4 hover:bg-gray-50"><img src="/img/i2.png" class="nav-icon p-2"/>
    
        <p class="text-blue-400">PRONOUNCIATION</p></Link>
        <Link href="/quizme" class="lg:inline-block lg:ml-auto px-4 hover:bg-gray-50"><img src="/img/i3.png" class="nav-icon p-2"/>
    
        <p class="text-blue-400">QUIZ ME</p>
        </Link>
        <Link 
            :href="route('login')" class="lg:ml-auto lg:mr-3 py-2 px-6 bg-white text-blue-400 hover:bg-blue-50 text-sm hover:text-white border border-primary font-bold transition duration-200"> 
            Login</Link>
        <Link 
            :href="route('login')" class=" lg:ml-auto lg:mr-3 py-2 px-6  bg-blue-500 hover:bg-white hover:text-blue-500 hover:border border-primary hover:text-blue text-sm text-white font-bold transition duration-200">
            Register</Link>
      </li>
          </ul>
    </nav>
</template>