<script setup>
import {  Head, Link, useForm } from '@inertiajs/vue3';
import AdminNavbar from "../../../Components/SuperAdmin/AdminNavbar.vue";
import AdminSidebar from "../../../Components/SuperAdmin/AdminSidebar.vue";
import { ref, onMounted } from "vue";


const audioUrl = ref("");
const isRecording = ref(false);

const props=defineProps({
    categories: Object,
    message:String,
    successmessage: Object,
    errormessage: Object,

});


let audiofile = new FormData();
let delfile = null;
let mediaRecorder; 

// function startRecording() {
//     navigator.mediaDevices
//         .getUserMedia({ audio: true })
//         .then(function (stream) {
//             const mediaRecorder = new MediaRecorder(stream);
//             const chunks = [];

//             mediaRecorder.start();

//             mediaRecorder.addEventListener("dataavailable", function (e) {
//                 chunks.push(e.data);
//             });
//             mediaRecorder.addEventListener("start", function () {
//                 // window.alert('Started')

//                 isRecording.value = true;
//             });
//             mediaRecorder.addEventListener("stop", function () {
//                 isRecording.value = false;
//                 const audioBlob = new Blob(chunks, { type: "audio/mp3" });
//                 //------new--------
//                 audioUrl.value = URL.createObjectURL(audioBlob);
//                 // audiofile = new FormData();

//                 //-----old-----------
//                 //           const audioUrl = URL.createObjectURL(audioBlob);

//                 // audiofile = new FormData(document.getElementById('form'));
//                 audiofile.append("recordfile", audioBlob);
           
//                 //  const audio = document.createElement('audio');
//                 // audio.type='file';
//                 // audio.controls = true;
//                 // audio.id='recordedaudio';
//                 // audio.src = audioUrl;
//                 // audio.value= audioUrl;
//                 // var wrap = document.getElementById("audioPlayer");
//                 // wrap.appendChild(audio);

//                 //   blobFile.value = audioBlob;
//                 //      var formData = new FormData();
//                 //  formData.append('audio',audioBlob);
//                 // formData.append('voiceid',props.flashcard.data[0].id);

//                 //     // blobFile.value = formData;
//                 //         audiofile = formData;
//             });

//             // Stop recording after 10 seconds
//             setTimeout(function () {
//                 mediaRecorder.stop();
//             }, 5000);
//         })
//         .catch(function (err) {
//             console.log("The following error occurred: " + err);
//         });
// }


const chunks = [];
function startRecording() {
    
    navigator.mediaDevices.getUserMedia({ audio: true })
        .then(function (stream) {
            mediaRecorder = new MediaRecorder(stream); // Assign MediaRecorder to the global variable

            mediaRecorder.start(); 
            mediaRecorder.addEventListener("dataavailable", function (e) {
                chunks.push(e.data);
            });

            mediaRecorder.addEventListener("start", function () {
                
                isRecording.value = true;
            });
            

        })
        .catch(function (err) {
            console.log("The following error occurred: " + err);
        });
}

function stopRecording() {
    if (mediaRecorder && mediaRecorder.state !== 'inactive') {
        mediaRecorder.addEventListener("dataavailable", function (e) {
            chunks.push(e.data);
        });
        mediaRecorder.addEventListener("stop", function () {
                isRecording.value = false;
                const audioBlob = new Blob(chunks, { type: "audio/mp3" });
                audioUrl.value = URL.createObjectURL(audioBlob);
                audiofile.append("audio", audioBlob);
            });
        mediaRecorder.stop();
    }
}




const submit = () => {


    let formDataform = new FormData(document.getElementById('form'));
for (var pair of formDataform.entries()) {
    audiofile.append(pair[0], pair[1]);

}
// audiofile = new FormData(document.getElementById('form'));
    const csrf_token = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");

    fetch("/superadmin/store_pronounciation", {
        method: "POST",
        body: audiofile,
    }).then(res => res.json())
    .then((res) =>{
        
       if(res.status == 'success'){
       
            window.location.href=('/superadmin/verifypronounciation')
        
       }
       else if(res.status== 'error'){
        window.alert(res.message)
       }

    }) 
   
};


function deleteAudio() {

    audioUrl.value = null;
}

</script>
<template>
    <Head title="Flashcards" />

     <div  class="flex h-screen bg-blue ">
            <AdminSidebar/>
            
            <div class="flex-1 flex flex-col overflow-hidden">
                <AdminNavbar/>

                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-white">
                    <div class="container mx-auto lg:px-6 py-8">
        <transition name="fade" mode="out-in">
            <div
                v-if="$page.props.flash.successmessage"
                class="tostr flex mt-2 items-center w-full max-w-xs p-4 space-x-4 text-green-500 bg-white divide-x divide-gray-200 rounded-lg shadow dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800"
                role="alert"
            >
                <svg
                    class="w-7 h-7 text-green-600"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.5"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                    ></path>
                </svg>
                <div class="pl-4 text-sm font-normal">
                    {{ $page.props.flash.successmessage }}
                </div>
                <button
                    type="button"
                    class="justify-end group mr-2 p-2"
                    @click="$page.props.flash.successmessage = false"
                >
                    <svg
                        class="block w-4 h-3 fill-green-800"
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
            <div
                v-if="$page.props.flash.errormessage"
                id="toast-simple"
                class="tostr flex mt-2 mr-3 items-center w-full max-w-xs p-4 space-x-4 text-red-500 bg-white divide-x divide-gray-200 rounded-lg shadow dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800"
                role="alert"
            >
                <svg
                    class="w-7 h-7 text-red-600"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.5"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                    ></path>
                </svg>
                <div class="pl-4 text-sm font-normal">
                    {{ $page.props.flash.errormessage }}
                </div>
                <button
                    type="button"
                    class="justify-end group mr-2 p-2"
                    @click="$page.props.flash.errormessage = false"
                >
                    <svg
                        class="block w-4 h-3 fill-red-600"
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

<!--Create form sart-->
<div class="flex flex-col bg-white border shadow-sm rounded-xl p-4 md:p-5 dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
<form @submit.prevent="submit" enctype="multipart/form-data" id="form" class="form">
    <div class="grid gap-4 mb-3 md:grid-cols-2 p-3">
        <div class="p-3">
         <label for="input-label" class=" text-sm mb-2 dark:text-white">Pronunciations Category</label>
         <select  id="category" name="category" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
            <option v-for="c in categories" :key="c.id" :value="c.id ">{{ c.category_name }}</option>
         </select>
         </div>
         <div class="p-3" >
            <label for="input-label" class="block text-sm mb-2 dark:text-white" >
                Pronunciation Title</label> 
                <input type="text" id="flash_title" name="flash_title"
                        class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                        placeholder="Enter Title" required/>
        </div>
                                <div class="p-3">
                                    <label
                                        for="input-label"
                                        class="block text-sm mb-2 dark:text-white"
                                        >Say it in a Sentence</label
                                    >
                                    <input
                                        type="text"
                                        id="flashcard"
                                        name="flashcard"
                                        class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                        placeholder="" required
                                    />
                                </div>
                                <div class="p-3">
                                    <label
                                        for="input-label"
                                        class="block text-sm mb-2 dark:text-white"
                                        >Pronunciation Front Content</label
                                    >
                                    <input
                                        type="text"
                                        id="frontcontent"
                                        name="frontcontent"
                                        class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                        placeholder="" required
                                    />
                                </div>
                                <div class="p-3">
                                    <label
                                        for="input-label"
                                        class="block text-sm mb-2 dark:text-white"
                                        >Pronunciation Back Content</label
                                    >
                                    <input
                                        type="text"
                                        id="backcontent"
                                        name="backcontent"
                                        class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                        placeholder="" required
                                    />
                                </div>
                                <!-- <div class="p-3">
         <label for="input-label" class="block text-sm  mb-2 dark:text-white">Pronunciation Title</label>
         <input type="text" id="title" name="title" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" placeholder="Enter Title" required>
    </div> -->
    </div>


    <div class="p-3">
         <label for="input-label" class="block text-sm px-3 mb-2 dark:text-white">Record Audio</label>
                    <div class="p-6 justify-center flex items-center mt-6">
                        <!-- <input type="hidden" name="audio" id="audioInput" v-model="form.bolbFile"> -->


                        <button
                            v-if="!audioUrl"
                            type="button"
                            @click="startRecording"
                        ><div class="w-20 h-20" 
                            :class="[isRecording ? 'greenbutton' : 'redbutton']">
                           <i class="fa fa-microphone pt-5 text-white text-3xl"></i> 
                            </div>
                            <span>{{ isRecording?'Recording' : 'Start'}}</span>
                            
                        </button>
<button  v-show="isRecording"
                            v-if="!audioUrl" type="button" @click="stopRecording" class="p-4">
    <svg class="w-11 h-11 m-4 text-white stop-button" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
  <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
  <path stroke-linecap="round" stroke-linejoin="round" d="M9 9.563C9 9.252 9.252 9 9.563 9h4.874c.311 0 .563.252.563.563v4.874c0 .311-.252.563-.563.563H9.564A.562.562 0 019 14.437V9.564z"></path>
</svg> Stop</button>
                    </div>

                    <div class="p-6 justify-center flex items-center">
                        <div
                            id="audioPlayer"
                            class="justify-center items-center"
                        >
                            <audio 
                                v-if="audioUrl"
                                controls
                                :src="audioUrl"
                            ></audio>
                        </div>
                    </div>
                    <div class="p-6 justify-center flex items-center">
                        <Button
                            class="text-white bg-red-700 px-5 py-2.5 text-center rounded-lg"
                            v-if="audioUrl"
                            type="button"
                            @click="deleteAudio"
                            >Delete</Button
                        >
                    </div>
    </div>
    <!-- <div class="p-3">
        <br/>
                <p class="text-center font-bold text-2xl"> OR </p>
        <br/>
        </div> -->
    <!-- <div class="p-3">
    <label for="input-label" class="block text-sm  mb-2 dark:text-white">Upload Voice Recording File</label>

<div class="flex items-center justify-center w-full">
    <label for="audio" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-200 rounded-lg cursor-pointer bg-white dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
        <div class="flex flex-col items-center justify-center pt-5 pb-6">
            <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Upload audio</span></p>
            <a class="py-2 px-6  bg-blue-500 text-sm text-white">SELECT FILE</a>
        </div>
        <input id="audio" name="audio" type="file" class="hidden "/>
    </label>
</div> 

    </div> -->

  <div class="lg:px-16 lg:right-0 p-3 ">

    <button type="submit" class="card-submit py-3 px-4 text-right rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800" >
        Save

    </button>

  </div>


</form>
</div>


<!--ceate form end-->




                    </div>
                </main>
            </div>
        </div>






</template>
<style >
.card-submit{
    float:right;
}
.toast-right {
    float: right;
}
.tostr{
  
  position:fixed;
  right:1rem;
  top:1rem;
  z-index: 1000;
}
.fade-enter-active,
.fade-leave-active {
    transition: opacity 2.5s ease-out;
}
.fade-enter,
.fade-leave-to {
    opacity: 0;
}
@keyframes greenglowing {
    0% {
        background-color: #08b355;
        box-shadow: 0 0 5px #0dac6a;
    }
    50% {
        background-color: #07be63;
        box-shadow: 0 0 20px #058f3a;
    }
    100% {
        background-color: #07aa4b;
        box-shadow: 0 0 5px #0f8a34;
    }
}
.redbutton {
    background: #dd1b1b;
    border-radius: 55px;
}
.greenbutton {
    animation: greenglowing 1300ms infinite;
    border-radius: 55px;
}
.stop-button{

    background: #dd1b1b;
    border-radius: 55px;
}
</style>