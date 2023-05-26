<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Navbar from'../Components/Navbar.vue';

defineProps({
    categories:Object,
});
</script>

<template>
    <Head title="Landing page" />

<Navbar/>

<section class="bg-blue-500 w-full hero-section">
    <div class="container flex flex-row p-3 mx-auto lg:py-24 lg:flex-row lg:justify-between hero-container">

      <img src="img/hero2.png" class="hero-img ">
    </div>
</section>

<br>
<section class="section2 justify-center ">

<h2 class="heading1">Learning Strategy</h2>

<p class="paragraph1 items-center">Hello, students! Welcome to your Spanish learning site. Here you will find some fun and effective ways to learn Spanish. When learning a foreign language, it is important to study a little everyday. Plan to spend some time each day practicing pronunciation and learning and learning vocabulary, verbs, and phrases. For most students, it is more effective to study in smaller increments (15-20 minutes, 2-3 time a day). Most of all, have fun and never be afraid to make mistakes. Little by little, you will go far. Happy learning!</p>

</section>

<section class="bg-blue-500">
<!-- Page Container -->
<div class="container my-12 px-4 md:px-12">
    <div class="flex flex-wrap -mx-1 lg:-mx-4">

        <div class="flex flex-col mt-16">

            <div class="container max-w-7xl px-4">

                <div class="flex flex-wrap ">
                    <!-- N0 #1 -->
                    <div v-for="c in categories" :key="c.id" class="w-full md:w-6/12 lg:w-4/12 mb-6 px-6 sm:px-6 lg:px-4">
                        <div  class="flex flex-col">
                            <!-- Avatar -->
                            <a href="#" class="mx-auto">
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
<div class="bg-blue-500">
    <div class="flex justify-center p-4">

    <button
            class=" py-2 px-6 mb-5 pb-5 pt-5 bg-yellow-500 hover:bg-white hover:text-blue-500 hover:border border-white hover:text-yellow-700 text-sm text-white font-bold transition duration-200"
            >Explore More
    </button>

    </div>


                <hr class="hr" />
             <p class="text-white text-center p-4">   Copyright @2013.BranchOutWithSpanish.com</p>
</div>
</section>





</template>

<style>
*{
    
font-family: 'Gorditas' !important;
}
nav{
    z-index:30;
}
.hero-section{

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
.nav-icon{
    height: 60px;
    width: 60px;
}

.bg-img{
position: relative;
}
.f1{
position: relative;

font-family: 'Gorditas';
font-style: normal;
font-weight: 400;
font-size: 60px;
/* or 45% */

text-transform: capitalize;
color: rgba(238, 189, 14, 0.8);

transform: rotate(14.8deg);
}
.f2{
position: absolute;


left: 494px;
top: 200px;
text-decoration:none;
text-overflow:hidden;

font-family: 'Gorditas';
font-style: normal;
font-weight: 400;
font-size: 60px;
line-height: 27px;
/* or 45% */

text-transform: capitalize;

color: rgba(235, 69, 95, 0.8);

}
.f3{
    position: absolute;
left: 80.17px;
top: 250px;

font-family: 'Gorditas';
font-style: normal;
font-weight: 400;
font-size: 60px;
line-height: 27px;
/* or 45% */

text-transform: capitalize;

color: rgba(40, 128, 18, 0.8);

transform: rotate(7.5deg);

}
.f4{
    position: absolute;
left: 107.31px;
top: 580.8px;

font-family: 'Gorditas';
font-style: normal;
font-weight: 400;
font-size: 60px;
line-height: 27px;
/* or 45% */

text-transform: capitalize;

color: rgba(0, 255, 246, 0.8);

transform: rotate(-8.9deg);
}
.f5{
    position: absolute;
left: 588px;
top: 550px;

font-family: 'Gorditas';
font-style: normal;
font-weight: 400;
font-size: 60px;
line-height: 122px;
/* or 203% */

text-transform: capitalize;

color: rgba(225, 77, 42, 0.8);
}
.f6{
    position: absolute;
left: 608.23px;
top: 400px;

font-family: 'Gorditas';
font-style: normal;
font-weight: 400;
font-size: 60px;
line-height: 27px;
/* or 45% */

text-transform: capitalize;

color: rgba(255, 255, 255, 0.8);

transform: rotate(2.68deg);
}
.f7{
    position: absolute;
left: 1104.67px;
top: 200px;

font-family: 'Gorditas';
font-style: normal;
font-weight: 400;
font-size: 40px;
line-height: 27px;
/* or 68% */

text-transform: capitalize;

color: rgba(253, 132, 31, 0.8);

transform: rotate(14.74deg);
}

.heading1{
    position: flex;

font-family: 'Gorditas';
font-style: normal;
font-weight: 700;
font-size: 24px;
/* identical to box height, or 112% */

text-transform: uppercase;

color: #000000;
}
.paragraph1{
    position: flex;
top: 10px;
left: 270px;

font-family: 'Gorditas';
font-style: normal;
font-weight: 400;
font-size: 16px;
/* or 200% */

letter-spacing: 0.07em;

color: rgba(0, 0, 0, 0.83);


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
