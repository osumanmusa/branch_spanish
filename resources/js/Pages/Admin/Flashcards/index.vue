<script setup>
import {  Head, Link, useForm } from '@inertiajs/vue3';
import AdminNavbar from "../../../Components/Admin/AdminNavbar.vue";
import AdminSidebar from "../../../Components/Admin/AdminSidebar.vue";
import pagination from "../../../Components/pagination.vue";
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
const props=defineProps({
    flashcards: Object,
    message:String,

});
const form = useForm({
    name: '',
    image:null,
});

const submit = () => {
    form.post(route('admin.category.store'));
};

const upload = function(e) {
            e.preventDefault();
            var files = this.$$.image.files;
            var data = new FormData();
            // for single file
            data.append('image', files[0]);
           // Or for multiple files you can also do
            //  _.each(files, function(v, k){
            //    data.append('avatars['+k+']', v);
           // });
};
</script>
<template>
    <Head title="Flashcards" />

     <div  class="flex h-screen bg-blue ">
            <AdminSidebar/>
            
            <div class="flex-1 flex flex-col overflow-hidden">
                <AdminNavbar/>

                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-white">
                    <div class="container mx-auto px-3 py-8">



    <button id="button" type="button" class="py-3 px-4 mb-6 inline-flex text-right gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
        Add Category
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="20" height="20" viewBox="0 0 256 256" xml:space="preserve">

        <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(46.02023346303501 36.05914396887157) scale(2.03 2.03)" >
	    <path d="M 58.921 90 H 31.079 c -1.155 0 -2.092 -0.936 -2.092 -2.092 V 2.092 C 28.988 0.936 29.924 0 31.079 0 h 27.841 c 1.155 0 2.092 0.936 2.092 2.092 v 85.817 C 61.012 89.064 60.076 90 58.921 90 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
	    <path d="M 90 31.079 v 27.841 c 0 1.155 -0.936 2.092 -2.092 2.092 H 2.092 C 0.936 61.012 0 60.076 0 58.921 V 31.079 c 0 -1.155 0.936 -2.092 2.092 -2.092 h 85.817 C 89.064 28.988 90 29.924 90 31.079 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
        </g>
        </svg>
    </button>




    <div class="mx-auto max-w-screen-xl lg:px-3">
        <!-- Start coding here -->
        <div class="bg-white dark:bg-gray-800 relative sm:rounded-lg overflow-hidden">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full md:w-1/2">
                    <form class="flex items-center">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" required="">
                        </div>
                    </form>
                </div>
                <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                    <a href="/admin_create_flashcard" class="flex py-3 px-4 inline-flex text-right gap-2 items-center justify-center rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                      Add Flash card
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="20" height="20" viewBox="0 0 256 256" xml:space="preserve">

                    <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(46.02023346303501 36.05914396887157) scale(2.03 2.03)" >
	                <path d="M 58.921 90 H 31.079 c -1.155 0 -2.092 -0.936 -2.092 -2.092 V 2.092 C 28.988 0.936 29.924 0 31.079 0 h 27.841 c 1.155 0 2.092 0.936 2.092 2.092 v 85.817 C 61.012 89.064 60.076 90 58.921 90 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
	                <path d="M 90 31.079 v 27.841 c 0 1.155 -0.936 2.092 -2.092 2.092 H 2.092 C 0.936 61.012 0 60.076 0 58.921 V 31.079 c 0 -1.155 0.936 -2.092 2.092 -2.092 h 85.817 C 89.064 28.988 90 29.924 90 31.079 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                    </g>
                    </svg>
                  </a>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left border border-b text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-center text-gray-700 items-center border border-b uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3 border ">Product name</th>
                            <th scope="col" class="px-4 py-3">Category</th>
                            <th scope="col" class="px-4 py-3 border ">Brand</th>
                            <th scope="col" class="px-4 py-3 border ">Description</th>
                            <th scope="col" class="px-4 py-3 border ">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                      <tr v-for="f in flashcards.data" :key="f.id" class="hover:bg-gray-100">
        
                        <td class="px-6 py-4 border text-center text-sm font-medium text-gray-800 dark:text-gray-200">{{ f.category }}</td>
                        <td class="px-6 py-4 border text-center text-sm text-gray-800 dark:text-gray-200">{{ f.flashcard_title }}</td>
                        <td class="px-6 py-4 border text-center text-sm text-gray-800 dark:text-gray-200">{{ f.flashcard_frontcontent }}</td>
                        <td class="px-6 py-4 border text-center text-sm text-gray-800 dark:text-gray-200">{{ f.flashcard_backcontent }}</td>
        
                        <td class="px-6 py-4 border whitespace-nowrap text-center text-sm font-medium">
                          <a class="p-2 text-blue-500 hover:text-blue-200" href="'/edit_flashcard'.{{f.id}}">
                            <i class="fa fa-pencil fa-solid" aria-hidden="true"></i> Edit
                          </a>
                          <a class="p-3 text-red-500 hover:text-red-200" href="'/edit_flashcard'.{{f.id }}'">
                            <i class="fa fa-trash fa-solid" aria-hidden="true"></i> Delete
                          </a>
                        </td>
                      </tr>
        
                    </tbody>
                </table>
            </div>
            <pagination :links="flashcards.links"/>
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
              <form @submit.prevent="submit">
                <div class="p-6 space-y-6">
                    <div class="p-2">
                        <label for="input-label" class="block text-sm  mb-2 dark:text-white">Category Name</label>
                        <input type="text" id="name" v-model="form.name" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" placeholder="Enter Title">
                    </div>
                    <div class="p-2">
                        <label for="input-label" class="block text-sm  mb-2 dark:text-white">Category Image</label>
                        <input type="file" id="image"  @change="upload" class="w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" >
                    
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

                    </div>
                </main>
            </div>
        </div>






</template>

  