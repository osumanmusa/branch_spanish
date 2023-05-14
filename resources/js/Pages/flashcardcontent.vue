<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Navbar from'../Components/Navbar.vue';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});
</script>

<template>
    <Head title="Welcome" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

    <Navbar/>
    
<div class="container my-12 mx-auto px-4 md:px-12">
    <div class="flex flex-wrap justify-center mx-1 lg:-mx-4">
        <div class="flex items-center justify-between">

        <Link class=" lg:ml-auto lg:mr-3 py-2 px-6 bg-white text-gray-700 rounded-lg hover:bg-red-700 hover:text-white border border-white hover:text-blue text-sm border border-primary-100 font-bold transition duration-200 " >Level 1</Link>
        
        <Link class=" lg:ml-auto lg:mr-3 py-2 px-6 bg-red-700 rounded-lg text-white hover:bg-white hover:text-blue-500  hover:text-blue text-sm  font-bold transition duration-200 " >Level 2</Link>
        
        <Link class=" lg:ml-auto lg:mr-3 py-2 px-6 bg-red-700 rounded-lg text-white hover:bg-white hover:text-blue-500  hover:text-blue text-sm  font-bold transition duration-200 " >Level 3 </Link>
            
        </div>

    </div>
</div>


<section>
<!-- Page Container -->
<div class="container my-12 mx-auto px-4 md:px-12">
    <div class="flex flex-wrap justify-center mx-1 lg:-mx-4">

        <!-- Column -->
        <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/2 ">

            

            <!-- Article -->
            <article class="overflow-hidden rounded-lg shadow-lg max bg-white border border-yellow-500 flashcontent">


                <header class="flex items-center justify-center leading-tight p-2 md:p-4 flex items-center justify-center h-64 bg-gray-100">
                    
                
                        <div class="px-6 py-4">
                               <h1 class="text-gray-700 text-3xl text-2xl">What Letter Comes After S?
                             </h1>
                        </div>
                
                </header>


            </article>
            <!-- END Article -->

        </div>
        <!-- END Column -->

    
        <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/6 justify-center items-center">

            <!-- Article -->
                        <div class="px-6 py-4 overflow-hidden rounded-lg bg-yellow-600 text-gray-900 border border-yellow-500 hover:bg-white hover:text-yellow-600 text-sm mt-3 px-6 py-4 ">
                               
                               <Link class="lg:ml-auto lg:mr-3 md:p-1 flex items-center justify-center font-bold transition duration-200  text-2xl">H</Link>

                        </div>
            <!-- END Article -->

            <!-- Article -->
                        <div class="overflow-hidden rounded-lg bg-yellow-600 text-gray-900 border border-yellow-500 hover:bg-white hover:text-yellow-600 text-sm mt-3 px-9 py-4 leading-tight">
                               
                               <Link class="lg:ml-auto lg:mr-3 md:p-1 flex items-center justify-center font-bold transition duration-200 text-2xl ">J</Link>

                        </div>
                        <div class="overflow-hidden rounded-lg bg-yellow-600 text-gray-900 border border-yellow-500 hover:bg-white hover:text-yellow-600 text-sm mt-3 px-9 py-4 leading-tight">
                               
                               <Link class="lg:ml-auto lg:mr-3 md:p-1 flex items-center justify-center font-bold transition duration-200  text-2xl">Y</Link>

                        </div>
                        <div class="overflow-hidden rounded-lg bg-yellow-600 text-gray-900 border border-yellow-500 hover:bg-white hover:text-yellow-600 text-sm mt-3 px-9 py-4 leading-tight">
                               
                               <Link class="lg:ml-auto lg:mr-3 md:p-1 flex items-center justify-center font-bold transition duration-200  text-2xl">T</Link>

                        </div>
            <!-- END Article -->

        </div>
    </div>
</div>

<div class="container my-12 mx-auto px-4 md:px-12">
    <div class="flex flex-wrap justify-center mx-1 lg:-mx-4">

        <!-- Column -->
        <div class="my-1 px-1 w-full md:w-2/12 ">
        <Link class=" lg:ml-auto lg:mr-3 py-2 px-6 bg-yellow-700 text-white hover:bg-white hover:text-blue-500 border border-white hover:text-blue text-sm border border-primary-100 font-bold transition duration-200 p-2 md:p-4 flex items-center justify-center " >Next</Link>


        </div>
    </div>

</div>    

</section>
<div class="footer relative sticky bottom-0 bg-blue-500">


                <hr class="hr" />
             <p class="text-white text-center p-4">   Copyright @2013.BranchOutWithSpanish.com</p>
</div>

</template>

<style>
body{
        background-color:  rgb(29 78 236);
    }
*{
    
font-family: 'Gorditas' !important;
}
nav{
    z-index:30;
}
.section1{
    
}
.logo{
    width: 120px;
    margin-left: 20px;
}
.nav-icon{
    height: 60px;
    width: 60px;
}

.bg-img{
position: relative;
}
.flash-cards{

}
.kid-icon{
position: relative;
width: 117.38px;
height: 128.42px;
left: 1197px;
z-index:1;


}

</style>
