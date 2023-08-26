<script setup>
import { router } from '@inertiajs/vue3';
import DangerButton from '@/Components/DangerButton.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import { ref, watch } from 'vue';
import { useForm } from '@inertiajs/vue3';
import debounce from 'lodash/debounce';
let props = defineProps({
    endpoint: Object,
    endpointsFrequencies: Object
});

const editing = ref(false);


let form = useForm({
    location: props.endpoint.location,
    frequency: props.endpoint.frequency_value,
})

let deleteEndPoint = (id) => {
    if (confirm("Are you sure you want to delete this endpoint")) {
        router.delete(`/endpoints/${id}`);
    }
}

let editEndpoint = debounce(() => {
    form.patch(`/endpoints/${props.endpoint.id}`, {
        preserveScroll: true,

    });
}, 500);


watch(() => form.isDirty, () => {
    editEndpoint();
});




</script>

<template >
    <tr>
        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
            <template v-if="editing">
                <InputLabel for="location" value="Location" class="sr-only" />
                <TextInput id="location" type="text" class="block w-full h-9 text-sm" placeholder="e.g/pricing"
                    v-model="form.location" />
                <InputError class="mt-2" />
            </template>
            <template v-else>
                <div>
                    <h2 class="font-medium text-gray-800 dark:text-white ">
                        {{ endpoint.location }}

                    </h2>
                    <p class="text-sm font-normal text-gray-600 dark:text-gray-400">
                    </p>
                </div>
            </template>

        </td>

        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
            <template v-if="editing">
                <InputLabel for="frequency" value="Frequency" class="sr-only" />
                <select name="frequency" id="frequency"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md h-9 leading-none text-sm"
                    v-model="form.frequency">
                    <option :value="frequency.frequency" v-for="frequency in endpointsFrequencies.data"
                        :key="frequency.frequency">
                        {{ frequency.label }}
                    </option>
                </select>
            </template>
            <template v-else>
                <div>
                    <h2 class="font-medium text-gray-800 dark:text-white">
                        {{ endpoint.frequency_lable }}
                    </h2>
                    <p class="text-sm font-normal text-gray-600 dark:text-gray-400">
                    </p>
                </div>
            </template>

        </td>

        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
            <div>
                <h2 class="font-medium text-gray-800 dark:text-white ">
                    <template v-if="endpoint.latest_check">
                        <time :datetime="endpoint.latest_check.created_at.human"
                            :title="endpoint.latest_check.created_at.date_time">
                            {{ endpoint.latest_check.created_at.human }}</time>
                    </template>
                    <template v-else>
                        -
                    </template>
                </h2>
                <p class="text-sm font-normal text-gray-600 dark:text-gray-400"></p>


            </div>
        </td>

        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
            <div>
                <h2 class="font-medium text-gray-800 dark:text-white ">
                    <template v-if="endpoint.latest_check">
                        <span class="inline-flex items-center rounded-md px-2.5 py-0.5 text-sm font-medium"
                            :class="{ 'bg-green-100 text-green-800': endpoint.latest_check.is_successful, 'bg-red-100 text-red-800': !endpoint.latest_check.is_successful }">
                            {{ endpoint.latest_check.response_code }} {{ endpoint.latest_check.status_text }}
                        </span>
                    </template>
                    <template v-else>
                        <span class="inline-flex items-center rounded-md px-2.5 py-0.5 text-sm font-medium">
                            -
                        </span>
                    </template>
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
            <PrimaryButton @click="editing = !editing">{{ editing ? `Done` : `Edit` }}</PrimaryButton>

        </td>


        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">

            <DangerButton type="submit" @click="deleteEndPoint(endpoint.id)">Delete</DangerButton>

        </td>
    </tr>

    </tr>
</template>