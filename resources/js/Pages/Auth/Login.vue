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

});

const pages = {
  'login':login,
  'register':registercomponent,
  'resetpassword':resetpassword
}

const currenttab=ref(pages[props.page]);

</script>

<template>
    <Head title="Authentication Page" />


    <nav class="relative sticky top-0 bg-white shadow-md px-4 py-4 flex justify-between items-center ">
        <a class="text-2xl font-bold leading-none" href="/">
            <img src="img/logo.png" class="logo"/>
        </a>
    <div >


   
    <Link  href="/flashcards" class="favorite hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-gray-20 hover:bg-gray-200 text-sm text-gray-900 font-bold transition duration-200"><img src="img/i1.png" class="nav-icon p-2" />
                
             <p class="text-blue-400">FLASH CARDS</p>
    </Link>
    <Link  href="/pronounciations" class="favorite hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-gray-20 hover:bg-gray-200 text-sm text-gray-900 font-bold transition duration-200"><img src="img/i2.png" class="nav-icon p-2"/>
    
             <p class="text-blue-400">PRONOUNCIATION</p>
    </Link>
    <Link  href="/quizme" class="favorite hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-gray-20 hover:bg-gray-200 text-sm text-gray-900 font-bold transition duration-200"><img src="img/i3.png" class="nav-icon p-2"/>
    
             <p class="text-blue-400">QUIZ ME</p>
    </Link>



    </div>  
</nav>

<div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
</div>

<!-- component -->
<div class="lg:px-16">
<div class='flex items-center  justify-center mt-16 mx-auto  p-6 '>
  <ul  class="mx-auto grid max-w-full w-full grid-cols-6 lg:gap-x-4 lg:px-8">
  <li class="">
    
    <label @click="currenttab=pages['login']" class="flex justify-center cursor-pointer border border-gray-300 py-2 px-4 text-white hover:bg-white hover:text-blue-500 border border-white hover:text-blue text-sm border border-primary-100 font-bold focus:outline-none " for="yes">Login</label>
</li>
<li class="">
    <label  @click="currenttab=pages['register']"  class="flex justify-center cursor-pointer py-2 px-4 text-white hover:bg-white hover:text-blue-500 border border-white hover:text-blue text-sm border border-primary-100 font-bold focus:outline-none ">Register</label>
</li>

<li class="">
    <label  @click="currenttab=pages['resetpassword']"  class="flex justify-center cursor-pointer py-2 px-4 text-white hover:bg-white hover:text-blue-500 border border-white hover:text-blue text-sm border border-primary-100 font-bold focus:outline-none  " >Reset Password</label>
</li>
</ul>
</div>
<div class='flex items-center justify-center mt-6'>
<ul class="mx-auto grid max-w-full w-full grid-cols-6 gap-x-4 px-8">



   
<component :is="currenttab"></component>




</ul>



</div>
</div>



</template>
<style >
body{
    background-color:  rgb(29 78 236);

    }
    
*{
    
font-family: 'Gorditas' !important;
}
nav{
    z-index:30;
}
.logo{
    width: 120px;
    margin-left: 20px;
}
.nav-icon{
    height: 60px;
    width: 60px;
}



</style>
