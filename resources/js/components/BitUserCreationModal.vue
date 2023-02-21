<template>
    <VueFinalModal
        class="flex justify-center items-center text-bit-blue"
        content-class="flex flex-col max-w-xl mx-4 px-10 py-2 bg-white border rounded-lg space-y-2"
        @update:model-value="val => emit('update:modelValue', val)">
        <div class="flex justify-between items-center">
            <p class="font-bold">Nutzer erstellen:</p>
            <button @click="emit('cancel')">
                <font-awesome-icon icon="fa-solid fa-xmark" class="text-bit-blue hover:text-red-700"/>
            </button>
        </div>

        <form @submit.prevent="submitForm">
            <div class="flex flex-col">
                <label for="name">Vorname:</label>
                <input type="text" id="name" v-model="form.name">
            </div>
            <div class="flex flex-col">
                <label for="surname">Nachname:</label>
                <input type="text" id="surname" v-model="form.surname">
            </div>
            <div class="flex flex-col">
                <label for="email">E-Mail:</label>
                <input type="text" id="email" v-model="form.email">
            </div>
            <button type="submit" class="mt-1 ml-auto px-2 mr-2 border rounded-lg">
                Speichern!
            </button>
        </form>
        <form @submit.prevent="submitFile">
            <div class="flex flex-col">
                <label class="block text-bit-blue" for="csv">CSV-Datei:</label>
                <input
                    class="mb-2 block w-full text-sm text-bit-blue border border-gray-200 rounded cursor-pointer bg-gray-50"
                    type="file" id="csv"
                    @input="file.csv = $event.target.files[0]">
            </div>
            <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                {{ form.progress.percentage }}%
            </progress>
            <button type="submit" class="mt-1 ml-auto px-2 mr-2 border rounded-lg">
                Hochladen!
            </button>
        </form>

    </VueFinalModal>


</template>

<script setup lang="ts">
import {VueFinalModal} from "vue-final-modal";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import {useForm} from "@inertiajs/inertia-vue3";

function submitFile() {
    file.post('/admin/createUserByCSV');
    emit('confirm');
}

function submitForm() {
    form.post('/admin/user/store');
    emit('confirm');
}

const form = useForm({
    name: null,
    surname: null,
    email: null,
})

const file = useForm({
    csv: null,
})

const emit = defineEmits<{
    (e: 'update:modelValue', modelValue: boolean): void
    (e: 'confirm'): void
    (e: 'cancel'): void
}>()


</script>
