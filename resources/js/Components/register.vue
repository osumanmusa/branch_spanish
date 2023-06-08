<script setup>
import { ref, onMounted } from "vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

const step = ref(1);
const errormsg = ref("");
const errormsg2 = ref("");
const errormsg3 = ref("");
const form = useForm({
    parent_firstname: "",
    parent_lastname: "",
    parent_residence: "",
    parent_name: "",
    parent_email: "",
    parent_password: "",
    child_firstname: "",
    child_lastname: "",
    child_school: "",
    child_email: "",
    child_password: "",
});

function validateStep1() {
    if (
        form.parent_firstname &&
        form.parent_lastname &&
        form.parent_residence
    ) {
        step.value = 2;
    } else {
        errormsg.value = "Please fill in all required fields.";
    }
}

function validateStep2() {
    if (form.parent_name && form.parent_email && form.parent_password) {
        step.value = 3;
    } else {
        errormsg2.value = "Please fill in all required fields.";
    }
}

function submit() {
    if (
        form.child_firstname &&
        form.child_lastname &&
        form.child_school &&
        form.child_email &&
        form.child_password
    ) {
        form.post(route("register"), {
            onFinish: () => form.reset("password", "password_confirmation"),
        });
    } else {
        errormsg3.value = "Please fill in all required fields.";
    }
}
</script>
<template>
    <li class="">
        <div
            class="bg-color absolute p-6 border-indigo-300 rounded-lg w-[85vw] mx-auto"
        >
            <form @submit.prevent="submit">
                <TransitionGroup name="list">
                    <div
                        id="step1"
                        v-show="step == 1"
                        :key="step"
                        class="form-step form-step-active"
                    >
                        <div class="space-x-4">
                            <button
                                class="px-8 py-3 btn-log text-black rounded hover:bg-white hover:text-yellow-700 text-xl"
                            >
                                <b>Enter Details of Parent</b>
                            </button>
                        </div>
                        <div class="mt-4 grid lg:grid-cols-1 gap-4">
                            <div>
                                <label
                                    for="name"
                                    class="text-lg text-white block mb-1 font-bold"
                                    >Parent First Name</label
                                >
                                <input
                                    type="text"
                                    id="parent_firstname"
                                    v-model="form.parent_firstname"
                                    class="bg-gray-100 border border-gray-200 rounded py-3 px-3 block focus:ring-blue-500 text-gray-700 w-full"
                                    placeholder="Enter Parent First name"
                                    required
                                />
                                <span
                                    v-if="errormsg"
                                    class="text-red-600 bg-white"
                                    ><span class="text-red-700">*</span>
                                    {{ errormsg
                                    }}<span class="text-red-700">*</span></span
                                >
                            </div>

                            <div>
                                <label
                                    for="email"
                                    class="text-lg text-white block mb-1 font-medium"
                                    >Parent Last Name</label
                                >
                                <input
                                    type="text"
                                    id="parent_lastname"
                                    v-model="form.parent_lastname"
                                    class="bg-gray-100 border border-gray-200 rounded py-3 px-3 block focus:ring-blue-500 text-gray-700 w-full"
                                    placeholder="Enter Parent Last name"
                                    required
                                />
                                <span
                                    v-if="errormsg"
                                    class="text-red-600 bg-white"
                                    ><span class="text-red-700">*</span>
                                    {{ errormsg
                                    }}<span class="text-red-700">*</span></span
                                >
                            </div>

                            <div>
                                <label
                                    for="email"
                                    class="text-lg text-white block mb-1 font-medium"
                                    >Place of Residence</label
                                >
                                <input
                                    type="text"
                                    id="parent_residence"
                                    v-model="form.parent_residence"
                                    class="bg-gray-100 border border-gray-200 rounded py-3 px-3 block focus:ring-blue-500 text-gray-700 w-full"
                                    placeholder="Enter Residence"
                                    required
                                />
                                <span
                                    v-if="errormsg"
                                    class="text-red-600 bg-white"
                                    ><span class="text-red-700">*</span>
                                    {{ errormsg
                                    }}<span class="text-red-700">*</span></span
                                >
                            </div>
                            <div>
                                <button
                                    @click.prevent="validateStep1"
                                    class="px-8 py-3 btn-log text-black rounded hover:bg-white hover:text-yellow-700 text-xl"
                                >
                                    <b>Next</b>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div id="step2" v-show="step == 2" :key="step">
                        <div class="space-x-4">
                            <button
                                type="submit"
                                class="px-8 py-3 btn-log text-black rounded hover:bg-white hover:text-yellow-700 text-xl"
                            >
                                <b> Create Account for Parent/Care taker</b>
                            </button>
                        </div>
                        <div class="mt-4 grid lg:grid-cols-1 gap-4">
                            <div>
                                <label
                                    for="name"
                                    class="text-lg text-white block mb-1 font-bold"
                                    >Username</label
                                >
                                <input
                                    type="text"
                                    id="parent_name"
                                    v-model="form.parent_name"
                                    class="bg-gray-100 border border-gray-200 rounded py-3 px-3 block focus:ring-blue-500 text-gray-700 w-full"
                                    placeholder="Enter Parent username"
                                    required
                                />
                                <span
                                    v-if="errormsg2"
                                    class="text-red-600 bg-white"
                                    ><span class="text-red-700">*</span>
                                    {{ errormsg2
                                    }}<span class="text-red-700">*</span></span
                                >
                            </div>

                            <div>
                                <label
                                    for="email"
                                    class="text-lg text-white block mb-1 font-medium"
                                    >Email</label
                                >
                                <input
                                    type="email"
                                    id="parent_email"
                                    v-model="form.parent_email"
                                    class="bg-gray-100 border border-gray-200 rounded py-3 px-3 block focus:ring-blue-500 text-gray-700 w-full"
                                    placeholder="Enter Parent Email"
                                    required
                                />
                                <span
                                    v-if="errormsg2"
                                    class="text-red-600 bg-white"
                                    ><span class="text-red-700">*</span>
                                    {{ errormsg2
                                    }}<span class="text-red-700">*</span></span
                                >
                            </div>

                            <div>
                                <label
                                    for="email"
                                    class="text-lg text-white block mb-1 font-medium"
                                    >Password</label
                                >
                                <input
                                    type="text"
                                    id="parent_password"
                                    v-model="form.parent_password"
                                    class="bg-gray-100 border border-gray-200 rounded py-3 px-3 block focus:ring-blue-500 text-gray-700 w-full"
                                    placeholder="Enter Parent Password"
                                    required
                                />
                                <span
                                    v-if="errormsg2"
                                    class="text-red-600 bg-white"
                                    ><span class="text-red-700">*</span>
                                    {{ errormsg2
                                    }}<span class="text-red-700">*</span></span
                                >
                            </div>
                            <div>
                                <button
                                    @click.prevent="validateStep2"
                                    class="px-8 py-3 btn-log text-black rounded hover:bg-white hover:text-yellow-700 text-xl"
                                >
                                    <b>Next</b>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div id="step3" v-show="step == 3" :key="step">
                        <div class="space-x-4">
                            <button
                                type="submit"
                                class="px-8 py-3 btn-log text-black rounded hover:bg-white hover:text-yellow-700 text-xl"
                            >
                                <b>Enter Details of Child</b>
                            </button>
                        </div>
                        <div class="mt-4 grid lg:grid-cols-1 gap-4">
                            <div>
                                <label
                                    for="name"
                                    class="text-lg text-white block mb-1 font-bold"
                                    >Child's First Name</label
                                >
                                <input
                                    type="text"
                                    id="child_firstname"
                                    v-model="form.child_firstname"
                                    class="bg-gray-100 border border-gray-200 rounded py-3 px-3 block focus:ring-blue-500 text-gray-700 w-full"
                                    placeholder="Enter Child First name"
                                    required
                                />
                            </div>

                            <div>
                                <label
                                    for="email"
                                    class="text-lg text-white block mb-1 font-medium"
                                    >Child's Last Name</label
                                >
                                <input
                                    type="text"
                                    id="child_lastname"
                                    v-model="form.child_lastname"
                                    class="bg-gray-100 border border-gray-200 rounded py-3 px-3 block focus:ring-blue-500 text-gray-700 w-full"
                                    placeholder="Enter Child Last name"
                                    required
                                />
                            </div>

                            <div>
                                <label
                                    for="email"
                                    class="text-lg text-white block mb-1 font-medium"
                                    >Email</label
                                >
                                <input
                                    type="email"
                                    id="child_email"
                                    v-model="form.child_email"
                                    class="bg-gray-100 border border-gray-200 rounded py-3 px-3 block focus:ring-blue-500 text-gray-700 w-full"
                                    placeholder="Enter Child Email"
                                    required
                                />
                            </div>

                            <div>
                                <label
                                    for="email"
                                    class="text-lg text-white block mb-1 font-medium"
                                    >Password</label
                                >
                                <input
                                    type="text"
                                    id="child_password"
                                    v-model="form.child_password"
                                    class="bg-gray-100 border border-gray-200 rounded py-3 px-3 block focus:ring-blue-500 text-gray-700 w-full"
                                    placeholder="Enter Child Password"
                                    required
                                />
                            </div>

                            <div>
                                <label
                                    for="email"
                                    class="text-lg text-white block mb-1 font-medium"
                                    >School of Child</label
                                >
                                <input
                                    type="text"
                                    id="child_school"
                                    v-model="form.child_school"
                                    class="bg-gray-100 border border-gray-200 rounded py-3 px-3 block focus:ring-blue-500 text-gray-700 w-full"
                                    placeholder="School of Child"
                                    required
                                />
                            </div>
                            <div>
                                <button
                                    class="px-8 py-3 btn-log text-black rounded hover:bg-white hover:text-yellow-700 text-xl"
                                >
                                    <b>Submit</b>
                                </button>
                            </div>
                        </div>
                    </div>
                </TransitionGroup>
            </form>
        </div>
    </li>
</template>

<style></style>
