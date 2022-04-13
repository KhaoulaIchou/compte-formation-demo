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
    formation: Object,
    image: String,
    fichier: String
})
const form = useForm({
      image: null,
      fichier: null,
      designation: props.formation.designation,
      description: props.formation.description,
      compte: props.formation.compte_id,
    })
function updateTopic() {
      Inertia.post(`/formations/${props.formation.id}`,{
          _method: 'put',
          designation: form.designation,
          description: form.description,
          image: form.image,
          fichier: form.fichier,
          compte_id: form.compte,
      })
    }
    
    //return { form, updateTopic }
</script>

<template>
    <Head title="Formations" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Formations
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                

        <div class="">
          <div class="grid place-content-center mt-10">
          <form @submit.prevent="updateTopic" class="bg-white shadow-md m-2 p-2 rounded">
            <div class="sm:col-span-6">
                <label for="title" class="block text-sm font-medium text-gray-700">Formation</label>
                <div class="mt-1">
                  <input type="file" id="image" name="image" @input="form.image = $event.target.files[0]"  class="block w-full transition duration-150 ease-in-out">
                </div>
            </div>
             <div class="sm:col-span-6">
                <label for="title" class="block text-sm font-medium text-gray-700">Designation</label>
                <div class="mt-1">
                  <input type="text" id="title" name="title" v-model="form.designation" class="block w-full transition duration-150 ease-in-out">
                </div>
            </div>
             <div class="sm:col-span-6">
                <label for="title" class="block text-sm font-medium text-gray-700">Description</label>
                <div class="mt-1">
                  <input type="text" id="title" name="title" v-model="form.description" class="block w-full transition duration-150 ease-in-out">
                </div>
            </div>
            <div class="sm:col-span-6">
                <label for="title" class="block text-sm font-medium text-gray-700">Fichier</label>
                <div class="mt-1">
                  <input type="file" id="fichier" name="fichier" @input="form.fichier = $event.target.files[0]"  class="block w-full transition duration-150 ease-in-out">
                </div>
            </div>
            <div class="sm:col-span-6">
                <label for="title" class="block text-sm font-medium text-gray-700">Compte</label>
                <div class="mt-1">
                  <input type="text" id="title" name="title" v-model="form.compte" class="block w-full transition duration-150 ease-in-out">
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

