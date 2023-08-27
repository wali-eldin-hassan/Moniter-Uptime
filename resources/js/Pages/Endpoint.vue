<script setup>
import EndPoint from '@/Components/EndPoint.vue';
import SiteSelector from '@/Components/SiteSelector.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import Check from '@/Components/Check.vue'
defineProps({
    endpoint: Object,
    sites: Object,
})

</script>

<template>
    <Head title="Endpoint" />
    <AuthenticatedLayout>

        <template #header>
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    <Link :href="`/dashboard/${endpoint.data.site.id}`" class="text-gray-500 hover:text-gray-700">
                    <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 8 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13" />
                    </svg>
                    </Link>
                </h2>
                <div>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ endpoint.data.url }}
                    </h2>
                </div>
                <div>
                    <SiteSelector :sites="sites.data" />
                </div>

            </div>
        </template>
        <div class="mt-10">
            <section class="container px-20 mx-auto">
                <div class="flex flex-col mt-6">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                    <thead class="bg-gray-50 dark:bg-gray-800">
                                        <tr>
                                            <th scope="col"
                                                class="py-3.5 px-8 text-x font-bold text-left rtl:text-right text-gray-700 dark:text-gray-500">
                                                <span>Check at</span>
                                            </th>

                                            <th scope="col"
                                                class="px-8 py-3.5 text-x font-bold text-left rtl:text-right text-gray-700 dark:text-gray-400">
                                                Response code
                                            </th>

                                            <th scope="col"
                                                class=" py-3.5 text-x font-bold text-left rtl:text-right text-gray-700 dark:text-gray-400">
                                                Response body
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                        <Check v-for="check in endpoint.data.checks" :key="check.id" :check="check" />
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>


            </section>
        </div>
    </AuthenticatedLayout>
</template>

