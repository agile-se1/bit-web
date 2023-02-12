<template>
    <VueFinalModal
        class="flex justify-center items-center"
        content-class="flex flex-col max-w-xl mx-4 p-4 bg-white border rounded-lg space-y-2"
        @update:model-value="val => emit('update:modelValue', val)"
    >
        <h1 class="text-xl">
            {{ title }}
        </h1>
        <p class="text-gray-700 dark:text-gray-300">
            {{ text }}
        </p>
        <slot/>
        <button class="mt-1 ml-auto px-2 border rounded-lg" @click="emit('confirm')">
            Schließen
        </button>
    </VueFinalModal>
</template>

<script setup lang="ts">
import {VueFinalModal} from "vue-final-modal";

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

const emit = defineEmits<{
    (e: 'update:modelValue', modelValue: boolean): void
    (e: 'confirm'): void
}>()


</script>
