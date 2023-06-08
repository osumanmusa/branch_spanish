<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";
import AdminNavbar from "../../../Components/SuperAdmin/AdminNavbar.vue";
import AdminSidebar from "../../../Components/SuperAdmin/AdminSidebar.vue";

const props = defineProps({
    categories: Object,
    message: String,
});

const form = useForm({
    username: '',
    email:'',
    password:'',
});

const submit = () => {
    form.post(route("superadmin.admin.store"));
};


</script>
<template>
    <Head title="Flashcards" />

    <div class="flex h-screen bg-blue">
        <AdminSidebar />

        <div class="flex-1 flex flex-col overflow-hidden">
            <AdminNavbar />

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-white">
                <div class="container mx-auto lg:px-6 py-8">
                   
                    <!--Create form sart-->
                    <div
                        class="flex flex-col bg-white border shadow-sm rounded-xl p-4 md:p-5 dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]"
                    >
                        <form @submit.prevent="submit">
                            <div >
                                <div class="p-3">
                                    <label
                                        for="input-label"
                                        class="block text-sm mb-2 dark:text-white"
                                        >Admin Username
                                    </label>
                                    <input
                                        type="text"
                                        id="question"
                                        v-model="form.username"
                                        class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                        placeholder="Enter Username"
                                    />
                                </div>
                                <div class="p-3">
                                    <label
                                        for="input-label"
                                        class="block text-sm mb-2 dark:text-white"
                                        >Email</label
                                    >
                                    <input
                                        type="text"
                                        id="answer1"
                                        v-model="form.email"
                                        class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                        placeholder="Enter Email"
                                    />
                                </div>
                                <div class="p-3">
                                    <label
                                        for="input-label"
                                        class="block text-sm mb-2 dark:text-white"
                                        >Password</label
                                    >
                                    <input
                                        type="text"
                                        id="answer2"
                                        v-model="form.password"
                                        class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                        placeholder="Enter Password"
                                    />
                                </div>
                                
                            <br>
                            </div>
                            <div class="lg:right-0 mb-3 p-3">
                                <Button
                                    type="submit"
                                    class="py-3 px-4 text-right gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800"
                                >
                                    Submit
                                </Button>
                            </div>
                        </form>
                    </div>

                    <!--ceate form end-->
                </div>
            </main>
        </div>
    </div>
</template>
<style>
.card-submit {
    float: right;
}
</style>
