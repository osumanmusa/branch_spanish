<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';

const logform = useForm({
    email: null,
    password: null,
});
function submit() {
  logform.post(route('login'), {
        onFinish: () => logform.reset('password', 'password_confirmation'),
    });
}

</script>
<template>

<li class="bg-blue-500">
  <div class="bg-blue-500 absolute p-6 border-indigo-300 rounded-lg w-[85vw] mx-auto ">

    <form @submit.prevent="submit" >
      
    <div class="mt-1 grid lg:grid-cols-1 gap-4">
      <div>
        <label for="name" class="text-lg text-white block mb-1 font-bold">Email</label>
        <input type="email" v-model="logform.email" id="email" class="bg-gray-100 border border-gray-200 rounded py-3 px-3 block focus:ring-blue-500 text-gray-700 w-full" placeholder="yourmail@provider.com" />
      </div>

      <div>
        <label for="email" class="text-lg text-white block mb-1 font-medium">Password</label>
        <input type="text" id="password" v-model="logform.password" class="bg-gray-100 border border-gray-200 rounded py-3 px-3 block focus:ring-blue-500 text-gray-700 w-full" placeholder="************" />
      </div>

    </div>

    <div class="space-x-4 mt-8">
      <button type="submit"  value="Submit" class="py-2 px-4 btn-log text-black rounded hover:bg-white hover:text-yellow-700 px-8 py-3 text-xl"><b>Log in</b></button>


    </div>
  </form>
</div>
    
</li>
</template>
<style scoped>
.btn-log{
  background: #F58C28!important;
}
</style>