<script setup>
import {  Head, Link, useForm } from '@inertiajs/vue3';
import { onMounted } from 'vue';
import { Modal } from 'flowbite';
import { useSidebarStore } from "../../../js/Store/useSidebarstore";

const sidebar = useSidebarStore();

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
        <button 
                @click="sidebar.toggleOpen" class="text-gray-500 focus:outline-none lg:hidden">
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>

        
        <div class="relative mx-4 lg:mx-0">
                <Link  class="relative lg:px-4 border border-primary-100 py-3 lg:px-6 px-1  rounded rounded-lg bg-blue-500 text-white" :href="'/'">
                   <i class="fa fa-home text-white"></i> Homepage
                </Link>
        </div>

    </div>
    
    <div class="flex items-center">
        
        <div  class="relative">
            <Link :href="'/parent/editprofile'" class="relative block w-8 h-8 overflow-hidden rounded-full shadow focus:outline-none">


                <img v-if="$page.props.auth.user.profile_image==null" class="object-cover w-full h-full" src="/img/avatar.png"  alt="Your avatar">
    <img v-else class="object-cover w-full h-full" :src="'/img/profile-img/'+ $page.props.auth.user.profile_image"  alt="Your avatar">
            </Link>

  
        </div>
        <div x-data="{ notificationOpen: false }" class="relative">
            <Link :href="route('logout')" method="post" as="button"  class="flex mx-4 text-gray-600 focus:outline-none overflow-hidden">
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


</header>


</template>
<style scoped>
.home-bg{
    background: #fafafa;
}
</style>