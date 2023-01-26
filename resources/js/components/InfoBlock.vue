<script setup>
defineProps({
    title: {
        type: String,
        required: true
    },
    text: {
        type: String,
        required: true
    }
});


</script>


<template>
    <div class="flex flex-col p-6 mx-2 bg-white border border-gray-200 rounded-lg shadow max-h-fit
       hover:bg-gray-50">
        <p class="mb-2 text-2xl font-bold tracking-tight text-bit-blue">{{ title }}</p>
        <div class="text-gray-700 inline-block">
            <p>{{ text }}</p>
            <slot/>
        </div>
    </div>
</template>
