<script setup>
import { Head, Link, useForm  } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
import Navbar from'../Components/Navbar.vue';
import { shuffle as _shuffle } from 'lodash-es';
import { Modal } from 'flowbite';
const props=defineProps({
    flashcards: Object,
    flashcard: Object,
    successmessage: Object,
    errormessage: Object,

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


function deleteAudio() {
  if (audiofile !== null) {
    audiofile = null;
  }
}








</script>

<template>
    <Head title="Pronounciation" />

<Navbar/>
<section class="bg-blue-500" v-if="cardKey">

<transition name="fade" mode="out-in">
    <div v-if="$page.props.flash.successmessage"  class="tostr flex mt-2 items-center w-full max-w-xs p-4 space-x-4 text-green-500 bg-white divide-x divide-gray-200 rounded-lg shadow dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800" role="alert">
        <svg class="w-7 h-7 text-green-600 " fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <div class="pl-4 text-sm font-normal"> {{ $page.props.flash.successmessage }}</div>    
        <button type="button" class="justify-end group mr-2 p-2" @click="$page.props.flash.successmessage = false">
      <svg
        class="block w-4 h-3 fill-green-800 "
        xmlns="http://www.w3.org/2000/svg"
        width="235.908"
        height="235.908"
        viewBox="278.046 126.846 235.908 235.908"
      >
        <path
          d="M506.784 134.017c-9.56-9.56-25.06-9.56-34.62 0L396 210.18l-76.164-76.164c-9.56-9.56-25.06-9.56-34.62 0-9.56 9.56-9.56 25.06 0 34.62L361.38 244.8l-76.164 76.165c-9.56 9.56-9.56 25.06 0 34.62 9.56 9.56 25.06 9.56 34.62 0L396 279.42l76.164 76.165c9.56 9.56 25.06 9.56 34.62 0 9.56-9.56 9.56-25.06 0-34.62L430.62 244.8l76.164-76.163c9.56-9.56 9.56-25.06 0-34.62z"
        />
      </svg>
    </button>
    </div>
  </transition>

  <Transition name="Efade"> 
    <div v-if="$page.props.flash.errormessage" id="toast-simple" class="tostr flex mt-2 mr-3 items-center w-full max-w-xs p-4 space-x-4 text-red-500 bg-white divide-x divide-gray-200 rounded-lg shadow dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800" role="alert">
        <svg class="w-7 h-7 text-red-600 " fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <div class="pl-4 text-sm font-normal">{{ $page.props.flash.errormessage }}</div>
        <button type="button" class="justify-end group mr-2 p-2" @click="$page.props.flash.errormessage  = false">
      <svg
        class="block w-4 h-3 fill-red-600 "
        xmlns="http://www.w3.org/2000/svg"
        width="235.908"
        height="235.908"
        viewBox="278.046 126.846 235.908 235.908"
      >
        <path
          d="M506.784 134.017c-9.56-9.56-25.06-9.56-34.62 0L396 210.18l-76.164-76.164c-9.56-9.56-25.06-9.56-34.62 0-9.56 9.56-9.56 25.06 0 34.62L361.38 244.8l-76.164 76.165c-9.56 9.56-9.56 25.06 0 34.62 9.56 9.56 25.06 9.56 34.62 0L396 279.42l76.164 76.165c9.56 9.56 25.06 9.56 34.62 0 9.56-9.56 9.56-25.06 0-34.62L430.62 244.8l76.164-76.163c9.56-9.56 9.56-25.06 0-34.62z"
        />
      </svg>
    </button>
    </div>
</Transition>

<section   >
<!-- Page Container -->

<div class="container my-12 mx-auto px-4 md:px-12">

    


    <div class="flex flex-wrap justify-center mx-1 lg:-mx-4">

      <div class="grid lg:grid-cols-8 gap-4">
          <div class="col-span-2">
            <div class="" >
              <Link v-if="flashcard.prev_page_url != NULL " :href=" flashcard.prev_page_url "  Class="mb-2 lg:ml-auto mx-1 lg:mr-3 py-4 px-6 bg-btn-color font-bold rounded text-gray-900 hover:bg-white hover:text-blue-500  hover:text-blue text-sm border border-primary-100 font-bold transition duration-200 ">
            <svg class="w-6 h-5 inline" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 9l-3 3m0 0l3 3m-3-3h7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            Previous Card
        </Link>
        <Button @click="Shuffle" class="mb-2 lg:ml-auto mx-1 lg:mr-3 py-4 bg-btn-color px-6 font-bold rounded text-gray-900  hover:bg-white hover:text-blue-500  hover:text-blue text-sm border border-primary-100 font-bold transition duration-200 " >
            <svg class="w-6 h-5 inline-block" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                 <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 00-3.7-3.7 48.678 48.678 0 00-7.324 0 4.006 4.006 0 00-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3l-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 003.7 3.7 48.656 48.656 0 007.324 0 4.006 4.006 0 003.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3l-3 3"></path>
            </svg>
            Shuffle Deck</Button>
        
        <button  @click="handelFlip" class="mb-2 lg:ml-auto mx-1 lg:mr-3 py-4 px-6 bg-btn-color font-bold rounded text-gray-900  hover:bg-white hover:text-blue-500  hover:text-blue text-sm border border-primary-100 font-bold transition duration-200 " >
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
      
        <Link v-if="flashcard.next_page_url != NULL " v-bind:href=" flashcard.next_page_url " class="mb-2 lg:ml-auto mx-1 lg:mr-3 py-2 py-4 px-6 bg-btn-color font-bold rounded text-gray-900  hover:bg-white hover:text-blue-500  hover:text-blue text-sm border border-primary-100 font-bold transition duration-200 " >
           
            Next Card 
            <svg class="w-6 h-5 inline" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 15l3-3m0 0l-3-3m3 3h-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
        </Link>
            </div>

            
            
          </div>
          <div class="col-span-4">
            <div  class=" ">
            <div class="flip-card ">
                <div class="flip-card-inner ">

                    <transition name = "flip" mode = "out-in">
                    <div   :key="cardKey" class="flip-card-front ">

                         <article class="overflow-hidden rounded-lg bg-white border border-yellow-500 box">


                            <header class="flex items-center justify-center leading-tight p-2 md:p-4 h-[50vh]">
                    
                
                                <div class="px-6 py-4">
                                        <h1 class="text-gray-700 text-7xl text-2xl">{{cardKey}}
                                    </h1>
                                </div>
                
                            </header>


                            </article>
                    </div>
                </transition>
                </div>
            </div>
            <div class="flex flex-wrap justify-center my-4">
                <p class="text-white text-2xl">Bien, gracias. ¿Y usted?</p>
            </div>


        </div>
          </div>
          <div class="col-span-2">
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
          </div>
      </div>
        <!-- Column -->
  
        
        <!-- <div  class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/2">
            <div class="flip-card ">
                <div class="flip-card-inner ">

                    <transition name = "flip" mode = "out-in">
                    <div   :key="cardKey" class="flip-card-front ">

                         <article class="overflow-hidden rounded-lg bg-white border border-yellow-500 box">


                            <header class="flex items-center justify-center leading-tight p-2 md:p-4 h-[50vh]">
                    
                
                                <div class="px-6 py-4">
                                        <h1 class="text-gray-700 text-7xl text-2xl">{{cardKey}}
                                    </h1>
                                </div>
                
                            </header>


                            </article>
                    </div>
                </transition>
                </div>
            </div>
            <div class="flex flex-wrap justify-center my-4">
                <p class="text-white text-2xl">Bien, gracias. ¿Y usted?</p>
            </div>


        </div> -->
        <!-- END Column -->
<!-- <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/6 lg:space- justify-center items-center ">

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


</div> -->

</div>
</div>


<!-- <div class="flex flex-wrap justify-center mx-1 my-12">
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

        </div>  -->
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
             <p class="text-white text-center p-4">   Copyright @2013.BranchOutWithSpanish.com</p>
</div>

</section>
<section v-else class="">

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
                <div class="p-6 justify-center flex items-center">
                    
  <!-- <input type="hidden" name="audio" id="audioInput" v-model="form.bolbFile"> -->
                    
                    <button type="button" id="glowbutton" @click="startRecording">
                        <svg class="w-11 h-11 " fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 18.75a6 6 0 006-6v-1.5m-6 7.5a6 6 0 01-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 01-3-3V4.5a3 3 0 116 0v8.25a3 3 0 01-3 3z"></path>
</svg>
                    </button>
  
                        

                </div>
                
                <div class="p-6 justify-center flex items-center">
                    
                <div id="audioPlayer" class="justify-center items-center">
                        
                    </div>
                                          
                    <Link @click="deleteAudio">Delete</Link>

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

.box{
 border: 10px solid rgba(255, 166, 0, 0.925);
}
.flip-card {
  background-color: transparent;
}

/* This container is needed to position the front and back side */

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
.toast-right{
    float:right;
}    
.fade-enter-active, .fade-leave-active {
        transition: opacity 2.5s ease-out;
}
.fade-enter, .fade-leave-to {
        opacity: 0;
}
@keyframes glowing {
        0% {
          background-color: #ac0d0d;
          box-shadow: 0 0 5px #ac0d0d;
        }
        50% {
          background-color: #e23737;
          box-shadow: 0 0 20px #e23737;
        }
        100% {
          background-color: #9b2020;
          box-shadow: 0 0 5px #9b2020;
        }
      }
      #glowbutton {
        animation: glowing 1300ms infinite;
      }
       
.tostr{
  
  position:fixed;
  right:1rem;
  top:1rem;
  z-index: 1000;
}

</style>
