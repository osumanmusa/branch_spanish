<script setup>
import { Head, Link } from '@inertiajs/vue3';

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

    <nav class="relative sticky top-0 bg-white shadow-md px-4 py-4 flex justify-between items-center ">
        <a class="text-2xl font-bold leading-none" href="/">
            <img src="img/logo.png" class="logo"/>
        </a>
    <div v-if="canLogin" >
    <Link v-if="$page.props.auth.user" :href="route('login')" class="favorite hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-gray-20 hover:bg-gray-200 text-sm text-gray-900 font-bold transition duration-200">
             <p class="text-blue-400">FLASH CARDS</p>
    </Link>
    <Link v-if="$page.props.auth.user" :href="route('login')" class="favorite hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-gray-20 hover:bg-gray-200 text-sm text-gray-900 font-bold transition duration-200">
             <p class="text-blue-400">PRONOUNCIATION</p>
    </Link>
    <Link v-if="$page.props.auth.user" :href="route('login')" class="favorite hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-gray-20 hover:bg-gray-200 text-sm text-gray-900 font-bold transition duration-200">
    
             <p class="text-blue-400">QUIZ ME</p>
    </Link>
    <Link v-if="$page.props.auth.user" :href="route('login')" class="favorite hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-gray-20 hover:bg-gray-200 text-sm text-gray-900 font-bold transition duration-200">
    
             <p class="text-blue-400">CONTESTA</p>
    </Link>
    <Link v-if="$page.props.auth.user"
            :href="route('logout')" method="post" as="button"
            class="logout hidden lg:inline-block py-2 px-6 bg-blue-500 hover:bg-white hover:text-blue-500 hover:border border-primary hover:text-blue text-sm text-white font-boldtransition duration-200"
            >Logout
    </Link>


    <template v-else>
    <Link  href="/flashcards" class="favorite hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-gray-20 hover:bg-gray-200 text-sm text-gray-900 font-bold transition duration-200"><img src="img/i1.png" class="nav-icon p-2" />
                
             <p class="text-blue-400">FLASH CARDS</p>
    </Link>
    <Link  href="/pronounciations" class="favorite hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-gray-20 hover:bg-gray-200 text-sm text-gray-900 font-bold transition duration-200"><img src="img/i2.png" class="nav-icon p-2"/>
    
             <p class="text-blue-400">PRONOUNCIATION</p>
    </Link>
    <Link  href="/quizme" class="favorite hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-gray-20 hover:bg-gray-200 text-sm text-gray-900 font-bold transition duration-200"><img src="img/i3.png" class="nav-icon p-2"/>
    
             <p class="text-blue-400">QUIZ ME</p>
    </Link>
    <Link  href="/contesta" class="favorite hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-gray-20 hover:bg-gray-200 text-sm text-gray-900 font-bold transition duration-200"><img src="img/i4.png" class="nav-icon p-2"/>
    
             <p class="text-blue-400">CONTESTA</p>
    </Link>
    <Link 
        v-if="canLogin"
        :href="route('login')" class="login hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-white text-blue-400 hover:bg-blue-50 text-sm hover:text-white border border-primary font-bold transition duration-200">Log in</Link>

    <Link
        v-if="canRegister"
            :href="route('register')"
            class="register hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6  bg-blue-500 hover:bg-white hover:text-blue-500 hover:border border-primary hover:text-blue text-sm text-white font-bold transition duration-200"
            >Register
    </Link>
    </template>
    </div>  
</nav>




<section class="bg-blue-500">
<!-- Page Container -->
<div class="bg-blue-500 flex flex-wrap  mb-2 pt-6">
    <div class="w-full md:w-8/12 lg:w-12/12 px-8">
            <!-- Header -->
        <h1 class="text-white text-4xl font-bold">
               Flashcards
        </h1>

        <!-- Description -->
        <p class="text-white text-lg font-light">
            We will be learning and practicing Spanish  with flash cards.  We will have lots of fun. 
            In this section there are various  topics with flash cards, select a card and let’s begin
        </p>
    </div>
</div>

<div class="flex items-center justify-center bg-blue-500 py-20">

    <div class="flex flex-col">
        <!-- Notes -->


        <div class="flex flex-col mt-8">
            <!-- Meet the Team -->
            <div class="container max-w-7xl px-4">
              
                <!-- Team Members -->
                <div class="flex flex-wrap">
                    <!-- Member #1 -->
                    <div class="w-full md:w-6/12 lg:w-3/12 mb-6 px-6 sm:px-6 lg:px-4">
                        <div class="flex flex-col">
                            <!-- Avatar -->
                            <a href="#" class="mx-auto">
                                <img class="rounded-2xl drop-shadow-md hover:drop-shadow-xl transition-all duration-200 delay-100"
                                    src="img/card-img-1.png">
                            </a>

                            <!-- Details -->
                            <div class="text-center mt-6">
                                <!-- Name -->
                                <h1 class="text-white text-xl font-bold mb-1">
                                    Tranter Jaskulski
                                </h1>

                               
                            </div>
                        </div>
                    </div>

                    <!-- Member #2 -->
                    <div class="w-full md:w-6/12 lg:w-3/12 mb-6 px-6 sm:px-6 lg:px-4">
                        <div class="flex flex-col">
                            <!-- Avatar -->
                            <a href="#" class="mx-auto">
                                <img class="rounded-2xl drop-shadow-md hover:drop-shadow-xl transition-all duration-200 delay-100"
                                    src="img/card-img-2.png">
                            </a>

                            <!-- Details -->
                            <div class="text-center mt-6">
                                <!-- Name -->
                                <h1 class="text-white text-xl font-bold mb-1">
                                    Denice Jagna
                                </h1>


                          
                            </div>
                        </div>
                    </div>

                    <!-- Member #3 -->
                    <div class="w-full md:w-6/12 lg:w-3/12 mb-6 px-6 sm:px-6 lg:px-4">
                        <div class="flex flex-col">
                            <!-- Avatar -->
                            <a href="#" class="mx-auto">
                                <img class="rounded-2xl drop-shadow-md hover:drop-shadow-xl transition-all duration-200 delay-100"
                                    src="img/card-img-3.png">
                            </a>

                            <!-- Details -->
                            <div class="text-center mt-6">
                                <!-- Name -->
                                <h1 class="text-white text-xl font-bold mb-1">
                                    Kenji Milton
                                </h1>


                              
                            </div>
                        </div>
                    </div>

                    <!-- Member #4 -->
                    <div class="w-full md:w-6/12 lg:w-3/12 mb-6 px-6 sm:px-6 lg:px-4">
                        <div class="flex flex-col">
                            <!-- Avatar -->
                            <a href="#" class="mx-auto">
                                <img class="rounded-2xl drop-shadow-md hover:drop-shadow-xl transition-all duration-200 delay-100"
                                    src="img/card-img-3.png">
                            </a>

                            <!-- Details -->
                            <div class="text-center mt-6">
                                <!-- Name -->
                                <h1 class="text-white text-xl font-bold mb-1">
                                    Kenji Milton
                                </h1>


                              
                            </div>
                        </div>
                    </div>
                    <!-- Member #1 -->
                    <div class="w-full md:w-6/12 lg:w-3/12 mb-6 px-6 sm:px-6 lg:px-4">
                        <div class="flex flex-col">
                            <!-- Avatar -->
                            <a href="#" class="mx-auto">
                                <img class="rounded-2xl drop-shadow-md hover:drop-shadow-xl transition-all duration-200 delay-100"
                                    src="img/card-img-1.png">
                            </a>

                            <!-- Details -->
                            <div class="text-center mt-6">
                                <!-- Name -->
                                <h1 class="text-white text-xl font-bold mb-1">
                                    Tranter Jaskulski
                                </h1>

                               
                            </div>
                        </div>
                    </div>

                    <!-- Member #2 -->
                    <div class="w-full md:w-6/12 lg:w-3/12 mb-6 px-6 sm:px-6 lg:px-4">
                        <div class="flex flex-col">
                            <!-- Avatar -->
                            <a href="#" class="mx-auto">
                                <img class="rounded-2xl drop-shadow-md hover:drop-shadow-xl transition-all duration-200 delay-100"
                                    src="img/card-img-2.png">
                            </a>

                            <!-- Details -->
                            <div class="text-center mt-6">
                                <!-- Name -->
                                <h1 class="text-white text-xl font-bold mb-1">
                                    Denice Jagna
                                </h1>


                          
                            </div>
                        </div>
                    </div>

                    <!-- Member #3 -->
                    <div class="w-full md:w-6/12 lg:w-3/12 mb-6 px-6 sm:px-6 lg:px-4">
                        <div class="flex flex-col">
                            <!-- Avatar -->
                            <a href="#" class="mx-auto">
                                <img class="rounded-2xl drop-shadow-md hover:drop-shadow-xl transition-all duration-200 delay-100"
                                    src="img/card-img-3.png">
                            </a>

                            <!-- Details -->
                            <div class="text-center mt-6">
                                <!-- Name -->
                                <h1 class="text-white text-xl font-bold mb-1">
                                    Kenji Milton
                                </h1>


                              
                            </div>
                        </div>
                    </div>

                    <!-- Member #4 -->
                    <div class="w-full md:w-6/12 lg:w-3/12 mb-6 px-6 sm:px-6 lg:px-4">
                        <div class="flex flex-col">
                            <!-- Avatar -->
                            <a href="#" class="mx-auto">
                                <img class="rounded-2xl drop-shadow-md hover:drop-shadow-xl transition-all duration-200 delay-100"
                                    src="img/card-img-3.png">
                            </a>

                            <!-- Details -->
                            <div class="text-center mt-6">
                                <!-- Name -->
                                <h1 class="text-white text-xl font-bold mb-1">
                                    Kenji Milton
                                </h1>


                              
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
</section>

<div class="bg-blue-500">


                <hr class="hr" />
             <p class="text-white text-center p-4">   Copyright @2013.BranchOutWithSpanish.com</p>
</div>

</template>

<style>
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


left: 94px;
top: 222px;
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
top: 360px;

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
top: 600.8px;

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
top: 620px;

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
top: 450px;

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
top: 250px;

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

font-family: 'Gorditas';
font-style: normal;
font-weight: 400;
font-size: 16px;
/* or 200% */

letter-spacing: 0.07em;

color: rgba(0, 0, 0, 0.83);


}
.section2{
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
