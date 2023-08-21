<script setup>
import { Link, useForm } from '@inertiajs/vue3'
import Modal from '../Components/Modal.vue'
import { ref } from 'vue';
import TextInput from '../Components/TextInput.vue';
import InputLabel from '../Components/InputLabel.vue';
import PrimaryButton from '../Components/PrimaryButton.vue';
import InputError from '@/Components/InputError.vue';


defineProps({
    sites: Array
})

let form = useForm({
    domain: '',
});
let createSite = () => {

    form.post('/sites', {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
            showNewModal.value = false
        }
    });

}


let showNewModal = ref(false);
</script>
<template lang="">
    <VDropdown :distance="10">
        <button  class="flex items-center space-x-2 text-sm ">
            <span class="text-gray-500 hover:text-gray-700">Select Site</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
            </svg>

        </button> 
        <template #popper="{hide}">
        <ul class="-space-x-1">
            <li v-for="site in sites" :key="site.id">
                <Link :href="`/dashboard/${site.id}`" class="px-4 py-2 hover:bg-gray-100 block text-sm text-gray-500 hover:text-gray-700">{{site.domain}}</Link>
            </li>
        
            <li>
                <button @click="showNewModal = true;hide();" class="block w-full text-left px-4 py-2 hover:bg-gray-100 text-indigo-500 font-bold text-sm"> Add Site</button>
            </li>
        </ul>
        </template>
    </VDropdown>
    
    <Modal @close="showNewModal = false" maxWidth="lg" v-model ="showNewModal" :show="showNewModal" >
        <div class="p-4">
            <div class="flex items-center justify-between">
                <h3 class="text-gray-800 font-medium">Content</h3>

                <button @click="showNewModal = false" class="text-gray-500 focus:outline-none hover:bg-gray-100 p-1 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>

                </button>
                  
            </div>
              <form class="mt-8" @submit.prevent="createSite()">
                <InputLabel for="domain" value="Domain" class="sr-only" />
                   <TextInput v-model="form.domain" type="text" id="domain"  class="block w-full h-9 text-sm" placeholder="google.com"/>  
                 <InputError class="mt-2" :message="form.errors.domain" />
                   <PrimaryButton class="mt-6 ">
                    Add
                   </PrimaryButton>    
              </form>

        </div>
    </Modal>
 </template>


