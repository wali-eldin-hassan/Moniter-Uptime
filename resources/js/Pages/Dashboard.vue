<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import SiteSelector from '@/Components/SiteSelector.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import EndPoint from '@/Components/EndPoint.vue';


let props = defineProps({
    site: Object,
    sites: Array,
    endpointsFrequencies: Object,
    endpoints:Object,

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

                <div class="mt-8">
                    <h2 class="font-semibold text-lg text-gray-800 leading-tight">
                        currently monitring ({{ endpoints.data.length }})
                    </h2>
                    <section class="container px-4 mx-auto">


                        <div class="flex flex-col mt-6">
                            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                    <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">

                                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                            <thead class="bg-gray-50 dark:bg-gray-800">
                                                <tr>
                                                    <th scope="col"
                                                        class="py-3.5 px-4 text-sm font-semibold text-left rtl:text-right text-gray-700 dark:text-gray-500">
                                                            <span>Location</span>

                                                    </th>

                                                    <th scope="col"
                                                        class="px-4 py-3.5 text-sm font-semibold text-left rtl:text-right text-gray-700 dark:text-gray-400">
                                                        Frequency
                                                    </th>

                                                    <th scope="col"
                                                        class="px-4 py-3.5 text-sm font-semibold text-left rtl:text-right text-gray-700 dark:text-gray-400">
                                                        Last Check
                                                    </th>

                                                    <th scope="col"
                                                        class="px-4 py-3.5 text-sm font-semibold text-left rtl:text-right text-gray-700 dark:text-gray-400">
                                                        Last Status</th>

                                                    <th scope="col"
                                                        class="px-4 py-3.5 text-sm font-semibold text-left rtl:text-right text-gray-700 dark:text-gray-400">
                                                        Uptime</th>

                                                        <th></th>
                                                        <th></th>
                                                 

                                                </tr>
                                            </thead>
                                            <tbody
                                                class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900" v-for="endpoint in endpoints.data" :key="endpoint.id">
                                                <EndPoint  :endpoint="endpoint"  :endpointsFrequencies ="endpointsFrequencies" />
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>


                </section>

            </div>
        </div>
    </div>
</AuthenticatedLayout>
</template>
