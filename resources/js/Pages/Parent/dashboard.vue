<script setup>
import {  Head, Link, useForm } from '@inertiajs/vue3';
import AdminNavbar from "../../Components/Admin/AdminNavbar.vue";
import AdminSidebar from "../../Components/Admin/AdminSidebar.vue";

</script>
<template>
    <Head title="Dashboard" />
        <div  class="flex h-screen bg-blue ">
            <AdminSidebar/>
            
            <div class="flex-1 flex flex-col overflow-hidden">
                <AdminNavbar/>

                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                    <div class="container mx-auto px-6 py-8">

<!-- Table-->

<!--Table End-->
                    </div>
                </main>
            </div>
        </div>






</template>

  