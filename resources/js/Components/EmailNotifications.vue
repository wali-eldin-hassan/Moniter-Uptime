<script setup>
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue'
import TextInput from '@/Components/TextInput.vue';

import { useForm } from '@inertiajs/vue3';


let prpos = defineProps({
    site: Object,
    emails: Array
});


let form = useForm({
    notification_emails: null,

});


let sendEmail = () => {
    form.post(`/sites/${prpos.site.data.id}/notification/emails`, {
        preserveScroll: true,
        onSuccess: () => {
            form.reset()
        },
    });
}
</script>

<template>
    <div class="bg-white overflow-hidden rounded-lg shadow-sm p-4">
        <h2 class="font-semibold text-base text-gray-800 leading-tight">Email</h2>
        <form @submit.prevent="sendEmail()" class="flex items-start mt-4 space-x-2">
            <div class="grow">
                <InputLabel for="notification_emails" value="email" class="sr-only" />
                <TextInput id="notification_emails" type="email" class="block w-full h-9 text-sm "
                    palceholder="example@example.com" v-model="form.notification_emails" />
                <InputError class="mt-2" :message="form.errors.notification_emails" />

            </div>

            <PrimaryButton>
                Add
            </PrimaryButton>
        </form>

        <div class="mt-6" v-if="emails.length">
            <ul class="space-y-2">
                <li class="flex items-center justify-between" v-for="email in emails" :key="email">
                    <span class="text-sm mt-1">
                        {{ email }}
                    </span>

                    <button @click="form.delete(`/sites/${site.data.id}/notification/emails?email=${email}`,{
                        preserveScroll:true,
                    })">
                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>

                </li>

            </ul>
        </div>
    </div>
</template>