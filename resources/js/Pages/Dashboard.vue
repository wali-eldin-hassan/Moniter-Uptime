<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import SiteSelector from '@/Components/SiteSelector.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';


let props = defineProps({
    site: Object,
    sites: Array,
    endpointsFrequencies: Object,

});

let form = useForm({
    location: null,
    frequency: props.endpointsFrequencies.data[0].frequency
})

const storeEndPoint = () => {
    form.post(`/sites/${props.site.data.id}/endpoints`, {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
        }

    })
}
</script>

<template>
    <Head title="Dashboard" />
    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ site.data.domain }}
                </h2>
                <div>
                    <SiteSelector :sites="sites.data" />
                </div>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h2 class="font-semibold text-lg text-gray-800 leading-tight"> New Endpoint</h2>
                <form @submit.prevent="storeEndPoint()"
                    class=" bg-white overflow-hidden shadow-sm sml:rounded-lg flex items-center p-3 mt-4 space-x-2">
                    <div class="grow">
                        <InputLabel for="location" value="Location" class="sr-only" />
                        <TextInput id="location" type="text" class="block w-full h-9 text-sm" placeholder="e.g/pricing"
                            v-model="form.location" />
                        <InputError class="mt-2" :message="form.errors.location" />

                    </div>
                    <div>
                        <InputLabel for="frequency" value="Frequency" class="sr-only" />
                        <select v-model="form.frequency" name="frequency" id="frequency"
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md h-9 leading-none text-sm">
                            <option :value="frequency.frequency" v-for="frequency in endpointsFrequencies.data"
                                :key="frequency.frequency">
                                {{ frequency.label }}
                            </option>
                        </select>
                    </div>
                    <PrimaryButton>
                        Add
                    </PrimaryButton>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
