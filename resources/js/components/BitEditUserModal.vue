<template>
    <VueFinalModal
        class="flex justify-center items-center text-bit-blue"
        content-class="flex flex-col max-w-xl mx-4 px-10 py-2 bg-white border rounded-lg space-y-2"
        @update:model-value="val => emit('update:modelValue', val)">
        <form @submit="updateUser">
            <p class="font-bold">Nutzer bearbeiten:</p>

            <div class="flex flex-col">
                <label for="name">Vorname:</label>
                <input type="text" id="name" name="name" v-model="props.item.user.first_name">
            </div>
            <div class="flex flex-col">
                <label for="name">Nachname:</label>
                <input type="text" id="name" name="name" v-model="props.item.user.surname">
            </div>
            <div class="flex flex-col">
                <label for="name">E-Mail:</label>
                <input type="text" id="name" name="name" v-model="props.item.user.email">
            </div>

            <button type="submit" class="mt-1 ml-auto px-2 border rounded-lg">
                Speichern!
            </button>
        </form>


    </VueFinalModal>


</template>

<script setup lang="ts">
import {VueFinalModal} from "vue-final-modal";

const props = defineProps({
    item: {
        type: Object,
        required: true,
    },

})


function updateUser() {

    console.log('update user');


}

const emit = defineEmits<{
    (e: 'update:modelValue', modelValue: boolean): void
    (e: 'confirm'): void
}>()


</script>
