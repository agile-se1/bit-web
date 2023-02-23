<template>
    <VueFinalModal
        class="flex justify-center items-center text-bit-blue"
        content-class="flex flex-col max-w-xl mx-4 px-10 py-2 bg-white border rounded-lg space-y-2"
        @update:model-value="val => emit('update:modelValue', val)">
        <div class="flex justify-between items-center">
            <p class="font-bold">Nutzer erstellen:</p>
            <button @click="cancel">
                <font-awesome-icon icon="fa-solid fa-xmark" class="text-bit-blue hover:text-red-700"/>
            </button>
        </div>

        <form @submit.prevent="submitForm">
            <div class="flex flex-col">
                <label for="name">Vorname:</label>
                <input type="text" id="name" v-model="form.firstName">
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
                    type="file" id="file" name="file" accept=".csv,.txt"
                    @input="file.file = $event.target.files[0]">
            </div>
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

function cancel() {
    form.firstName = null;
    form.surname = null;
    form.email = null;
    file.csv = null;
    emit('cancel');
}

const form = useForm({
    firstName: null,
    surname: null,
    email: null,
})

const file = useForm({
    file: null,
})

const emit = defineEmits<{
    (e: 'update:modelValue', modelValue: boolean): void
    (e: 'confirm'): void
    (e: 'cancel'): void
}>()


</script>
