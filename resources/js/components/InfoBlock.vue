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
    <div class="flex p-6 mx-2 bg-white border border-gray-200 rounded-lg shadow max-h-fit
       hover:bg-gray-50">
        <div class="">
            <p class="mb-2 text-2xl font-bold tracking-tight text-bit-blue">{{ title }}</p>
            <div class="flex-col justify-between">
                <div class="text-gray-700">
                    <p>{{ text }}</p>
                </div>
                <slot name="below-text"/>
            </div>
        </div>
        <div class="flex flex-col ml-8">
            <slot name="images"/>
        </div>
    </div>
</template>
