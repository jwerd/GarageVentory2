<script setup>
defineProps(['value']);
</script>

<template>
    <label class="block font-medium text-sm text-gray-700">
        <div v-if="value.height">H: {{ value.height }}</div>
        <div v-if="value.width">W: {{ value.width }}</div>
        <div v-if="value.length">L: {{ value.length }}</div>
        <span v-else>No Dimensions</span>
    </label>
</template>
