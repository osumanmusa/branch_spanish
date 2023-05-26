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
    <Head title="Flashcards" />

     <div  class="flex h-screen bg-blue ">
            <AdminSidebar/>
            
            <div class="flex-1 flex flex-col overflow-hidden">
                <AdminNavbar/>

                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-white">
                    <div class="container mx-3 px-3 py-8">


<!-- Breadcrumb -->
<nav class="flex w-[25vw]  px-5 py-3 text-gray-700 border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
  <ol class="inline-flex items-center space-x-1 md:space-x-3">

    <li>
      <div class="flex items-center">
      <i class="fa fa-angle-left fa-bold"></i>
        <a href="#" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Flashcards</a>
      </div>
    </li>
  </ol>
</nav>




    <div class="mx-auto py-8 max-w-screen-xl lg:px-3">
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
                            <th scope="col" class="px-4 py-3 border ">Category name</th>
                            <th scope="col" class="px-4 py-3">Flashcard</th>
                            <th scope="col" class="px-4 py-3 border ">Front Content</th>
                            <th scope="col" class="px-4 py-3 border ">Back Content</th>
                            <th scope="col" class="px-4 py-3 border ">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                      <tr v-for="f in flashcards.data" :key="f.id" class="hover:bg-gray-100">
        
                        <td class="px-6 py-4 border text-center text-sm font-medium text-gray-800 dark:text-gray-200">{{ f.category_name }}</td>
                        <td class="px-6 py-4 border text-center text-sm text-gray-800 dark:text-gray-200">{{ f.flashcard_title }}</td>
                        <td class="px-6 py-4 border text-center text-sm text-gray-800 dark:text-gray-200">{{ f.flashcard_frontcontent }}</td>
                        <td class="px-6 py-4 border text-center text-sm text-gray-800 dark:text-gray-200">{{ f.flashcard_backcontent }}</td>
        
                        <td class="px-6 py-4 border whitespace-nowrap text-center text-sm font-medium">
                         <!-- <Link class="p-2 text-blue-500 hover:text-blue-200" v-bind:href="route('admin.editflashcards', f.id)">
                            <i class="fa fa-pencil fa-solid" aria-hidden="true"></i> Edit
                          </Link> -->
                          <a class="p-3 text-red-500 hover:text-red-200" v-bind:href="route('admin.deleteflashcards', f.id)">
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



                    </div>
                </main>
            </div>
        </div>






</template>

  