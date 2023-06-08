<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
import Navbar from'../Components/Navbar.vue';
import paginate from "../Components/paginate.vue";
import { shuffle as _shuffle } from 'lodash-es';

const props=defineProps({
    flashcards: Object,
    flashcard: Object,
    next:Array,
    links:Array,

});
const flashcards = ref([]);
const cardKey = ref();
if(props.flashcard.data.length>0){
 cardKey.value =props.flashcard.data[0].flashcard_frontcontent;

}
function Shuffle() {
     flashcards.value = _shuffle(props.flashcards);
        }
onMounted(() =>{
    Shuffle()
    cardKey
    handelFlip()
    
})

const hasFipped = ref(false)
const handelFlip = () =>{
    if(!hasFipped.value){
        cardKey.value = props.flashcard.data[0].flashcard_frontcontent
    }
    else{
         cardKey.value = props.flashcard.data[0].flashcard_backcontent
    }
    hasFipped.value = !hasFipped.value

    //window.alert(cardKey.value + hasFipped.value);
}




</script>

<template>
    <Head title="Welcome" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<Navbar/>



<section  class="bg-color" v-if="cardKey" >
<!-- Page Container -->


<div class="container my-12 mx-auto px-4 md:px-12">
    <div class="flex flex-wrap justify-center mx-1 lg:-mx-4">
        <div class="w-full md:w-8/12 lg:w-12/12 lg:px-16">
            <!-- Header -->
        <h1    class="lg:px-16 text-white text-4xl font-bold">
            {{ flashcard.category_name}}
              
        </h1>
        </div>


        <!-- Column -->
  
        
        <div  class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/2">
            <div class="flip-card ">
                <div class="flip-card-inner ">

                    <transition name = "flip" mode = "out-in">
                    <div   :key="cardKey" class="flip-card-front ">

                            <!-- Article -->
                         <article class="overflow-hidden rounded-lg bg-white border border-yellow-500 box">


                            <header class="flex items-center justify-center leading-tight p-2 md:p-4 h-[50vh]">
                    
                
                                <div class="px-6 py-4">
                                        <h1 class="text-gray-700 text-7xl text-2xl">{{cardKey}}
                                    </h1>
                                </div>
                
                            </header>


                            </article>
                                 <!-- END Article -->
                    </div>
                </transition>
                </div>
            </div>
            <div class="flex flex-wrap justify-center my-4">
                <p class="text-white text-2xl">{{ flashcard.data[0].flashcard }}</p>
            </div>
        <div class="flex flex-wrap justify-center mx-1 lg:-mx-4 lg:my-12">
        <div class="flex items-center justify-between" >
        <Link v-if="flashcard.prev_page_url != NULL " :href=" flashcard.prev_page_url "  Class="lg:ml-auto mx-1 lg:mr-3 py-4 px-6 bg-btn-color font-bold rounded text-gray-900 hover:bg-white hover:text-blue-500  hover:text-blue text-sm border border-primary-100 font-bold transition duration-200 ">
            <svg class="w-6 h-5 inline" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 9l-3 3m0 0l3 3m-3-3h7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            Previous Card
        </Link>
        <Button @click="Shuffle" class=" lg:ml-auto mx-1 lg:mr-3 py-4 bg-btn-color px-6 font-bold rounded text-gray-900  hover:bg-white hover:text-blue-500  hover:text-blue text-sm border border-primary-100 font-bold transition duration-200 " >
            <svg class="w-6 h-5 inline-block" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                 <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 00-3.7-3.7 48.678 48.678 0 00-7.324 0 4.006 4.006 0 00-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3l-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 003.7 3.7 48.656 48.656 0 007.324 0 4.006 4.006 0 003.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3l-3 3"></path>
            </svg>
            Shuffle Deck</Button>
        
        <button  @click="handelFlip" class=" lg:ml-auto mx-1 lg:mr-3 py-4 px-6 bg-btn-color font-bold rounded text-gray-900  hover:bg-white hover:text-blue-500  hover:text-blue text-sm border border-primary-100 font-bold transition duration-200 " >
            <svg class="inline-block w-6 h-5" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <rect width="24" height="24" fill="url(#pattern0)"/>
                <defs>
                <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                <use xlink:href="#image0_1600_755" transform="scale(0.0208333)"/>
                </pattern>
                <image id="image0_1600_755" width="48" height="48" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAAClElEQVR4nO2Zy2sUQRCHvzWRqCTiA01UiJI/wJMbxUUkf0JERBTxlJOID9TgIQRBE/EBinqQEHITNCLBk3g0xrMa0YOgiApG0YOIuz5HGmphGLp3Znd6etMyH/Rl6Oqp30x1dXc15OTkxPEC6I/pUwA2ASeBm8AzYA6oAD+BL/LstvTZDCzAEYE4oRPRBZwG3kq/epqyGQHWuRAQFbEMuCRfOEjZKsA1YEXWAqoizkp4BJbbJ2BX1gJctKtAazME/AbuAUeBksT2YmAhsBrYAhwDpqVvrbHuiq0TAd+BUWBtHWMqQeeAcoyIVhcCDqQYuxu4U2PsKy4EmFJsUgrAEPDXMP7OrAXYEKHYYxDxEVhOCp4kFPGc9AxlGUouKBjmRKXOJNFUug3Z6QwecV4j4B3Qgid0An80InrxiIcaAYN4xHGNgEk8YqtGwFM8otOw5Y5lJmKkYrEZtBnWg1imI0YP8EyA9yE0XyilmcSrgN3AOPAY6MM9gxoBt5IYFmV7HDYcwD2PNAJOJDHska3xfVlMNuKeLsNWQhXPvOCixvk3jVbzirIWvAKWkD0bDAUzVQGsi6XAROhXvnYgoABMaZwvN3KgGQgZqxpmO9kzbDhSXm5ksA7goEzqcD1nDNiOffYaDvVzaQ/1YednZdDr2A2b4RpllR02XrIy5PysiKn+pTShtd4Q89WmKuBW2K9xvl1S21fJENXnSfP8hZjy/JTNM/AiYF+khj8SeeEvKe4eBraFirttsjEryUo6Y1ikgojz1oq7OnosXW4EhoyTefXhUAaOf7A1YZPQITH8zYLjZfnq6trKOWringJeNuC4SgBq8q9hnqB2ikeAG5Kt3svlxw/gsxSJJ2WfX3R5zZqT8z/zD/OT4D1mMbH4AAAAAElFTkSuQmCC"/>
                </defs>
            </svg>
            Flip Card</button>
      
        <Link v-if="flashcard.next_page_url != NULL " v-bind:href=" flashcard.next_page_url " class=" lg:ml-auto mx-1 lg:mr-3 py-2 py-4 px-6 bg-btn-color font-bold rounded text-gray-900  hover:bg-white hover:text-blue-500  hover:text-blue text-sm border border-primary-100 font-bold transition duration-200 " >
           
            Next Card 
            <svg class="w-6 h-5 inline" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 15l3-3m0 0l-3-3m3 3h-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
        </Link>

        </div>
        
         </div>
        </div>


 
    </div>
</div>



<section >
<!-- Page Container -->
<div class="container my-10 mx-auto px-4 md:px-12">
    <div class="flex flex-wrap -mx-1 lg:-mx-4">
    <TransitionGroup name="shuffle" >
        <!-- Column -->
        <div v-for="f in flashcards" :key="f.id"   class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/4">
 
            <!-- Article -->
            <article class="overflow-hidden rounded-lg shadow-lg bg-btn-color">


                <header class="flex items-center justify-center leading-tight p-2 md:p-4">
                    
                
                        <div class="px-6 py-4">
                                <h1 class="text-black text-2xl uppercase text-6xl text-center px-1">{{f.flashcard_title}}
                             </h1>
                        </div>
                
                </header>


            </article>
            <!-- END Article -->

        </div>
        <!-- END Column -->  

  </TransitionGroup>      





    </div>
</div>


</section>

<div class="">


        <hr class="hr" />
        <div class="flex flex-col inline-block">
            <span class="inline-block text-white text-center p-4">   Copyright @2013 <a href="https://branchoutwithspanish.com/">BranchOutWithSpanish.com</a>

                <span class="inline-block justify-end text-white  p-4 admin-log"> 
                    <Link href="/admin/login" class="py-4 px-8 bg-yellow-500 hover:bg-white hover:text-blue-500 hover:border border-white">Admin Login</Link>

                </span>
            </span>
            
        </div>
</div>

</section>
<section v-else class="">
    <div class="container my-12 mx-auto px-4 md:px-12">
    <div class="flex flex-wrap justify-center mx-1 lg:-mx-4">
{{ flashcard.data }}
        <!-- Column -->
  
        
        <div  class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/2">
            <div class="flip-card ">
                <div class="flip-card-inner ">

              
                    <div    class="flip-card-front ">

                            <!-- Article -->
                         <article class="overflow-hidden rounded-lg bg-white border border-yellow-500 box">


                            <header class="flex items-center justify-center leading-tight p-2 md:p-4 h-[50vh]">
                    
                
                                <div class="px-6 py-4">
                                        <h1 class="text-red-700 text-xl">No Data Available
                                    </h1>
                                </div>
                
                            </header>


                            </article>
                                 <!-- END Article -->
                    </div>
  
                </div>
            </div>

        </div>


 
    </div>
</div>

</section>
</template>

<style>
body{
        background-color:  rgb(59 130 246);
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

.bg-img{
position: relative;
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
  perspective: 1000px; /* Remove this if you don't want the 3D effect */
}
.box{
 border: 10px solid rgba(255, 166, 0, 0.925);
}

/* This container is needed to position the front and back side */
.flip-card-inner {
  position: relative;
  width: 100%;
  text-align: center;
  transition: transform 0.8s;
  transform-style: preserve-3d;
}
.bg-btn-color{
    background: #F58C28;
 
}/* 1. declare transition */
.shuffle-move,
.shuffle-enter-active,
.shuffle-leave-active {
  transition: all 0.5s cubic-bezier(0.55, 0, 0.1, 1);
}

/* 2. declare enter from and leave to state */
.shuffle-enter-from,
.shuffle-leave-to {
  opacity: 0;
  transform: scaleY(0.01) translate(30px, 0);
}

/* 3. ensure leaving items are taken out of layout flow so that moving
      animations can be calculated correctly. */
.shuffle-leave-active {
  position: absolute;
}
/* 1. declare transition */
.flip-enter-active {
  animation: flip-in 0.5s;
}
.flip-leave-active {
  animation: flip-in 0.5s reverse;
}
@keyframes flip-in {
  0% {
    transform: scaleX(0);
  }
  50% {
    transform: scaleX(1);
  }
  100% {
    transform: scaleX(1);
  }
}
</style>
