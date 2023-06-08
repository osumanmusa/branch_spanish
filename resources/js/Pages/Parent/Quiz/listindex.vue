<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import ParentNavbar from "../../../Components/Parent/ParentNavbar.vue";
import ParentSidebar from "../../../Components/Parent/ParentSidebar.vue";
import pagination from "../../../Components/pagination.vue";
import { ref, onMounted,  computed } from 'vue';
import { Modal } from "flowbite";
import { watch } from "vue";
import _ from "lodash";
const props = defineProps({
    child: Object,
    successmessage: Object,
});
const form = useForm({
    search: '',

});
const submit = () => {
    form.get(route('parent.studentquiz'));
	

};
</script>
<template>
    <Head title="Dashboard" />
    <div class="flex h-screen bg-blue">
        <ParentSidebar />

        <div class="flex-1 flex flex-col overflow-hidden">
            <ParentNavbar />

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                <div class="container mx-auto px-6 py-8">
                    <!-- Breadcrumb
                    <transition name="fade" mode="out-in">
                        <div
                            v-if="$page.props.flash.successmessage"
                            class="toast-right flex mt-2 items-center w-full max-w-xs p-4 space-x-4 text-green-500 bg-white divide-x divide-gray-200 rounded-lg shadow dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800"
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
                                @click="
                                    $page.props.flash.successmessage = false
                                "
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
                    </transition> -->
                    <nav
                        class="flex w-[25vw] px-5 py-3 text-gray-700 border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700"
                        aria-label="Breadcrumb"
                    >
                        <ol
                            class="inline-flex items-center space-x-1 md:space-x-3"
                        >
                            <li>
                                <div class="flex items-center">
                                    <i class="fa fa-angle-left fa-bold"></i>
                                    <a
                                        href="#"
                                        class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white"
                                        >Dashbaord</a
                                    >
                                </div>
                            </li>
                        </ol>
                    </nav>
                    <!--Table start-->

                    <div class="mx-auto mt-6 lg:px-3">
                        <!-- Start coding here -->
                        <div
                            class="bg-white dark:bg-gray-800 relative sm:rounded-lg overflow-hidden"
                        >
                            <div
                                class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4"
                            >
                                <div class="w-full md:w-1/2">
                                    <form class="flex items-center">
                                        <label
                                            for="simple-search"
                                            class="sr-only"
                                            >Search</label
                                        >
                                        <div class="relative w-full">
                                            <div
                                                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none"
                                            >
                                                <svg
                                                    aria-hidden="true"
                                                    class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                    fill="currentColor"
                                                    viewbox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                >
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                        clip-rule="evenodd"
                                                    />
                                                </svg>
                                            </div>
                                            <input
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Search"
                                                v-model="form.search" @keyup="submit"
                                            />
                                        </div>
                                    </form>
                                </div>
                                <div
                                    class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0"
                                >
                                </div>
                            </div>
                            <div class="overflow-x-auto">
                                <table
                                    class="w-full text-sm text-left border border-b text-gray-500 dark:text-gray-400"
                                >
                                    <thead
                                        class="text-xs text-center text-gray-700 items-center border border-b uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                                    >
                                        <tr>
                                            <th
                                                scope="col"
                                                class="px-4 py-3 border"
                                            >
                                                Student name
                                            </th>
                                            <th scope="col" class="px-4 py-3">
                                                Studnt Id
                                            </th>
                                            <th
                                                scope="col"
                                                class="px-4 py-3 border"
                                            >
                                                Status
                                            </th>
                                            <th
                                                scope="col"
                                                class="px-4 py-3 border"
                                            >
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody
                                        class="divide-y divide-gray-200 dark:divide-gray-700"
                                    >
                                        <tr
                                            v-for="c in child"
                                            :key="c.id"
                                            class="hover:bg-gray-100"
                                        >
                                            <td
                                                class="px-6 py-4 border text-center text-sm font-medium text-gray-800 dark:text-gray-200"
                                            >
                                                {{
                                                    c.child_firstname +
                                                    " " +
                                                    c.child_lastname
                                                }}
                                            </td>
                                            <td
                                                class="px-6 py-4 border text-center text-sm text-gray-800 dark:text-gray-200"
                                            >
                                                {{ c.student_id }}
                                            </td>
                                            <td
                                                class="px-6 py-4 border text-center text-sm text-gray-800 dark:text-gray-200"
                                            >
                                                <span
                                                    v-if="
                                                        c.student_status == null
                                                    "
                                                    class="text-yellow-400"
                                                >
                                                    <b>Processing</b></span
                                                >
                                                <span v-else>{{
                                                    c.email
                                                }}</span>
                                            </td>

                                            <td
                                                class="px-6 py-4 border whitespace-nowrap text-center text-sm font-medium"
                                            >
                                                <Link
                                                    v-bind:href="
                                                        route(
                                                            'parent.studentquiz',
                                                            c.id
                                                        )
                                                    "
                                                    class="p-2 text-blue-500 hover:text-blue-200"
                                                >
                                                    <i
                                                        class="fa fa-eye fa-solid"
                                                        aria-hidden="true"
                                                    ></i>
                                                    view
                                                </Link>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <pagination />
                        </div>
                    </div>

                    <!--Table end-->
                </div>
            </main>
        </div>
    </div>
</template>
<style scoped>

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
</style>