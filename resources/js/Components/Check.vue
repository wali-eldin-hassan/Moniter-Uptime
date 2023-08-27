<script setup>
import Modal from '@/Components/Modal.vue';
import { ref } from 'vue';
defineProps({
    check: Object,
})
let showNewModal = ref(false);

</script>

<template>
    <tr>
        <td class="px-10 py-4 text-sm font-medium whitespace-nowrap">
            {{ check.created_at.human }}
        </td>
        <td class="px-12 py-4 text-sm font-medium whitespace-nowrap">
            <span class="inline-flex items-center rounded-md px-2.5 py-0.5 text-sm font-medium"
                :class="{ 'bg-green-100 text-green-800': check.is_successful, 'bg-red-100 text-red-800': !check.is_successful }">
                {{ check.response_code }} {{ check.status_text }}
            </span>
        </td>
        <td class="px-10 py-4 text-sm font-medium whitespace-nowrap">

            <template v-if="check.response_body">
                <button @click="showNewModal=true">View</button>
            </template>

            <template v-else>
                -
            </template>
        </td>
    </tr>
    <Modal @close="showNewModal = false" maxWidth="lg" v-model="showNewModal" :show="showNewModal">
        <div class="p-4">
            <div class="flex items-center justify-between">

                <button @click="showNewModal = false"
                    class="text-gray-500 focus:outline-none hover:bg-gray-100 p-1 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>

                </button>

            </div>
            <textarea :value="check.response_body" readonly class="border-gray-300 rounded-md w-full h-full" rows="10"/>

        </div>
    </Modal>
</template>