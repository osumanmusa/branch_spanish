<script setup>
import { Head, useForm } from '@inertiajs/vue3';

const props = defineProps({
    email: String,
    token: String,
});

const resetform = useForm({
    token: props.token,
    email: props.email,
});

const submit = () => {
    resetform.post(route('password.store'), {
        onFinish: () => resetform.reset('password', 'password_confirmation'),
    });
};
</script>
  
<template>
 <li class="bg-color">

 
  <div class=" bg-color absolute p-6 border-indigo-300 rounded-lg w-[85vw] mx-auto ">
  <div class="space-x-4">
      <button type="submit" class="px-8 py-3 btn-log text-black  rounded hover:bg-white hover:text-yellow-700 text-xl"><b>Enter Parents Email </b></button>
  <form @submit.prevent="submit" >
    <div class="mt-1 grid lg:grid-cols-1 gap-4">
      <div>
        <label for="name" class="text-lg text-white block mb-2  font-bold ">Parent Email Address</label>
        <input type="email" id="email" v-model="resetform.email" class="bg-gray-100 border border-gray-200 rounded py-3 px-3 block focus:ring-blue-500 text-gray-700 w-full" placeholder="Enter your name" />
      </div>
    </div>
    <div class="mt-4 grid lg:grid-cols-1 gap-4">
        <p class="text-lg text-yellow-500 block mb-2  ">Password reset instruction would be sent to parent email address</p>
        
    </div>

    <div class="space-x-4 mt-8">
      <button type="submit" class="px-8 py-3 btn-log text-black rounded hover:bg-white hover:text-yellow-700 text-xl"><b> Reset </b> </button>


    </div>
  </form>

    </div>
          

    </div>
 </li>
</template>
<style>
</style>