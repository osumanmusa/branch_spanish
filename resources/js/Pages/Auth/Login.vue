<script setup>
import { Head, Link, useForm} from '@inertiajs/vue3';
import { ref  } from 'vue';
import login from '../../Components/login.vue';
import registercomponent from '../../Components/register.vue';
import resetpassword from'../../Components/resetpassword.vue';

const props=defineProps({
    page: String,
    canResetPassword: Boolean,
    status: String,
    canLogin: Boolean,
    canRegister: Boolean,
    successmessage: Object,
    errormessage: Object,

});

const pages = {
  'login':login,
  'register':registercomponent,
  'resetpassword':resetpassword
}

const currenttab=ref(pages[props.page]);
let showMenu = ref(false);
    const toggleNav = () => (showMenu.value = !showMenu.value);
</script>

<template>
    <Head title="Authentication Page" />


    <nav
      class="sticky top-0
        py-4
        md:flex   bg-white 
      "
    >
      <div class="flex items-center ">
        <a href="/" class="lg:ml-6"
          >
            <img src="/img/bg.png" class="logo"/>
      </a>
      
      <a href="/" class="lg:ml-1 px-4"
          >
            <img src="/img/logo2.jpg" class=" logo2"/>
      </a>
              <!-- <button type="button" class="lg:ml-12 py-6 text-gray-700 border border-gray-700 font-medium rounded-lg text-lg px-8 text-center mb-2 ">
          Branch Out With Spanish</button> -->

        <!-- Mobile menu button -->
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
          md:flex md:space-y-0 md:mt-0 lg:ml-24 
        "
      ><div>
        <Link href="/flashcards" class="lg:inline-block md:inline-block md:mx-6 hover:bg-gray-50"><img src="/img/i1.png" class="nav-icon p-2 " />
                
                <p class="nav-text text-xl"><b>FLASH CARDS</b></p></Link>
        <Link href="/pronounciations" class="lg:inline-block md:inline-block md:mx-6 px-4 hover:bg-gray-50"><img src="/img/i2.png" class="nav-icon p-2"/>
    
        <p class="nav-text text-xl"><b>PRONOUNCIATION</b></p></Link>
        <Link href="/quizme" class="lg:inline-block md:inline-block md:mx-6 px-4 hover:bg-gray-50"><img src="/img/i3.png" class="nav-icon p-2"/>
    
        <p class="nav-text text-xl"><b>QUIZ ME</b></p>
        </Link>
        </div>
        </ul>
      <!-- Mobile Menu open: "block", Menu closed: "hidden" -->

    </nav>
    <!-- <nav
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

      <ul
        :class="showMenu ? 'flex' : 'hidden'"
        class="
          flex-col
          mt-8
          space-y-4
          md:flex md:space-y-0 md:flex-row md:items-center md:space-x-6 md:mt-0 
        "
      >
        <Link href="/flashcards" class="lg:inline-block lg:ml-auto px-6 hover:bg-gray-50"><img src="/img/i1.png" class="nav-icon p-2" />
                
                <p class="nav-text">FLASH CARDS</p></Link>
        <Link href="/pronounciations" class="lg:inline-block lg:ml-auto px-4 hover:bg-gray-50"><img src="/img/i2.png" class="nav-icon p-2"/>
    
        <p class="nav-text">PRONOUNCIATION</p></Link>
        <Link href="/quizme" class="lg:inline-block lg:ml-auto px-4 hover:bg-gray-50"><img src="/img/i3.png" class="nav-icon p-2"/>
    
        <p class="nav-text">QUIZ ME</p>
        </Link>

          </ul>
    </nav> -->


<Transition name="fade" mode="out-in">
    <div v-if="$page.props.flash.successmessage"  class="tostr flex mt-2 items-center w-full max-w-xs p-4 space-x-4 text-green-500 bg-gray-100 divide-x divide-gray-200 rounded-lg shadow dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800" role="alert">
        <svg class="w-7 h-7 text-green-600 " fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <div class="pl-4 text-l font-normal"> {{ $page.props.flash.successmessage }}</div>    
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
        <div class="pl-4 text-l font-normal">{{ $page.props.flash.errormessage }}</div>
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

<!-- component -->
<div class="lg:px-16">
  
<div class='flex items-center mt-16 mx-auto  p-6 '>
  <h1 class="text-white text-6xl lg:px-8" ><b>Create New Account</b></h1>
</div>
<div class='flex items-center  justify-center mt-3 mx-auto  p-6 '>
  <ul  class="mx-auto grid max-w-full w-full lg:grid-cols-6 sm:grid-cols-3 lg:gap-x-4 lg:px-8">
    
  <li class="">
    
    <label @click="currenttab=pages['login']" class="flex justify-center mb-3 cursor-pointer border border-gray-300 py-4 px-4 text-white hover:bg-white hover:text-blue-500 border border-white hover:text-blue text-sm border border-primary-100 font-bold focus:outline-none " for="yes">Login</label>
</li>
<li class="">
    <label  @click="currenttab=pages['register']"  class="flex justify-center mb-3 cursor-pointer py-4 px-4 text-white hover:bg-white hover:text-blue-500 border border-white hover:text-blue text-sm border border-primary-100 font-bold focus:outline-none ">Sign Up</label>
</li>

<li class="">
    <label  @click="currenttab=pages['resetpassword']"  class="flex justify-center cursor-pointer py-4 px-4 text-white hover:bg-white hover:text-blue-500 border border-white hover:text-blue text-sm border border-primary-100 font-bold focus:outline-none  " >Reset Password</label>
</li>
</ul>
</div>
<div class='flex items-center justify-center mt-1'>
<ul class="mx-auto grid max-w-full w-full grid-cols-6 gap-x-4 px-8">



   
<component :is="currenttab"></component>




</ul>



</div>
</div>



</template>
<style >
body{
    background: #007FFF;

    }
   
nav{
    z-index:30;
}
.logo{
    width: 120px;
    margin-left: 20px;
}
.logo2{
    width: 220px;
    margin-left: 20px;
    height: 60px;
}
.nav-icon{
    height: 60px;
    width: 60px;
}

.toast-right{
    float:right;
}  
.tostr{
  
  position:fixed;
  right:1rem;
  top:1rem;
  z-index: 1000;
}
.btn-log{
  background: #F58C28;
}
.nav-text{
  color: #007FFF;
}
</style>

