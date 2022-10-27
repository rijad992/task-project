<template>
    <n-layout>
            <n-layout-header bordered>
                <n-text type="primary">
                    {{ name }}
                </n-text>
            </n-layout-header>
            <n-layout-content content-style="padding: 12px 0;">
                <slot></slot>
            </n-layout-content>
    </n-layout>
</template>
<script setup lang="ts">
import { NLayout, NLayoutHeader, NLayoutContent, NH2, NText } from 'naive-ui'

defineProps<{
    name: string
}>()
</script>

<style scoped>
.n-layout {
  background-color: inherit;
}

.n-layout-header {
  background-color: inherit;

}
</style>