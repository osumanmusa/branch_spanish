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


<section>
<!-- Page Container -->
<div class="container my-12 mx-auto px-4 md:px-12">
    <div class="flex flex-wrap justify-center mx-1 lg:-mx-4">

        <!-- Column -->
        <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/2">
            <div class="flip-card">
            <div class="flip-card-inner">

            
            <div class="flip-card-front">

            <!-- Article -->
            <article class="overflow-hidden rounded-lg shadow-lg max bg-white border border-yellow-500">


                <header class="flex items-center justify-center leading-tight p-2 md:p-4">
                    
                
                        <div class="px-6 py-4">
                                <h1 class="text-gray-700 text-9xl text-2xl">A
                             </h1>
                        </div>
                
                </header>


            </article>
            <!-- END Article -->
             </div>
            <div class="flip-card-back">

            <!-- Article -->
            <article class="overflow-hidden rounded-lg shadow-lg bg-white border border-yellow-500">


                <header class="flex items-center justify-center leading-tight p-2 md:p-4">
                    
                
                        <div class="px-6 py-4">
                                <h1 class="text-gray-700 text-9xl text-2xl">Aeeh
                             </h1>
                        </div>
                
                </header>


            </article>
            <!-- END Article -->
            </div>
            </div>
            </div>

        </div>
        <!-- END Column -->

    
        <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/6 justify-center items-center">

            <!-- Article -->
            <article class="overflow-hidden rounded-lg bg-yellow-600 text-white border border-yellow-500 hover:bg-white hover:text-yellow-600 text-sm ">
                <header class="flex items-center justify-center  py-2 md:p-2 ">            
                        <div class="px-6 py-4">
                               
                               <Link class="lg:ml-auto lg:mr-3 py-2 px-6 font-bold transition duration-200  ">Hear Me Say It!</Link>

                        </div>
                
                </header>

            </article>
            <!-- END Article -->

            <!-- Article -->
            <article class="overflow-hidden rounded-lg bg-yellow-600 text-white border border-yellow-500 hover:bg-white hover:text-yellow-600 text-sm mt-3">
                <header class="flex items-center justify-center leading-tight py-2 md:p-2">            
                        <div class="px-6 py-4">
                               
                               <Link class="lg:ml-auto lg:mr-3 py-2 px-6 font-bold transition duration-200  ">Let Me Hear You Say It!</Link>

                        </div>
                
                </header>

            </article>
            <!-- END Article -->

        </div>
    </div>
</div>

<div class="flex flex-wrap justify-center ">
    <p class="text-white text-2xl">Bien, gracias. ¿Y usted?</p>
</div>

    
<div class="container my-12 mx-auto px-4 md:px-12">
    <div class="flex flex-wrap justify-center mx-1 lg:-mx-4">
        <div class="flex items-center justify-between">

        <Link class=" lg:ml-auto lg:mr-3 py-2 px-6 bg-yellow-700 text-white hover:bg-white hover:text-blue-500 border border-white hover:text-blue text-sm border border-primary-100 font-bold transition duration-200 ">Previous Card</Link>

        <Link class=" lg:ml-auto lg:mr-3 py-2 px-6 bg-yellow-700 text-white hover:bg-white hover:text-blue-500 border border-white hover:text-blue text-sm border border-primary-100 font-bold transition duration-200 " >Shuffle Deck</Link>
        
        <button class=" lg:ml-auto lg:mr-3 py-2 px-6 bg-yellow-700 text-white hover:bg-white hover:text-blue-500 border border-white hover:text-blue text-sm border border-primary-100 font-bold transition duration-200 " id="flipclick">Flip Card</button>
        
        <Link class=" lg:ml-auto lg:mr-3 py-2 px-6 bg-yellow-700 text-white hover:bg-white hover:text-blue-500 border border-white hover:text-blue text-sm border border-primary-100 font-bold transition duration-200 " >Next Card <i class="fas fa-arrow-right"></i></Link>
            
        </div>

    </div>
</div>
</section>
<section >
<!-- Page Container -->
<div class="container my-12 mx-auto px-4 md:px-12">
    <div class="flex flex-wrap -mx-1 lg:-mx-4">

        <!-- Column -->
        <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/4">

            <!-- Article -->
            <article class="overflow-hidden rounded-lg shadow-lg bg-yellow-600">


                <header class="flex items-center justify-center leading-tight p-2 md:p-4">
                    
                
                        <div class="px-6 py-4">
                                <h1 class="text-gray-800 text-2xl text-9xl">A
                             </h1>
                        </div>
                
                </header>


            </article>
            <!-- END Article -->

        </div>
        <!-- END Column -->

        <!-- Column -->
        <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/4">

            <!-- Article -->
            <article class="overflow-hidden rounded-lg shadow-lg bg-yellow-600">


                <header class="flex items-center justify-center leading-tight p-2 md:p-4">
                    
                
                        <div class="px-6 py-4">
                                <h1 class="text-gray-800 text-2xl text-9xl">B
                             </h1>
                        </div>
                
                </header>


            </article>
            <!-- END Article -->

        </div>
        <!-- END Column -->

        <!-- Column -->
        <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/4">

            <!-- Article -->
            <article class="overflow-hidden rounded-lg shadow-lg bg-yellow-600">


                <header class="flex items-center justify-center leading-tight p-2 md:p-4">
                    
                
                        <div class="px-6 py-4">
                                <h1 class="text-gray-800 text-2xl text-9xl">C
                             </h1>
                        </div>
                
                </header>


            </article>
            <!-- END Article -->
        </div>
        <!-- END Column -->

        <!-- Column -->
        <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/4">

            <!-- Article -->
            <article class="overflow-hidden rounded-lg shadow-lg bg-yellow-600">


                <header class="flex items-center justify-center leading-tight p-2 md:p-4">
                    
                
                        <div class="px-6 py-4">
                                <h1 class="text-gray-800 text-2xl text-9xl">D
                             </h1>
                        </div>
                
                </header>


            </article>
            <!-- END Article -->
        </div>
        <!-- END Column -->

        <!-- Column -->
        <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/4">

            <!-- Article -->
            <article class="overflow-hidden rounded-lg shadow-lg bg-yellow-600">


                <header class="flex items-center justify-center leading-tight p-2 md:p-4">
                    
                
                        <div class="px-6 py-4">
                                <h1 class="text-gray-700 text-2xl text-9xl">A
                             </h1>
                        </div>
                
                </header>


            </article>
            <!-- END Article -->
        </div>
        <!-- END Column -->

        <!-- Column -->
        <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/4">

            <!-- Article -->
            <article class="overflow-hidden rounded-lg shadow-lg bg-yellow-600">


                <header class="flex items-center justify-center leading-tight p-2 md:p-4">
                    
                
                        <div class="px-6 py-4">
                                <h1 class="text-gray-700 text-2xl text-9xl">A
                             </h1>
                        </div>
                
                </header>


            </article>
            <!-- END Article -->
        </div>
        <!-- END Column -->

        <!-- Column -->
        <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/4">

            <!-- Article -->
            <article class="overflow-hidden rounded-lg shadow-lg bg-yellow-600">


                <header class="flex items-center justify-center leading-tight p-2 md:p-4">
                    
                
                        <div class="px-6 py-4">
                                <h1 class="text-gray-700 text-2xl text-9xl">A
                             </h1>
                        </div>
                
                </header>


            </article>
            <!-- END Article -->
        </div>
        <!-- END Column -->

        <!-- Column -->
        <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/4">

            <!-- Article -->
            <article class="overflow-hidden rounded-lg shadow-lg bg-yellow-600">


                <header class="flex items-center justify-center leading-tight p-2 md:p-4">
                    
                
                        <div class="px-6 py-4">
                                <h1 class="text-gray-700 text-2xl text-9xl">A
                             </h1>
                        </div>
                
                </header>


            </article>
            <!-- END Article -->
        </div>
        <!-- END Column -->

    </div>
</div>


</section>

<div class="bg-blue-500">


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
.flip-card {
  background-color: transparent;
    height: 200px;
  perspective: 1000px; /* Remove this if you don't want the 3D effect */
}

/* This container is needed to position the front and back side */
.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.8s;
  transform-style: preserve-3d;
}

/* Do an horizontal flip when you move the mouse over the flip box container */
.flip-card.flipped .flip-card-inner {
  transform: rotateY(180deg);
}

/* Position the front and back side */
.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden; /* Safari */
  backface-visibility: hidden;
}

/* Style the front side (fallback if image is missing) */

/* Style the back side */
.flip-card-back {
  transform: rotateY(180deg);
}
</style>