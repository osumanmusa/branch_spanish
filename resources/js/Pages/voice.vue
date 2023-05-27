<script setup>
import { Head, Link, useForm  } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
import Navbar from'../Components/Navbar.vue';
import { shuffle as _shuffle } from 'lodash-es';
import { Modal } from 'flowbite';
const props=defineProps({
    flashcards: Object,
    flashcard: Object,

});
onMounted(() => {
    const $buttonElement = document.querySelector('#modalbtn');
    const $modalElement = document.querySelector('#modal');
    const $closeButton = document.querySelector('#closeButton');

    const modalOptions = {
        backdropClasses: 'bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40'
    }

    if ($modalElement) {
        const modal = new Modal($modalElement, modalOptions);
        $buttonElement.addEventListener('click', () => modal.toggle());
        $closeButton.addEventListener('click', () => modal.hide());
        
        // programmatically show
        // modal.show();
    }
})
const flashcards = ref([]);
const blobFile=ref(); 
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

function playSound (sound) {
      if(sound) {
        var audio = new Audio(sound);
        audio.play();
      }
    }

    let audiofile = null;

function startRecording() {
        navigator.mediaDevices.getUserMedia({ audio: true })
          .then(function(stream) {
            const mediaRecorder = new MediaRecorder(stream);
            const chunks = [];

            mediaRecorder.start();

            mediaRecorder.addEventListener('dataavailable', function(e) {
              chunks.push(e.data);
            });
            mediaRecorder.addEventListener('stop', function() {
              const audioBlob = new Blob(chunks, { type: 'audio/mp3' });
              const audioUrl = URL.createObjectURL(audioBlob);
              audiofile = new FormData();
    audiofile.append('audio', audioBlob);
    audiofile.append('voiceid', props.flashcard.data[0].id);
            //   blobFile.value = audioBlob;
        //      var formData = new FormData();
        //  formData.append('audio',audioBlob);
        // formData.append('voiceid',props.flashcard.data[0].id);
           
        //     // blobFile.value = formData;
        //         audiofile = formData;
            
              const audio = document.createElement('audio');
              audio.type='file';
              audio.controls = true;
              audio.id='recordedaudio';
              audio.src = audioUrl;
              audio.value= audioUrl;
              var wrap = document.getElementById("audioPlayer");
              
              wrap.appendChild(audio);
              
            });

            // Stop recording after 10 seconds
            setTimeout(function() {
              mediaRecorder.stop();

            }, 5000);
          })
          .catch(function(err) {
            console.log('The following error occurred: ' + err);
          });
      }

      
const submit = () => {
    
	const csrf_token =  document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch('/storevoice', {
    method: 'POST', 
    headers: {
		'X-CSRFToken': csrf_token,
        // 'Content-Type': 'application/json',
        'url': '/storevoice',
        // 'Content-Type': undefined,
        // 'Accept': 'application/json',
        'Authorization': 
        "Bearer ",
        'Access-Control-Allow-Methods': 'POST',
        'Access-Control-Allow-Headers': 'origin,X-Requested-With,content-type,accept',
        'Access-Control-Allow-Credentials': 'true' 
    },
    
    body:audiofile
})
};


// const form = useForm({
//     bolbFile: audiofile.value,

// });
// const submit = () => {
//     form.post(route('voice.store',props.flashcard.data[0].id));
// };

</script>

<template>
    <Head title="Welcome" />

<Navbar/>



<section   >
<!-- Page Container -->

<div class="container my-12 mx-auto px-4 md:px-12">
    {{ bolbFile }} <button @click = "handels()">click</button>
    <div class="flex flex-wrap justify-center mx-1 lg:-mx-4">


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
                <p class="text-white text-2xl">Bien, gracias. ¿Y usted?</p>
            </div>


        </div>
        <!-- END Column -->
<div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/6 lg:space- justify-center items-center ">

<!-- Article -->
<article class="overflow-hidden rounded-lg bg-btn-color text-white border border-yellow-500 hover:bg-white hover:text-yellow-600 text-sm ">
    <header class="flex items-center justify-center  py-2 md:p-2 ">            
            <div class="px-2 py-2">
       
                <Button @click.prevent="playSound('/audio/'+ flashcard.data[0].pronounciation_voice)" class="lg:ml-auto lg:mr-3 text-gray-900  font-bold transition duration-200  ">
                    Hear Me Say It!
                    <svg fill="none" height="20" stroke="black" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 010 12.728M16.463 8.288a5.25 5.25 0 010 7.424M6.75 8.25l4.72-4.72a.75.75 0 011.28.53v15.88a.75.75 0 01-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.01 9.01 0 012.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75z"></path>
                    </svg>
                </Button>

            </div>

    </header>

</article>
<!-- END Article -->

<!-- Article -->
<article class="overflow-hidden rounded-lg bg-btn-color text-white border border-yellow-500 hover:bg-white hover:text-yellow-600 text-sm mt-3">
    <header class="flex items-center justify-center leading-tight py-2 md:p-2">            
            <div class="px-2 py-2">
       
                <Button id="modalbtn" type="button" class="lg:ml-auto lg:mr-3 text-gray-900 font-bold transition duration-200  ">
                    Let Me Hear You Say It!
                    <svg fill="none" height="20" stroke="black" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 18.75a6 6 0 006-6v-1.5m-6 7.5a6 6 0 01-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 01-3-3V4.5a3 3 0 116 0v8.25a3 3 0 01-3 3z"></path>
                    </svg>
                </Button>

            </div>

    </header>

</article>
<!-- END Article -->

</div>

</div>
</div>


<div class="flex flex-wrap justify-center mx-1 my-12">
            <div class="flex items-center justify-between" >
                <Link v-if="flashcard.prev_page_url != NULL " :href=" flashcard.prev_page_url "   Class="lg:ml-auto mx-1 lg:mr-3 py-4 px-6 bg-btn-color font-bold rounded text-gray-900 hover:bg-white hover:text-blue-500  hover:text-blue text-sm border border-primary-100 font-bold transition duration-200 ">
                    Previous Card
                </Link>
                <Button @click="Shuffle" class=" lg:ml-auto mx-1 lg:mr-3 py-4 bg-btn-color px-6 font-bold rounded text-gray-900  hover:bg-white hover:text-blue-500  hover:text-blue text-sm border border-primary-100 font-bold transition duration-200 " >
                Shuffle Deck</Button>
        
                <button  @click="handelFlip" class=" lg:ml-auto mx-1 lg:mr-3 py-4 px-6 bg-btn-color font-bold rounded text-gray-900  hover:bg-white hover:text-blue-500  hover:text-blue text-sm border border-primary-100 font-bold transition duration-200 " >Flip Card</button>
        
                <Link v-if="flashcard.next_page_url != NULL " v-bind:href=" flashcard.next_page_url "  class=" lg:ml-auto mx-1 lg:mr-3 py-2 py-4 px-6 bg-btn-color font-bold rounded text-gray-900  hover:bg-white hover:text-blue-500  hover:text-blue text-sm border border-primary-100 font-bold transition duration-200 " >Next Card <i class="fa fa-arrow-right fa-bold"></i></Link>

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



<!-- Main modal -->

<div id="modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-3 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        <!-- Add Category -->
                    </h3>
                    <button id="closeButton" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                    </button>
                </div>
                <!-- Modal body -->
              <form @submit="submit" enctype="multipart/form-data">
                <div class="p-6 space-y-6">
                    
  <!-- <input type="hidden" name="audio" id="audioInput" v-model="form.bolbFile"> -->
                    
                    <button type="button" @click="startRecording"><i class="fa fa-address-book"></i>Start Recording</button>
  
                        
                    <div id="audioPlayer" class="justify-center items-center">
                        
                        </div>

                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </div>
                
              </form>
            </div>
        </div>
    </div>

<!--Modal end-->



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

.box{
 border: 10px solid rgba(255, 166, 0, 0.925);
}
.flip-card {
  background-color: transparent;
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
