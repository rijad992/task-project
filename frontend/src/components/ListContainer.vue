<template>
    <n-data-table :columns="tableColumns" :data="tableData" :bordered="false" />
</template>
  
<script setup lang="ts">
import { inject, onDeactivated, onMounted, ref, type Ref } from 'vue'
import { NDataTable, type DataTableColumns } from 'naive-ui'
import type { Axios } from 'axios';
import emmiter from '../utils/eventEmmiter'
import type { SelectedFilter } from '@/types/types';
import { apiUrl } from '../config'

const props = defineProps<{
    entity: string
}>()

const axios: Axios | undefined = inject('axios');
const tableColumns: Ref<DataTableColumns> = ref([]);
const tableData = ref([])

const getColumns = async (): Promise<DataTableColumns> => {
    const res = await axios?.get(`${apiUrl}${props.entity}s/get-fields`);
    const fields: DataTableColumns = [];
    for (let key in res?.data) {
        fields.push({ title: res?.data[key].label, key })
    }
    return fields;
}

const getTableData = async (filters: SelectedFilter[] = []) => {
    const res = await axios?.post(`${apiUrl}${props.entity}s`, filters);

    return res?.data;

}

onMounted(async () => {
    const cl = await getColumns();
    tableColumns.value = cl;

    const data = await getTableData();
    tableData.value = data;

    emmiter.on('event:submit-filters', async (selectedFiltes: SelectedFilter[]) => {
        const data = await getTableData(selectedFiltes);
        tableData.value = data;
    })
})

onDeactivated(() => {
    emmiter.off('event:submit-filters')
})

</script>