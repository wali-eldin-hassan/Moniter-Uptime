<script setup>
import { router } from '@inertiajs/vue3';
import DangerButton from '@/Components/DangerButton.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';


 defineProps({
    endpoint: Object
});

let deleteEndPoint = (id) => {
    if(confirm("Are you sure you want to delete this endpoint"))
    {
        router.delete(`/endpoints/${id}`);

    }

    
}

</script>

<template >
    <tr>
        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
            <div>
                <h2 class="font-medium text-gray-800 dark:text-white ">
                    {{ endpoint.location }}

                  
                </h2>
                <p class="text-sm font-normal text-gray-600 dark:text-gray-400">
                </p>
            </div>
        </td>

        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
            <div>
                <h2 class="font-medium text-gray-800 dark:text-white">
                    {{ endpoint.frequency_lable }}
                </h2>
                <p class="text-sm font-normal text-gray-600 dark:text-gray-400">
                </p>
            </div>
        </td>

        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
            <div>
                <h2 class="font-medium text-gray-800 dark:text-white ">
                    Last Check
                </h2>
                <p class="text-sm font-normal text-gray-600 dark:text-gray-400">
                </p>
            </div>
        </td>

        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
            <div>
                <h2 class="font-medium text-gray-800 dark:text-white ">
                    Last Status
                </h2>
                <p class="text-sm font-normal text-gray-600 dark:text-gray-400">
                </p>
            </div>
        </td>

        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
            <div>
                <h2 class="font-medium text-gray-800 dark:text-white ">
                    Uptime
                </h2>
                <p class="text-sm font-normal text-gray-600 dark:text-gray-400">
                </p>
            </div>
        </td>
        <tr>
            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
            <PrimaryButton >Edit</PrimaryButton>

        </td>

        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">

            <DangerButton type="submit" @click="deleteEndPoint(endpoint.id)"  >Delete</DangerButton>

        </td>
        </tr>
    
    </tr>
</template>