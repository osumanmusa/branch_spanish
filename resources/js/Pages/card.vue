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
const cardKey = ref(props.flashcard.data[0].flashcard_frontcontent);

function Shuffle() {
     flashcards.value = _shuffle(props.flashcards);
        }
onMounted(() =>{
    Shuffle()
    cardKey
    
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



<section   >
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
                                        <h1 class="text-gray-700 text-9xl text-2xl">{{cardKey}}
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
        <div class="flex items-center justify-between" :key="flashcard.links[0].id">
        <Link v-if="flashcard.prev_page_url != NULL " :href=" flashcard.prev_page_url "  Class="lg:ml-auto mx-1 lg:mr-3 py-4 px-6 bg-btn-color font-bold rounded text-gray-900 hover:bg-white hover:text-blue-500  hover:text-blue text-sm border border-primary-100 font-bold transition duration-200 ">
            Previous Card
        </Link>
        <Button @click="Shuffle" class=" lg:ml-auto mx-1 lg:mr-3 py-4 bg-btn-color px-6 font-bold rounded text-gray-900  hover:bg-white hover:text-blue-500  hover:text-blue text-sm border border-primary-100 font-bold transition duration-200 " >
        Shuffle Deck</Button>
        
        <button  @click="handelFlip" class=" lg:ml-auto mx-1 lg:mr-3 py-4 px-6 bg-btn-color font-bold rounded text-gray-900  hover:bg-white hover:text-blue-500  hover:text-blue text-sm border border-primary-100 font-bold transition duration-200 " >Flip Card</button>
      
        <Link v-if="flashcard.next_page_url != NULL " v-bind:href=" flashcard.next_page_url " class=" lg:ml-auto mx-1 lg:mr-3 py-2 py-4 px-6 bg-btn-color font-bold rounded text-gray-900  hover:bg-white hover:text-blue-500  hover:text-blue text-sm border border-primary-100 font-bold transition duration-200 " >
            Next Card 
            <i class="fa fa-arrow-right fa-bold"></i>
        </Link>

        </div>
        
         </div>
        </div>


 
    </div>
</div>


</section>
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
                                <h1 class="text-black text-2xl uppercase text-9xl">{{f.flashcard_title}}
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
