<template>
    <VueFinalModal
        class="flex justify-center items-center text-bit-blue"
        content-class="flex flex-col max-w-xl mx-4 px-10 py-2 bg-white border rounded-lg space-y-2"
        @update:model-value="val => emit('update:modelValue', val)">
        <div class="flex justify-between items-center">
            <p class="font-bold">Nutzer bearbeiten:</p>
            <button @click="emit('cancel')">
                <font-awesome-icon icon="fa-solid fa-xmark" class="text-bit-blue hover:text-red-700"/>
            </button>
        </div>

        <form @submit.prevent="submitChange">

            <div class="flex flex-col">
                <label for="firstName">Vorname:</label>
                <input type="text" id="firstName" v-model="form.firstName" required>
            </div>
            <div class="flex flex-col">
                <label for="surname">Nachname:</label>
                <input type="text" id="surname" v-model="form.surname" required>
            </div>
            <div class="flex flex-col">
                <label for="email">E-Mail:</label>
                <input type="text" id="email" v-model="form.email" required>
            </div>
            <div class="flex flex-col">
                <label for="generalPresentationDecision">Präsentation</label>
                <input type="text" id="generalPresentationDecision" v-model="form.generalPresentationDecision">
            </div>
            <div class="flex flex-col">
                <label for="professionalFieldDecision1">Berufsfeld 1:</label>
                <input type="text" id="professionalFieldDecision1" v-model="form.professionalFieldDecision1">
            </div>
            <div class="flex flex-col">
                <label for="professionalFieldDecision2">Berufsfeld 2:</label>
                <input type="text" id="professionalFieldDecision2" v-model="form.professionalFieldDecision2">
            </div>
            <button type="submit" class="mt-1 ml-auto px-2 border rounded-lg" :disabled="form.processing">
                Speichern!
            </button>
        </form>


    </VueFinalModal>


</template>

<script setup>
import {VueFinalModal} from "vue-final-modal";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import {useForm} from "@inertiajs/inertia-vue3";
import {ref} from "vue";

const props = defineProps({
    item: {
        type: Object,
        required: true,
    },

})


const form = useForm({
    firstName: props.item?.user.first_name,
    surname: props.item?.user.surname,
    email: props.item?.user.email,
    generalPresentationDecision: props.item?.generalPresentationDecision,
    professionalFieldDecision1: props.item?.professionalFieldDecision1,
    professionalFieldDecision2: props.item?.professionalFieldDecision2,
})


function submitChange() {
    form.post(`/admin/user/${props.item?.user.id}/update`)
    emit('confirm');
}

const emit = defineEmits({
    'update:modelValue': (modelValue) => {
        // implementation of the 'update:modelValue' event
    },
    'confirm': () => {
        // implementation of the 'confirm' event
    },
    'cancel': () => {
        // implementation of the 'cancel' event
    }
});

</script>
