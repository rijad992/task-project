<template>
    <div class="container">
        <n-h1>
            <n-text type="primary">
                Filters
            </n-text>
        </n-h1>
        <template v-for="(item, index) in filters" :key="index">
            <Filter :name="item.name">
                <component :key="index" :is="item.type" v-bind="item" @change="filterChangeListener"></component>
            </Filter>
        </template>
        <div class="button-container">
            <n-button type="warning" @click="resetFiltersHandler">
                Reset
            </n-button>
            <n-button type="primary" @click="submitFiltersHandler">
                Submit
            </n-button>
        </div>
    </div>
</template>

<script setup lang="ts">
import Filter from './Filters/Filter.vue';
import { defineAsyncComponent, inject, onMounted, ref, shallowRef } from 'vue'
import type { Axios } from 'axios';
import type { SelectedFilter } from '@/types/types';
import { NButton,NText, NH1 } from 'naive-ui'
import emmiter from '../utils/eventEmmiter'

type Filter = {
    name: string;
    field: string;
    type: any;
    operator: string;
    options: string | number[]
}
let selectedFiltes: SelectedFilter[] = [];

const props = defineProps<{
    entity: string
}>();

const axios: Axios | undefined = inject('axios');

const filters = ref<Filter[]>([]);

const getFilters = async (): Promise<Filter[]> => {
    const res = await axios?.get<Filter[]>(`http://localhost:8000/api/${props.entity}s/get-filters`);

    const data = res?.data.map((filter) => ({ ...filter, type: shallowRef(defineAsyncComponent(() => import(`./Filters/${filter.type}.vue`))) }));
    return data || [];
}

const filterChangeListener = (value: SelectedFilter) => {
    const field = value.field;
    const filters = selectedFiltes.filter(filter => filter.field !== field);
    if (value.value) {
        filters.push(value)
    }

    selectedFiltes = filters;
}

const submitFiltersHandler = () => {
    emmiter.emit('event:submit-filters', selectedFiltes)
}

const resetFiltersHandler = () => {
    selectedFiltes = []
    emmiter.emit('event:submit-filters', selectedFiltes)
    emmiter.emit('event:reset-filters')

}

onMounted(async () => {
    filters.value = await getFilters();
})
</script>

<style scoped>
.container {
    width: 400px;
    padding-left: 20px;

}

.button-container {
    display: flex;
    justify-content: end;
    padding: 20px 0;
    gap: 10px;

}
</style>

