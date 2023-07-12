<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";
import AdminNavbar from "../../../Components/Admin/AdminNavbar.vue";
import AdminSidebar from "../../../Components/Admin/AdminSidebar.vue";

const props = defineProps({
    categories: Object,
    message: String,
});
const questions = ref([{}]);
const selected = ref("A");

const form = useForm({
    questions: [
        {
            quiz: "",
            answer1: "",
            answer2: "",
            answer3: "",
            answer4: "",
            answer: "",
        },
    ],
    category: "",
});

const submit = () => {
    form.post(route("admin.quiz.store"));
};
function addForm() {
    questions.value.push({
        quiz: "",
        answer1: "",
        answer2: "",
        answer3: "",
        answer4: "",
        answer: "",
    });
    form.questions.push({
        quiz: "",
        answer1: "",
        answer2: "",
        answer3: "",
        answer4: "",
        answer: "",
    });
}
function removeForm() {
    questions.value.pop();
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
                            <div class="grid gap-4 mb-3 md:grid-cols-2 p-3">
                                <div>
                                    <label
                                        for="input-label"
                                        class="text-sm mb-2 dark:text-white"
                                        >Flash Cards Category</label
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
                            </div>
                            <div v-for="(question, i) in questions" :key="i">
                                <div class="p-3">
                                    <label
                                        for="input-label"
                                        class="block text-sm mb-2 dark:text-white"
                                        >Question
                                    </label>
                                    <input
                                        type="text"
                                        id="question"
                                        @input="
                                            form.questions[i].quiz =
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
                                        >Possible Answer A</label
                                    >
                                    <input
                                        type="text"
                                        id="answer1"
                                        @input="
                                            form.questions[i].answer1 =
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
                                        >Possible Answer B</label
                                    >
                                    <input
                                        type="text"
                                        id="answer2"
                                        @input="
                                            form.questions[i].answer2 =
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
                                        >Possible Answer C</label
                                    >
                                    <input
                                        type="text"
                                        id="answer3"
                                        @input="
                                            form.questions[i].answer3 =
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
                                        >Possible Answer D</label
                                    >
                                    <input
                                        type="text"
                                        id="answer4"
                                        @input="
                                            form.questions[i].answer4 =
                                                $event.target.value
                                        "
                                        class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                        placeholder=""
                                    />
                                </div>
                                <div class="grid gap-4 mb-3 md:grid-cols-2 p-3">
                                    <div>
                                        <label
                                            for="input-label"
                                            class="text-sm mb-2 dark:text-white"
                                            >Correct Answer (Enter Answer
                                            Letter)</label
                                        >
                                        <select
                                            class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                            v-model="form.questions[i].answer"
                                        >
                                            <option
                                                :value="
                                                    form.questions[i].answer1
                                                "
                                            >
                                                {{ form.questions[i].answer1 }}
                                            </option>
                                            <option
                                                :value="
                                                    form.questions[i].answer2
                                                "
                                            >
                                                {{ form.questions[i].answer2 }}
                                            </option>
                                            <option
                                                :value="
                                                    form.questions[i].answer3
                                                "
                                            >
                                                {{ form.questions[i].answer3 }}
                                            </option>
                                            <option
                                                :value="
                                                    form.questions[i].answer4
                                                "
                                            >
                                                {{ form.questions[i].answer4 }}
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-4 mt-4">
                                    <br />
                                    <hr />
                                    <br />
                                    <br />
                                </div>
                            </div>
                            <div class="lg:right-0 mb-3 p-3">
                                <Button
                                    type="button"
                                    @click.prevent="addForm"
                                    class="py-3 px-4 text-right gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800"
                                >
                                    Add Another Question
                                </Button>
                                <Button
                                    type="button"
                                    @click.prevent="removeForm"
                                    class="card-submit py-3 px-4 text-right gap-2 rounded-md border border-transparent font-semibold bg-red-500 text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800"
                                >
                                    Remove
                                </Button>
                            </div>
                            <div class="lg:right-0 mb-3 p-3">
                                <button
                                    class="card-submit py-3 px-4 text-right gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800"
                                    :disabled="form.processing">
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
