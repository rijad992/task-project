<template>
    <n-input-number v-model:value="value" clearable />
</template>
<script setup lang="ts">
import { ref, onUpdated, onMounted, onDeactivated } from 'vue'
import { NInputNumber } from 'naive-ui'
import type { SelectedFilter } from '@/types/types';
import emmiter from '../../utils/eventEmmiter'

const props = defineProps<{
    name: string,
    operator: string,
    field: string,
    type: unknown,
    options: string | number[];
}>()

const value = ref(0);

const emit = defineEmits<{
  (e: 'change', value: SelectedFilter): void
}>()

onMounted(() => {
    emmiter.on('event:reset-filters', async () => {
        value.value = 0
    })
}) 

onDeactivated(()=> {
    emmiter.off('event:reset-filters')
})

onUpdated(() => {
    if(value) {
        emit('change', {field: props.field, value: value.value, operator: props.operator})
    }
})

</script>