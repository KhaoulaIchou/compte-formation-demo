<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
export default {
  setup () {
    const form = useForm({
      avatar: null,
      login: null,
      email: null,
      password: null,
    })

    function storeTopic() {
      form.post('/comptes')
    }

    return { form, storeTopic }
  },
}
</script>

<template>
    <Head title="Comptes" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Comptes
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                

        <div class="">
          <div class="grid place-content-center mt-10">
          <form @submit.prevent="storeTopic" class="bg-white shadow-md m-2 p-2 rounded">
           <div class="sm:col-span-6">
                <label for="title" class="block text-sm font-medium text-gray-700">Utilisateur</label>
                <div class="mt-1">
                  <input type="file" id="image" name="image" @input="form.avatar = $event.target.files[0]"  class="block w-full transition duration-150 ease-in-out">
                </div>
            </div>
             <div class="sm:col-span-6">
                <label for="title" class="block text-sm font-medium text-gray-700">Login</label>
                <div class="mt-1">
                  <input type="text" id="title" name="title" v-model="form.login" class="block w-full transition duration-150 ease-in-out">
                </div>
            </div>
             <div class="sm:col-span-6">
                <label for="title" class="block text-sm font-medium text-gray-700">Email</label>
                <div class="mt-1">
                  <input type="text" id="title" name="title" v-model="form.email" class="block w-full transition duration-150 ease-in-out">
                </div>
            </div>
            <div class="sm:col-span-6">
                <label for="title" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                <div class="mt-1">
                  <input type="password" id="title" name="title" v-model="form.password" class="block w-full transition duration-150 ease-in-out">
                </div>
            </div>
            <div class="m-2 p-2">
                <button type="submit" class="px-4 py-2 bg-green-400 hover:bg-green-600 rounded-lg text-white">Enregister</button>
            </div>
          </form>
        </div>
        </div>
        <div class="flex m-2 p-2">
                   <Link href="/comptes" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white rounded">Back</Link>
          </div>
         </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

