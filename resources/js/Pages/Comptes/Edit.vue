<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, Link, useForm} from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia';
/*export default {
  setup () {
    const props = defineProps({
    topic: Object,
    image: String
})
    const form = useForm({
      name: props.topic.name,
      image: null,
    })

    function updateTopic() {
      Inertia.post(`/topics/${props.topic.id}`,{
          method: 'put',
          name: form.name,
          image: form.image
      })
    }
    
    return { form, updateTopic }
  },
}*/
const props = defineProps({
    compte: Object,
    avatar: String
})
const form = useForm({
      avatar: null,
      login: props.compte.login,
      email: props.compte.email,
      password: props.compte.password,
    })
function updateTopic() {
      Inertia.post(`/comptes/${props.compte.id}`,{
          _method: 'put',
          login: form.login,
          email: form.email,
          avatar: form.avatar,
          password: form.password,
      })
    }
    
    //return { form, updateTopic }
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
          <form @submit.prevent="updateTopic" class="bg-white shadow-md m-2 p-2 rounded">
            <div class="sm:col-span-6">
                <label for="title" class="block text-sm font-medium text-gray-700">Utilisateur</label>
                <div class="m-2 p-2">
                    <img :src="avatar" class="w-32 h-32"/>
                </div>
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
                <button type="submit" class="px-4 py-2 bg-green-400 hover:bg-green-600 rounded-lg text-white">Modifier</button>
            </div>                     
          </form>
        </div>
        </div>
        <div class="flex m-2 p-2">
                   <Link href="/topics" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white rounded">Retour</Link>
          </div>
         </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

