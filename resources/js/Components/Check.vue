<script setup>

defineProps({
    check: Object,
})

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
                <button>View</button>
            </template>

            <template v-else>
                -
            </template>
        </td>
    </tr>
</template>