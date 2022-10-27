<template>
    <n-slider v-model:value="value" range :step="10" :max="1000000" :min="0"/>
</template>
<script setup lang="ts">
import { onDeactivated, onMounted, onUpdated, ref } from 'vue'
import { NSlider } from 'naive-ui'
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


const value = ref([0, 0]);

onMounted(() => {
    emmiter.on('event:reset-filters', async () => {
        value.value = [0, 0]
    })
})

onDeactivated(() => {
    emmiter.off('event:reset-filters')
})

onUpdated(() => {
    if (value.value[1] > 0 || value.value[0] > 0) {
        emit('change', { field: props.field, value: value.value, operator: props.operator })
    }
})
</script>