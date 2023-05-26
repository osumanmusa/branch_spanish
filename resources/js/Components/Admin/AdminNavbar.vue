<script setup>
import {  Head, Link, useForm } from '@inertiajs/vue3';
import { onMounted } from 'vue';
import { Modal } from 'flowbite';

onMounted(() => {
    const $buttonElement = document.querySelector('#button');
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

const form = useForm({
    name: '',
    image:'',
});

const submit = () => {
    form.post(route('admin.category.store'));
};

function selectFile($event) {
            form.image = $event.target.files[0];
        }
</script>
<template>
<header class="flex items-center justify-between px-6 py-4 bg-white border-b-4 border-yellow-400">
    <div class="flex items-center">
        <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>

        <div class="relative mx-4 lg:mx-0">
            
        <p>Dashboard</p>
    </div>
<button id="button" type="button" class="relative lg:px-4 " >
  Category 
</button>

    </div>
    
    <div class="flex items-center">
        
        <div  class="relative">
            <button class="relative block w-8 h-8 overflow-hidden rounded-full shadow focus:outline-none">
                <img class="object-cover w-full h-full" src="/img/avatar.jpg" alt="Your avatar">
            </button>

  
        </div>
        <div x-data="{ notificationOpen: false }" class="relative">
            <Link  :href="route('logout')" method="post" as="button" class="flex mx-4 text-gray-600 focus:outline-none overflow-hidden">
            <svg fill="#000000" height="30px" width="30px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
	 viewBox="0 0 520.3 450.3" xml:space="preserve">
<g>
	<g>
		<path d="M0,121.05v248.2c0,34.2,27.9,62.1,62.1,62.1h200.6c34.2,0,62.1-27.9,62.1-62.1v-40.2c0-6.8-5.5-12.3-12.3-12.3
			s-12.3,5.5-12.3,12.3v40.2c0,20.7-16.9,37.6-37.6,37.6H62.1c-20.7,0-37.6-16.9-37.6-37.6v-248.2c0-20.7,16.9-37.6,37.6-37.6h200.6
			c20.7,0,37.6,16.9,37.6,37.6v40.2c0,6.8,5.5,12.3,12.3,12.3s12.3-5.5,12.3-12.3v-40.2c0-34.2-27.9-62.1-62.1-62.1H62.1
			C27.9,58.95,0,86.75,0,121.05z"/>
		<path d="M385.4,337.65c2.4,2.4,5.5,3.6,8.7,3.6s6.3-1.2,8.7-3.6l83.9-83.9c4.8-4.8,4.8-12.5,0-17.3l-83.9-83.9
			c-4.8-4.8-12.5-4.8-17.3,0s-4.8,12.5,0,17.3l63,63H218.6c-6.8,0-12.3,5.5-12.3,12.3c0,6.8,5.5,12.3,12.3,12.3h229.8l-63,63
			C380.6,325.15,380.6,332.95,385.4,337.65z"/>
	</g>
</g>
</svg> <span class="mt-1">Logout</span>
            </Link>
        </div>
        
    </div>

<!-- Main modal -->

<div id="modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-3 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Add Category
                    </h3>
                    <button id="closeButton" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                    </button>
                </div>
                <!-- Modal body -->
              <form @submit="submit" enctype="multipart/form-data">
                <div class="p-6 space-y-6">
                    <div class="p-2">
                        <label for="input-label" class="block text-sm  mb-2 dark:text-white">Category Name</label>
                        <input type="text" id="name" v-model="form.name" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" placeholder="Enter Title">
                    </div>
                    <div class="p-2">
                        <label for="input-label" class="block text-sm  mb-2 dark:text-white">Category Image</label>
                        <input type="file" id="image" ref="photo" v-on:change="selectFile" class="w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" >
                    
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
</header>


</template>
