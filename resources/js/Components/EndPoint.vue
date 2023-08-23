<script setup>

defineProps({
    endpoint:Object
})
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
                    {{endpoint.frequency_lable}}
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

        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
            <div>
                <h2 class="font-medium text-red-800 dark:text-white ">
                 <button>Delete</button>   
                </h2>
                <p class="text-sm font-normal text-gray-600 dark:text-gray-400">
                </p>
            </div>
        </td>

        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
            <div>
                <h2 class="font-medium text-blue-800 dark:text-white ">
                   <button>Edit</button> 
                </h2>
                <p class="text-sm font-normal text-gray-600 dark:text-gray-400">
                </p>
            </div>
        </td>

    </tr>
</template>