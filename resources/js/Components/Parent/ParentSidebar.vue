
<template>
<div v-cloak :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false" class="sidebar fixed inset-0 z-20 transition-opacity bg-black opacity-50 lg:hidden"></div>
    
    <div v-cloak :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class="sidebar fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto transition duration-300 transform bg-blue-500 lg:translate-x-0 lg:static lg:inset-0">
        <div class="flex items-center justify-center mt-8">
            <div class="flex flex-col items-center">
                
                <span class="mx-2 font-semibold text-white">Name of Administrator</span>
                <p class="pt-2 text-white">{{ $page.props.auth.user.role }}</p>
            </div>
        </div>
    
        <nav class="mt-10">
            <a class="flex items-center px-6 py-2 mt-4 bg-white text-blue-600 font-bold hover:text-gray-100 hover:bg-gray-700 hover:bg-opacity-25" href="/parenthome">
                <img src="/img/dashboard/1.png"/>
    
                <span class="mx-3">Dashboard</span>
            </a>

    
            <a class="flex items-center px-6 py-2 mt-4 text-gray-100 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="/parent_student">
                <img src="/img/dashboard/5.png"/>
    
                <span class="mx-3">Quiz me</span>
            </a>

    
             <a class="flex items-center px-6 py-2 mt-4 text-gray-100 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="/parent_pronounciation">
                 <img src="/img/dashboard/4.png" class="w-5 h-5"/>

                 <span class="mx-4"> Pronounciations</span>
             </a>

    
            <a class="flex items-center px-6 py-2 mt-4 text-gray-100 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="/parent_addstudent">
                <img src="/img/i5.jpg" class="w-5 h-5"/>

                <span class="mx-4"> Add New Account</span>
            </a>
    
        </nav>
    </div>
</template>