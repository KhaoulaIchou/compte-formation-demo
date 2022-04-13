<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
const props = defineProps({
    comptes: Array
})
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
                <div class="flex justify-end m-2 p-2">
                   <Link href="/comptes/create" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white rounded">Créer</Link>
                </div>
               
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
             <th scope="col" class="relative px-6 py-3">Utilisateur</th>
             <th scope="col" class="relative px-6 py-3">Login</th>
             <th scope="col" class="relative px-6 py-3">Email</th>
             <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Modifier</span>
             </th>
           </tr>
          </thead>
           
           <tbody class="bg-white divide-y divide-gray-200">
              <tr v-for="compte in comptes" :key="compte.id">
             <td class="px-6 py-4 whitespace-nowrap">
                <img :src="compte.avatar" class="w-12 h-12 rounded">
             </td>
             <td class="px-6 py-4 whitespace-nowrap">{{ compte.login }}</td>
             <td class="px-6 py-4 whitespace-nowrap">{{ compte.email }}</td>
             <td class="flex space-x-4 px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
               <Link :href="`/comptes/${compte.id}`" method="delete" as="button" type="button" class="text-red-600 hover:text-indigo-900">Supprimer</Link>
                <Link :href="`/comptes/${compte.id}/edit`" class="text-indigo-600 hover:text-indigo-900">Modifier</Link>
             </td>
           </tr>
           </tbody>
          
        </table>
            </div>
        </div>
        <!---->
    </BreezeAuthenticatedLayout>
</template>

