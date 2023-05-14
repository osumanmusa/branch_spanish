<script setup>
import {ref ,onMounted} from 'vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const step= ref(1);

const form = useForm({
  parent_firstname: '',
  parent_lastname: '',
  parent_residence: '',
  parent_name: '',
  parent_email: '',
  parent_password: '',
  child_firstname: '',
  child_lastname: '',
  child_school: '',
});
function submit() {
  form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
}

</script>
<template>
 <li class="">


  <div class="absolute p-6 border-indigo-300 rounded-lg w-[85vw] mx-auto ">
  <form @submit.prevent="submit">
<TransitionGroup name="list">
<div id="step1" v-show="step == 1" :key = "step" class="form-step form-step-active">
    <div class="space-x-4 ">
        <button type="submit" class="py-2 px-4 bg-yellow-700 text-white rounded hover:bg-white hover:text-yellow-700 active:bg-warning-700 disabled:opacity-50">Enter Details of Parent</button>


    </div>
    <div class="mt-4 grid lg:grid-cols-1 gap-4">
      <div>
        <label for="name" class="text-sm text-white block mb-1 font-bold">Parent First Name</label>
        <input type="text" id="parent_firstname" v-model="form.parent_firstname"  class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 text-gray-700 w-full" placeholder="Enter your name" />
      </div>

      <div>
        <label for="email" class="text-sm text-white block mb-1 font-medium">Parent Last Name</label>
        <input type="text" id="parent_lastname" v-model="form.parent_lastname"   class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 text-gray-700 w-full" placeholder="yourmail@provider.com" />
      </div>

      <div>
        <label for="email" class="text-sm text-white block mb-1 font-medium">Place of Residence</label>
        <input type="text" id="parent_residence" v-model="form.parent_residence"  class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 text-gray-700 w-full" placeholder="yourmail@provider.com" />
      </div>
      <div>
        <button @click.prevent="step=2" class="py-2 px-4 bg-yellow-500 text-white rounded hover:bg-white hover:text-yellow-700 active:bg-warning-700 disabled:opacity-50">Next</button>
      </div>

    </div>


</div>
<div id="step2" v-show="step==2"  :key = "step" class="py-2 mt-8">
    <div class="space-x-4 ">
        <button type="submit" class="py-2 px-4 bg-yellow-700 text-white rounded hover:bg-white hover:text-yellow-700 active:bg-warning-700 disabled:opacity-50">Create Account for Parent/Care taker</button>


    </div>
    <div class="mt-4 grid lg:grid-cols-1 gap-4">
      <div>
        <label for="name" class="text-sm text-white block mb-1 font-bold">Username</label>
        <input type="text" id="parent_name" v-model="form.parent_name" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 text-gray-700 w-full" placeholder="Enter your name" />
      </div>

      <div>
        <label for="email" class="text-sm text-white block mb-1 font-medium">Email</label>
        <input type="email" id="parent_email" v-model="form.parent_email"  class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 text-gray-700 w-full" placeholder="yourmail@provider.com" />
      </div>

      <div>
        <label for="email" class="text-sm text-white block mb-1 font-medium">Password</label>
        <input type="text" id="parent_password" v-model="form.parent_password"  class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 text-gray-700 w-full" placeholder="yourmail@provider.com" />
      </div>
      <div>
        <button @click.prevent="step=3" class="py-2 px-4 bg-yellow-500 text-white rounded hover:bg-white hover:text-yellow-700 active:bg-warning-700 disabled:opacity-50">Next</button>
      </div>

    </div>


</div>
<div id="step3" v-show="step==3"  :key = "step" class="py-2 mt-8">
    <div class="space-x-4 ">
        <button type="submit" class="py-2 px-4 bg-yellow-700 text-white rounded hover:bg-white hover:text-yellow-700 active:bg-warning-700 disabled:opacity-50">Enter Details of Child</button>


    </div>
    <div class="mt-4 grid lg:grid-cols-1 gap-4">
      <div>
        <label for="name" class="text-sm text-white block mb-1 font-bold">Child's First Name</label>
        <input type="text" id="child_firstname" v-model="form.child_firstname" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 text-gray-700 w-full" placeholder="Enter your name" />
      </div>

      <div>
        <label for="email" class="text-sm text-white block mb-1 font-medium">Child's Last Name</label>
        <input type="text" id="child_lastname"  v-model="form.child_lastname" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 text-gray-700 w-full" placeholder="yourmail@provider.com" />
      </div>

      <div>
        <label for="email" class="text-sm text-white block mb-1 font-medium">School of Child</label>
        <input type="text" id="child_school"  v-model="form.child_school" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 text-gray-700 w-full" placeholder="yourmail@provider.com" />
      </div>
      <div>
        <button class="py-2 px-4 bg-yellow-500 text-white rounded hover:bg-white hover:text-yellow-700 active:bg-warning-700 disabled:opacity-50">Submit</button>
      </div>

    </div>



</div>
</TransitionGroup>
</form>

    </div>


</li>

</template>

<style >

</style>

