<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Navbar from'../Components/Navbar.vue';

defineProps({
    categories:Object,
});
</script>

<template>
    <Head title="Home" />

<Navbar/>

<section class="bg-color w-full hero-section">
    <div class="flex   ">

      <img src="img/hero.png" class="hero-img container-fluid">
    </div>
</section>


<div class="lg:mr-0 lg:ml-0 sm:mx-6 justify-center bg-white">
    <br>

<h2 class="my-4 text-4xl px-4 lg:ml-48 lg:mr-48 "><b>Learning Strategy</b></h2>

<p class="items-center lg:tracking-wider text-justify px-4 text-3xl lg:ml-48 lg:mr-48 mb-6">Hello, students! Welcome to your Spanish learning site. Here you will find some fun and effective ways to learn Spanish. When learning a foreign language, it is important to study a little everyday. Plan to spend some time each day practicing pronunciation and learning and learning vocabulary, verbs, and phrases. For most students, it is more effective to study in smaller increments (15-20 minutes, 2-3 time a day). Most of all, have fun and never be afraid to make mistakes. Little by little, you will go far. Happy learning!</p>
<br>
</div>

<section class="bg-color">
<!-- Page Container -->
<div class="container my-12 mx-auto px-1">
    <br>
    <h2 class="my-4 text-4xl px-4 justify-center text-center text-gray-50">Start Learning Spanish With Our Flashcards</h2>
    <div class="flex flex-wrap -mx-1 lg:-mx-4">

        <div class="flex flex-col mt-16">

            <div class="container  px-4">

                <div class="flex flex-wrap ">
                    <!-- N0 #1 -->
                    <div v-for="c in categories" :key="c.id" class="w-full md:w-6/12 lg:w-4/12 mb-6 px-6 sm:px-6 lg:px-4">
                        <div  class="flex flex-col">
                            <!-- Avatar -->
                            <a v-bind:href="route('card.show', c.id)"  class="mx-auto">
                                <img class="rounded-2xl h-[35vh] drop-shadow-md hover:drop-shadow-xl transition-all duration-200 delay-100"
                                     :src="'/img/category/'+ c.category_image" >
                            </a>

                            <!-- Details -->
                            <div class="text-center mt-6">
                                <!-- Name -->
                                <h1 class="text-white text-xl font-bold mb-1">
                                    {{ c.category_name }}
                                </h1>

                               
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>
<div class="bg-color">
    <div class="flex justify-center p-4">

    <Link
            class=" py-2 px-6 mb-5 pb-5 pt-5 bg-yellow-500 hover:bg-white hover:text-blue-500 hover:border border-white hover:text-yellow-700 text-sm text-white font-bold transition duration-200" href="/flashcards"
            >Explore More
    </Link>

    </div>


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





</template>

<style>
*{
    font-famiy:'Lato';
}
body{
    background-color: white;
    
}.bg-color{
    background: #007FFF;
}

.nav{
    z-index:30;
    overflow: hidden;
    overflow-x:inherit;
}

.hero-container{
    display: inline-flex;
    background-size: cover;
}
.hero-img{
    width: 100%;
}
.hero{
    width: 100%;
}
.section2{
    line-height: 2;
    padding:70px 190px;
    
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
.admin-log{
    float:right;
}
</style>
