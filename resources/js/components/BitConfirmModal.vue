<template>
    <VueFinalModal
        class="flex justify-center items-center"
        content-class="flex flex-col max-w-xl mx-4 p-4 bg-white border rounded-lg space-y-2"
        @update:model-value="val => emit('update:modelValue', val)" :click-to-close="clickToClose"
    >
        <div class="flex justify-between items-center">
            <p class="text-xl">{{ title }}</p>
            <button @click="emit('cancel')" v-if="closeButton">
                <font-awesome-icon icon="fa-solid fa-xmark" class="text-bit-blue hover:text-red-700"/>
            </button>
        </div>
        <p class="text-gray-700 dark:text-gray-300">
            {{ text }}
        </p>
        <slot name="content"/>
        <button class="mt-1 ml-auto px-2 border rounded-lg" :class="{'bg-red-700 text-white' : isDanger}"
                @click="emit('confirm')">
            {{ confirmButtonText }}
        </button>
    </VueFinalModal>
</template>

<script setup lang="ts">
import {VueFinalModal} from "vue-final-modal";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";

defineProps({
    title: {
        type: String,
        required: true
    },
    text: {
        type: String
    },
    confirmButtonText: {
        type: String,
        required: true
    },
    clickToClose: {
        type: Boolean,
        default: true
    },
    closeButton: {
        type: Boolean,
        default: true
    },
    type: {
        type: String,
    }

});

const emit = defineEmits<{
    (e: 'update:modelValue', modelValue: boolean): void
    (e: 'confirm'): void
    (e: 'cancel'): void
}>()


function isDanger() {
    return this.type === 'danger';
}

</script>
