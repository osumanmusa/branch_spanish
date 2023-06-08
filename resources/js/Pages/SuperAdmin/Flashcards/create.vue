<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";
import AdminNavbar from "../../../Components/SuperAdmin/AdminNavbar.vue";
import AdminSidebar from "../../../Components/SuperAdmin/AdminSidebar.vue";

const props = defineProps({
    categories: Object,
    message: String,
});

const flashcards = ref([{}]);
const form = useForm({
    category: "",
    flashcards: [
        {
            title: "",
            flashcard: "",
            backcontent: "",
            frontcontent: "",
        },
    ],
});

const submit = () => {
    form.post(route("superadmin.flashcard.store"));
};
function addForm() {
    flashcards.value.push({
        title: "",
        flashcard: "",
        backcontent: "",
        frontcontent: "",
    });
    form.flashcards.push({
        title: "",
        flashcard: "",
        backcontent: "",
        frontcontent: "",
    });
}
function removeForm() {
    flashcards.value.pop();
    form.questions.pop();
}
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
                            <div class="p-3">
                                <label
                                    for="input-label"
                                    class="block text-sm mb-2 dark:text-white"
                                    >Flashcard Category</label
                                >
                                <select
                                    id="category"
                                    v-model="form.category"
                                    class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                >
                                    <option
                                        v-for="c in categories"
                                        :key="c.id"
                                        :value="c.id"
                                    >
                                        {{ c.category_name }}
                                    </option>
                                </select>
                            </div>

                            <div v-for="(flashcard, i) in flashcards" :key="i">
                                <div class="p-3">
                                    <p><b>Content</b></p>
                                </div>
                                <div class="p-3">
                                    <label
                                        for="input-label"
                                        class="block text-sm mb-2 dark:text-white"
                                        >Flash card Title</label
                                    >
                                    <input
                                        type="text"
                                        id="title"
                                        @input="
                                            form.flashcards[i].title =
                                                $event.target.value
                                        "
                                        class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                        placeholder="Enter Title"
                                    />
                                </div>
                                <div class="p-3">
                                    <label
                                        for="input-label"
                                        class="block text-sm mb-2 dark:text-white"
                                        >say it in a sentence</label
                                    >
                                    <input
                                        type="text"
                                        id="flashcard"
                                        @input="
                                            form.flashcards[i].flashcard =
                                                $event.target.value
                                        "
                                        class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                        placeholder=""
                                    />
                                </div>
                                <div class="p-3">
                                    <label
                                        for="input-label"
                                        class="block text-sm mb-2 dark:text-white"
                                        >Flash card front content</label
                                    >
                                    <input
                                        type="text"
                                        id="frontcontent"
                                        @input="
                                            form.flashcards[i].frontcontent =
                                                $event.target.value
                                        "
                                        class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                        placeholder=""
                                    />
                                </div>
                                <div class="p-3">
                                    <label
                                        for="input-label"
                                        class="block text-sm mb-2 dark:text-white"
                                        >Flash card back content</label
                                    >
                                    <input
                                        type="text"
                                        id="backcontent"
                                        @input="
                                            form.flashcards[i].backcontent =
                                                $event.target.value
                                        "
                                        class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                        placeholder=""
                                    />
                                </div>
                                
                            <div class="mb-4 mt-4">
                                <br/>
                                <hr/>
                                <br/>
                                <br/>
                            </div>
                            </div>
                            <div class="lg:right-0 mb-3 p-3">
                                <Button
                                    type="button"
                                    @click.prevent="addForm"
                                    class="py-3 px-4 text-right gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800"
                                >
                                    Add Another Flashcard
                                </Button>
                                <Button
                                    type="button"
                                    @click.prevent="removeForm"
                                    class="card-submit py-3 px-4 text-right gap-2 rounded-md border border-transparent font-semibold bg-red-500 text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800"
                                >
                                    Remove
                                </Button>
                            </div>
                            <div class="lg:px-16 lg:right-0">
                                <button
                                    class="card-submit py-3 px-4 text-right gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800"
                                >
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
<style>
.card-submit {
    float: right;
}
</style>
