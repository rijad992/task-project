<template>
    <n-input v-model:value="value" type="text" placeholder="Search for..." />
</template>
<script setup lang="ts">
import { onDeactivated, onMounted, onUpdated, ref } from 'vue'
import { NInput } from 'naive-ui'
import type { SelectedFilter } from '@/types/types';
import emmiter from '../../utils/eventEmmiter'

const props = defineProps<{
    name: string,
    operator: string,
    field: string,
    type: unknown,
    options: string | number[];
}>()

const emit = defineEmits<{
    (e: 'change', value: SelectedFilter): void
}>()


const value = ref('');

onMounted(() => {
    emmiter.on('event:reset-filters', async () => {
        value.value = ''
    })
})

onDeactivated(() => {
    emmiter.off('event:reset-filters')
})

onUpdated(() => {
    if (value.value) {
        emit('change', { field: props.field, value: value.value, operator: props.operator })
    }
})
</script>