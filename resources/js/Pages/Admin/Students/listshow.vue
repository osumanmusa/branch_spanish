<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import AdminNavbar from "../../../Components/Admin/AdminNavbar.vue";
import AdminSidebar from "../../../Components/Admin/AdminSidebar.vue";
import pagination from "../../../Components/pagination.vue";
import { Modal } from "flowbite";
import { ref, onMounted } from "vue";

const props = defineProps({
    studentquiz: Array,
    grades: Object,
    message: String,
});
</script>
<template>
    <Head title="Flashcards" />

    <div class="flex h-screen bg-blue">
        <AdminSidebar />

        <div class="flex-1 flex flex-col overflow-hidden">
            <AdminNavbar />

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-white">
                <div class="container mx-3 px-3 py-8">
                    <!-- Breadcrumb -->
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
                                        href="/admin/students"
                                        class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white"
                                        >Student Details</a
                                    >
                                </div>
                            </li>
                        </ol>
                    </nav>

                    <div class="mx-auto py-8 max-w-screen-xl lg:px-3">
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
                                                type="text"
                                                id="simple-search"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Search"
                                                required=""
                                            />
                                        </div>
                                    </form>
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
                                                class="lg:px-4 lg:py-3 border"
                                            >
                                                Student name
                                            </th>
                                            <th
                                                scope="col"
                                                class="lg:px-4 lg:py-3 border"
                                            >
                                                Student Id
                                            </th>
                                            <th
                                                scope="col"
                                                class="lg:px-4 lg:py-3 border"
                                            >
                                                Quiz Category
                                            </th>
                                            <th
                                                scope="col"
                                                class="lg:px-4 lg:py-3 border"
                                            >
                                                score
                                            </th>
                                            <th
                                                scope="col"
                                                class="lg:px-4 lg:py-3 border"
                                            >
                                                Grade
                                            </th>
                                            <th
                                                scope="col"
                                                class="lg:px-4 lg:py-3 border"
                                            >
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody
                                        class="divide-y divide-gray-200 dark:divide-gray-700"
                                    >
                                        <tr
                                            v-for="s in studentquiz.data"
                                            :key="s.id"
                                            class="hover:bg-gray-100"
                                        >
                                            <td
                                                class="px-6 py-4 border text-center text-sm font-medium text-gray-800 dark:text-gray-200"
                                            >
                                                {{
                                                    s.child_firstname +
                                                    " " +
                                                    s.child_lastname
                                                }}
                                            </td>
                                            <td
                                                class="px-6 py-4 border text-center text-sm text-gray-800 dark:text-gray-200"
                                            >
                                                {{ s.student_id }}
                                            </td>
                                            <td
                                                class="px-6 py-4 border text-center text-sm text-gray-800 dark:text-gray-200"
                                            >
                                                {{ s.category_name }}
                                            </td>
                                            <td
                                                class="px-6 py-4 border text-center text-sm text-gray-800 dark:text-gray-200"
                                            >
                                                {{ s.user_score }}
                                            </td>
                                            <td
                                                class="px-6 py-4 border text-center text-sm text-gray-800 dark:text-gray-200"
                                            >
                                                {{ s.grade }}
                                            </td>
                                            <td
                                                class="px-6 py-4 border text-center text-sm text-gray-800 dark:text-gray-200"
                                            >
                                                <Link
                                                    :href="
                                                        route(
                                                            'admin.getstudentdetails',
                                                            [
                                                                s.id,
                                                                s.s_category_id,
                                                            ]
                                                        )
                                                    "
                                                    class="p-2 text-blue-500 hover:text-blue-300 flex justify-center inline-block"
                                                >
                                                    <svg
                                                        class="w-5 h-5"
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
                                                            d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"
                                                        ></path>
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                                        ></path>
                                                    </svg>
                                                    Details
                                                </Link>
                                            </td>
                                            <!--         
                         <form method="post" @submit.prevent="submit">   
                        </form> -->
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <pagination
                                class="justify-end"
                                :links="studentquiz.links"
                            />
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</template>
<style scoped>
.hr {
    border: 2px solid rgb(184, 181, 181);
}
</style>
