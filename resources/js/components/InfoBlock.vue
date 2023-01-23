<script setup>
defineProps({
    title: {
        type: String,
        required: true
    },
    text: {
        type: String,
        required: true
    },
    url: {
        type: String,
        required: true
    }
});


</script>


<template>
    <a href="#"
       class="flex flex-col p-6 mx-2 bg-white border border-gray-200 rounded-lg shadow min-h-600
       hover:bg-gray-50">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-bit-blue">{{ title }}</h5>
        <div class="text-gray-700 inline-block">
            <p>{{ text }}</p>
        </div>
    </a>
</template>
