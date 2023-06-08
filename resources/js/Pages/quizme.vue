<script setup>
import { Head, Link, useForm  } from '@inertiajs/vue3';
import {ref ,onMounted} from 'vue';
import Navbar from'../Components/Navbar.vue';

const props = defineProps({
    quizes:Array,
});
const currentQNo = ref(0);
const checkedanswer = ref([])
const next = ()=>{
    let no = currentQNo.value
    if(props.quizes.length - 1 < no+1 ){
    //    window.alert(props.quizes.length + ' ' + no+1)
        return
    }
    currentQNo.value = currentQNo.value + 1
     //window.alert('nxt')
}
const prev = ()=>{
    
    if( currentQNo.value  < 1 ){
     //   window.alert(props.quizes.length + ' ' + no+1)
        return
    }
    currentQNo.value = currentQNo.value - 1
   // window.alert('nxt')
}

const form = useForm({
    checkedanswer:[],
});

const submit = () => {
    form.post(route('quiz.store',props.quizes[0].category_id));
};
</script>

<template>
    <Head title="Quiz" />
    <Navbar/>
   
<div class="container my-6 mx-auto px-4 md:px-12">
    <div class="flex flex-wrap justify-center mx-1 lg:-mx-4">
        <div class="flex items-center justify-between">

        <button @click="currentQNo = i" v-for="(q,i) in quizes" :key="i" class=" lg:ml-auto lg:mr-3 py-2 px-6 rounded-lg hover:bg-red-700 hover:text-white border border-white hover:text-blue text-sm border border-primary-100 font-bold transition duration-200 " 
        :class="{
            'bg-white': currentQNo == i,
            
          }" >
         
        
        {{ i + 1 }}</button>
        
        </div>

    </div>
</div>


<section v-if="$props.quizes.length>0">
<!-- Page Container -->
<div class="container my-6 mx-auto px-4 md:px-12">
<form  @submit.prevent="submit">
    <div v-for="(quizes , i) in quizes" :key="i" v-show="currentQNo == i" class="flex flex-wrap justify-center mx-1 lg:-mx-4">

     
        <!-- Column -->
        <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/2 ">

            

            <!-- Article -->
            <article class="overflow-hidden rounded-lg shadow-lg max bg-white border border-yellow-500 flashcontent">


                <header class="flex items-center justify-center leading-tight p-2 md:p-4 flex items-center justify-center h-[50vh] bg-gray-100">
                    
                
                        <div class="px-6 py-4">
                               <h1 class="text-gray-700 text-3xl text-2xl">{{ quizes.question }}
                             </h1>
                        </div>
                
                </header>


            </article>
            <!-- END Article -->

        </div>

        <!-- END Column -->

    
        <div class="my-4 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/6 justify-center items-center ">

            <!-- Article -->
                        <div class="answers mt-4">
                                <label type="button">
                                    <input type="radio" :name="'option'+quizes.id" id="quiz1" @input=" form.checkedanswer[i] = {chossenAnswer:$event.target.value, questionId : quizes.id}" v-bind:value="quizes.answer_1" >
                                    <!-- <input type="hidden" :value="quizes.id" v-model="form.chosenanswer.quizes.id"/> -->
                                    <span class="px-16 py-2 overflow-hidden rounded-lg w-[13vw] h-[8vh] text-center" @click="next">{{ quizes.answer_1 }}</span> 
                                </label>
                        </div>
                        <div class="answers mt-4">
                                <label type="button">
                                    <input type="radio" :name="'option'+quizes.id" id="quiz2" @input=" form.checkedanswer[i] = {chossenAnswer:$event.target.value, questionId : quizes.id}" v-bind:value="quizes.answer_2" >
                                    <span class="px-16 py-2 overflow-hidden rounded-lg w-[13vw] h-[8vh] justify-center text-center"  @click="next">{{ quizes.answer_2 }}</span> 
                                </label>
                        </div>
                        <div class="answers mt-4">
                                <label type="button">
                                    <input type="radio" :name="'option'+quizes.id" id="quiz3" @input=" form.checkedanswer[i] = {chossenAnswer:$event.target.value, questionId : quizes.id}" v-bind:value="quizes.answer_3" >
                                    <span class="px-16 py-2 overflow-hidden rounded-lg w-[13vw] h-[8vh] text-center"  @click="next">{{ quizes.answer_3 }}</span> 
                                </label>
                        </div>
                        <div class="answers mt-4">
                                <label type="button">
                                    <input type="radio" :name="'option'+quizes.id" id="quiz4" @input=" form.checkedanswer[i] = {chossenAnswer:$event.target.value, questionId : quizes.id}" v-bind:value="quizes.answer_4" >
                                    <span class="px-16 py-2 overflow-hidden rounded-lg w-[13vw] h-[8vh] text-center"  @click="next">{{ quizes.answer_4 }}</span> 
                                </label>
                        </div>
            <!-- END Article -->

        </div>
   


    
    </div>
    <!-- <div class="container my-12 mx-auto px-4 md:px-12">
        <div class="flex flex-wrap mx-1 button_center lg:-mx-4">
            <div class="my-1 px-1 w-full md:w-2/12 ">
                <label v-if = " currentQNo > 0" @click = "prev" class=" lg:ml-auto lg:mr-3 py-2 px-6 bg-btn-color text-white hover:bg-white hover:text-blue-500 border border-white hover:text-blue text-sm border border-primary-100 font-bold transition duration-200 p-2 md:p-4 flex items-center justify-center " >
                Prev
                </label>
                <label v-if = "quizes.length-1 > currentQNo" @click = "next" class=" lg:ml-auto lg:mr-3 py-2 px-6 bg-btn-color text-white hover:bg-white hover:text-blue-500 border border-white hover:text-blue text-sm border border-primary-100 font-bold transition duration-200 p-2 md:p-4 flex items-center justify-center " >
                Next
                </label>
                <Button v-else class=" lg:ml-auto lg:mr-3 py-2 px-6 bg-btn-color text-white hover:bg-white hover:text-blue-500 border border-white hover:text-blue text-sm border border-primary-100 font-bold transition duration-200 p-2 md:p-4 flex items-center justify-center " >
                Submit
                </Button>
            </div>
        </div>

    </div>   -->
    <div class="flex flex-wrap justify-center mx-1 lg:my-12">
        <div class="flex items-center justify-between" >
                <label v-if = " currentQNo > 0" @click = "prev" class=" w-[10vw] lg:ml-auto lg:mr-3 py-2 bg-btn-color text-white hover:bg-white hover:text-blue-500 border border-white hover:text-blue text-sm border border-primary-100 font-bold transition duration-200 p-2 md:p-4 flex items-center justify-center " >
                Prev
                </label>
                <label v-if = "quizes.length-1 > currentQNo" @click = "next" class=" w-[10vw] lg:ml-auto lg:mr-3 py-2 px-6 bg-btn-color text-white hover:bg-white hover:text-blue-500 border border-white hover:text-blue text-sm border border-primary-100 font-bold transition duration-200 p-2 md:p-4 flex items-center justify-center " >
                Next
                </label>
                <Button v-else class="w-[10vw] lg:ml-auto lg:mr-3 py-2 px-6 bg-btn-color text-white hover:bg-white hover:text-blue-500 border border-white hover:text-blue text-sm border border-primary-100 font-bold transition duration-200 p-2 md:p-4 flex items-center justify-center " >
                Submit
                </Button>


        </div>
        
    </div>
</form>

</div>

  
<div class="">


<hr class="hr" />
<p class="text-white text-center p-4">   Copyright @2013.BranchOutWithSpanish.com</p>
</div>
</section>
<section v-else>

    <div class="container my-12 mx-auto px-4 md:px-12">
    <div class="flex flex-wrap justify-center mx-1 lg:-mx-4">

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
.button_center{
    padding-left: 32vw;
    
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
.bg-btn-color{
    background: #F58C28;
 
}

.kid-icon{
position: relative;
width: 117.38px;
height: 128.42px;
left: 1197px;
z-index:1;


}
.answers input[type="radio"]:checked + span {
  background:rgb(7, 122, 7);
  color: whitesmoke;
}
.answers span {
  display: inline-block;
  padding: 10px;
  text-transform: uppercase;
  border: 2px solid white;
  border-radius: 3px;
  color: black;
  background:  #F58C28;
}
.answers input[type="radio"] {
  display: none;
}

</style>
