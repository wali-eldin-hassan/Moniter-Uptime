<script setup>
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue'
import TextInput from '@/Components/TextInput.vue';

import { useForm } from '@inertiajs/vue3';


let form = useForm({
    'email': null,
})
</script>

<template>
    <div class="bg-white overflow-hidden rounded-lg shadow-sm p-4">
        <h2 class="font-semibold text-base text-gray-800 leading-tight">Email</h2>
        <form action="" class="flex items-start mt-4 space-x-2">
            <div class="grow">
                <InputLabel for="email" value="email" class="sr-only" />
                <TextInput id="email" type="email" class="block w-full h-9 text-sm "
                   />
                <InputError class="mt-2" :message="form.errors.email" />

            </div>

            <PrimaryButton>
                Add
            </PrimaryButton>
        </form>
    </div>
</template>