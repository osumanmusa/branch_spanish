<script setup>
import { Head, useForm } from '@inertiajs/vue3';

const props = defineProps({
    email: String,
    token: String,
});

const resetform = useForm({
    token: props.token,
    email: props.email,
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('password.store'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>
  
<template>
 <li class="">

 
  <div class="absolute p-6  mt-2 border-indigo-300 rounded-lg w-[85vw] mx-auto ">
  <div class="space-x-4 mt-8">
      <button type="submit" class="py-2 px-4 bg-yellow-700 text-white rounded hover:bg-white hover:text-yellow-700 active:bg-warning-700 disabled:opacity-50">Enter Parents Email</button>
  <form>
    <div class="mt-4 grid lg:grid-cols-1 gap-4">
      <div>
        <label for="name" class="text-lg text-white block mb-2  font-bold ">Parent Email Address</label>
        <input type="email" id="email" v-model="resetform.email" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 text-gray-700 w-full" placeholder="Enter your name" />
      </div>
    </div>
    <div class="mt-4 grid lg:grid-cols-1 gap-4">
        <p class="text-lg text-yellow-500 block mb-2  ">Password reset instruction would be sent to parent email address</p>
        
    </div>

    <div class="space-x-4 mt-8">
      <button type="submit" class="py-2 px-4 bg-yellow-500 text-white rounded hover:bg-white hover:text-yellow-700 active:bg-warning-700 disabled:opacity-50">Log in</button>


    </div>
  </form>

    </div>
          

    </div>
 </li>
</template>
