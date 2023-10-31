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
    <div class="flex flex-col md:flex-row p-6 mx-2 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-50">
        <div class="md:w-1/2 md:flex-col md:flex md:justify-center">
            <p class="mb-2 text-2xl font-bold tracking-tight text-bit-blue">{{ title }}</p>
            <div class="text-gray-700">
                <p>{{ text }}</p>
                <slot name="below-text"></slot>
            </div>
        </div>
        <div class="md:w-1/2 mt-4 md:mt-0">
            <slot name="images" />
        </div>
    </div>
</template>

