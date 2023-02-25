<template>
    <layout>
        <Wizard
            v-if="already_decided"
            :customTabs="[
        {id: 0, title: 'Vortrag'},
        {id: 1, title: 'Berufsfeld'},
        {id: 2, title: 'Bestätigen',}]"
            :next-button="nextButton"
            :back-button="{
        text: 'Zurück',
        hideIcon: 'true'}"
            :done-button="{
        text: 'Absenden',
        icon: 'check'}"
            @change="onChangeCurrentTab" @complete:wizard="wizardCompleted"
            class="min-w-full">
            <template v-if="currentTabIndex === 0">
                <p class="text-2xl text-center mb-14">Suchen Sie bitte <strong>eine</strong> der Präsentationen aus</p>
                <div v-for="presentation in general_presentations" :key="presentation.id"
                     class="p-4 m-2 min-w-full text-xl flex border border-gray-200 rounded-lg shadow max-h-fit items-center justify-between"
                     @click="selectPresentation(presentation.id)">
                    <input type="radio" :id="presentation.id" :value="presentation" name="presentation"
                           class="checked:bg-bit-blue" @change="validate" v-model="selectedPresentation">
                    <label :for="presentation.id">{{ presentation.name }}</label>
                    <button class="ml-2" :value="presentation" @click="showModal(presentation)">
                        <font-awesome-icon icon="fa-solid fa-circle-info" class="text-bit-blue"/>
                    </button>
                </div>
            </template>

            <template v-if="currentTabIndex === 1">
                <p class="text-2xl text-center mb-14">Suchen Sie bitte <strong>zwei</strong> der Berufsfelder aus</p>
                <div v-for="field in professional_fields" :key="field.id"
                     class="p-4 m-2 min-w-full text-xl flex border border-gray-200 rounded-lg shadow max-h-fit items-center justify-between"
                     @click="selectField(field.id)">
                    <input type="checkbox" :id="field.id" :value="field" name="field" v-show="isAvailable(field)"
                           class="checked:bg-bit-blue"
                           :class="{invisible: !isAvailable(field)}"
                           @change="validate" v-model="selectedFields">
                    <div v-show="!isAvailable(field)"></div>
                    <label :for="field.id" :class="{'line-through': !isAvailable(field)}">
                        {{ field.name }}
                    </label>
                    <button class="ml-2" :value="field" @click="showModal(field)">
                        <font-awesome-icon icon="fa-solid fa-circle-info" class="text-bit-blue"/>
                    </button>
                </div>
            </template>

            <template v-if="currentTabIndex === 2">
                <p class="text-2xl text-center mb-4">Ihre Auswahl</p>
                <div
                    class="p-4 m-2 mb-10 min-w-full text-xl flex border border-gray-200 rounded-lg shadow max-h-fit items-center justify-between">
                    <div></div>
                    <p>{{ selectedPresentation.name }}</p>
                    <button class="ml-2" :value="selectedPresentation" @click="showModal(selectedPresentation)">
                        <font-awesome-icon icon="fa-solid fa-circle-info" class="text-bit-blue"/>
                    </button>
                </div>

                <div v-for="(field, index) in selectedFields.values()" :key="field.id"
                     class="p-4 m-2 min-w-full text-xl flex border border-gray-200 rounded-lg shadow max-h-fit items-center justify-between">
                    <div></div>
                    <p>{{ field.name }}</p>
                    <button class="ml-2" :value="field" @click="showModal(field)">
                        <font-awesome-icon icon="fa-solid fa-circle-info" class="text-bit-blue"/>
                    </button>
                </div>
            </template>
        </Wizard>

        <!-- If the user has already decided -->
        <div v-if="!already_decided">
            <p class="text-2xl text-center mb-4">Sie haben bereits gewählt. <br>Das ist Ihre Auswahl:</p>
            <p>Präsentation:</p>
            <div
                class="p-4 m-2 mb-10 min-w-full text-xl flex border border-gray-200 rounded-lg shadow max-h-fit items-center justify-between">
                <div></div>
                <p>{{ props.decisions.general_presentation.name }}</p>
                <button class="ml-2" :value="props.decisions.general_presentation" @click="showModal(props.decisions.general_presentation)">
                    <font-awesome-icon icon="fa-solid fa-circle-info" class="text-bit-blue"/>
                </button>
            </div>
            <p>Berufsfelder:</p>

            <div v-for="(field, index) in props.decisions.professional_fields" :key="field.id"
                 class="p-4 m-2 min-w-full text-xl flex border border-gray-200 rounded-lg shadow max-h-fit items-center justify-between">
                <div></div>
                <p>{{ field.name }}</p>
                <button class="ml-2" :value="field" @click="showModal(field)">
                    <font-awesome-icon icon="fa-solid fa-circle-info" class="text-bit-blue"/>
                </button>
            </div>

        </div>
    </Layout>

    <!-- Modals -->
    <BitModal v-model="infoModal.show" :title="infoModal.title" :text="infoModal.text"
              :confirm-button-text="infoModal.confirmButtonText" @confirm="hideInfoModal"
              @close="hideInfoModal"></BitModal>
    <BitModal v-model="confirmModal.show" :title="confirmModal.title" :clickToClose="false" :close-button="false"
              :confirm-button-text="confirmModal.confirmButtonText" @confirm="Inertia.get('/')">
        <template #content>
            <div
                class="p-4 m-2 min-w-full text-xl flex border border-gray-200 rounded-lg shadow max-h-fit items-center justify-between">
                <div></div>
                <p>{{ selectedPresentation.name }}</p>
                <button class="ml-2" :value="selectedPresentation" @click="showModal(selectedPresentation)">
                    <font-awesome-icon icon="fa-solid fa-circle-info" class="text-bit-blue"/>
                </button>
            </div>
            <div></div>
            <div v-for="field in selectedFields.values()" :key="field.id"
                 class="p-4 m-2 min-w-full text-xl flex border border-gray-200 rounded-lg shadow max-h-fit items-center justify-between">
                <div></div>
                <p>{{ field.name }}</p>
                <button class="ml-2" :value="field" @click="showModal(field)">
                    <font-awesome-icon icon="fa-solid fa-circle-info" class="text-bit-blue"/>
                </button>
            </div>
        </template>
    </BitModal>
</template>

<script setup>
import Wizard from 'form-wizard-vue3'
import 'form-wizard-vue3/dist/form-wizard-vue3.css'
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import Layout from "@/components/Layout.vue";
import {ref} from "vue";
import BitModal from "@/components/BitConfirmModal.vue";
import {Inertia} from "@inertiajs/inertia";

const props = defineProps({
    professional_fields: Array,
    general_presentations: Array,
    already_decided: Boolean,
    decisions: Object
});


let currentTabIndex = ref(0);

let selectedPresentation = ref(null);

let selectedFields = ref([]);


const nextButton = ref({
    text: 'Weiter',
    hideIcon: 'true',
    disabled: true
});

function enableNextButton() {
    nextButton.value.disabled = false;
}

function disableNextButton() {
    nextButton.value.disabled = true;
}

function validate() {
    if (currentTabIndex.value === 0 || currentTabIndex === 0) {
        validatePresentation();
    } else if (currentTabIndex.value === 1 || currentTabIndex === 1) {
        validateFields();
    }
}


function validatePresentation() {
    if (selectedPresentation.value === null) {
        disableNextButton();
    } else {
        enableNextButton();
    }
}

function validateFields() {
    if (!(selectedFields.value.length === 2)) {
        disableNextButton();
    } else {
        enableNextButton();
    }
}

function isAvailable(field) {
    return (field.current_count < field.max_count);
}

function onChangeCurrentTab(index) {
    currentTabIndex = index;
    validate();
}

function wizardCompleted() {
    Inertia.post('/decision', {
        generalPresentation: selectedPresentation.value.id,
        professionalField1: selectedFields.value[0].id,
        professionalField2: selectedFields.value[1].id
    });
    confirmModal.value.show = true;
}

function selectPresentation(id) {
    const radio = document.getElementById(id);
    radio.click();
}

function selectField(id) {
    const checkbox = document.getElementById(id);
    checkbox.click();
}
//Modal functions

function hideInfoModal() {
    infoModal.value.show = false
    infoModal.value.title = '';
    infoModal.value.text = '';
}

let infoModal = ref({
    show: false,
    title: '',
    text: '',
    confirmButtonText: 'Schließen'
})

let confirmModal = ref({
    show: false,
    title: 'Ihre Auswahl:',
    confirmButtonText: 'Zurück zur Startseite'
})


function showModal(item) {
    infoModal.value.title = item.name;
    infoModal.value.text = item.description;
    infoModal.value.show = true
}

</script>
<style>
* {
    font-family: Rubik, sans-serif;
    font-weight: 400;
}

.fw-card {
    background: #fff;
    border: 1px solid #eff0f7;
    box-shadow: 0px 5px 16px rgba(8, 15, 52, 0.06);
    border-radius: 10px;
}

.form-wizard-vue {
    display: flex;
    flex-direction: column;
}

.form-wizard-vue .fw-body-list {
    position: relative;
    text-align: center;
    display: flex;
    overflow: hidden;
    list-style-type: none;
}

.form-wizard-vue .fw-body-list li {
    position: relative;
    padding: 1.5rem;
}

.form-wizard-vue .fw-body-list li .fw-list-wrapper-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    background: #eff0f7;
    color: #6f6c90;
    width: 48.89px;
    height: 48px;
    border-radius: 50%;
}

.form-wizard-vue .fw-body-list li .fw-squared-tab {
    border-radius: 0.4rem;
}

.form-wizard-vue .fw-body-list .fw-list-progress {
    position: absolute;
    width: 40%;
    height: 8.47px;
    background: #eff0f7;
    top: 40%;
    left: 80%;
}

.form-wizard-vue .fw-body-list .fw-list-progress-active {
    background: radial-gradient(circle, rgba(7, 33, 102, 1) 35%, rgba(151, 172, 228, 1) 100%);
}

.form-wizard-vue .fw-body-list li:last-child .fw-list-progress {
    width: 0%;
}

.form-wizard-vue .fw-body-list li, .form-wizard-vue .fw-body-list .fw-list-wrapper {
    flex: 1;
    align-items: center;
    flex-wrap: wrap;
    flex-grow: 1;
}


.form-wizard-vue .fw-body-list .fw-list-wrapper {
    display: flex;
}

.form-wizard-vue .fw-body-list > li > .fw-list-wrapper {
    display: flex;
    flex-direction: column;
    padding: 0;
    margin: 0 auto;
    color: #6f6c90;
    position: relative;
    top: 3px;
}

.form-wizard-vue .fw-body {
    display: flex;
    flex-direction: column;
}

.form-wizard-vue .fw-body-content {
    padding: 20px 20px;
    width: 80%;
    align-self: center;
}

.form-wizard-vue .fw-footer {
    display: flex;
    justify-content: space-between;
    width: 80%;
    align-self: center;
}

.form-wizard-vue .fw-step-active {
    background: #062266 !important;
    color: #fff;
}

.fw-list-wrapper-icon .fw-step-active {
    background: #062266 !important;
    color: #fff;
}

.form-wizard-vue .fw-step-checked {
    border: 2px solid #072166;
}

.fw-overflow-scroll .fw-body-list:hover {
    overflow-x: scroll;
}

.fw-overflow-scroll .fw-body-list::-webkit-scrollbar {
    width: 3px;
    height: 3px;
    background-color: radial-gradient(circle, rgba(7, 33, 102, 1) 35%, rgba(151, 172, 228, 1) 100%);
}

.fw-overflow-scroll .fw-body-list::-webkit-scrollbar-track {
    box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
    border-radius: 10px;
    background-color: radial-gradient(circle, rgba(7, 33, 102, 1) 35%, rgba(151, 172, 228, 1) 100%);
}

.fw-overflow-scroll .fw-body-list::-webkit-scrollbar-thumb {
    border-radius: 10px;
    box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
    background-color: #555;
}

.fw-overflow-scroll.fw-vertical .fw-body-list:hover {
    overflow-x: unset;
    overflow-y: scroll;
}

i {
    font-style: normal;
}

.fw-vertical {
    flex-direction: row;
    min-height: 600px;
    max-height: 800px;
}

.fw-vertical .fw-body {
    flex-direction: column;
    flex: 1 1;
}

.fw-vertical .fw-body-content {
    padding: 60px;
    width: 100%;
    flex: 20 1;
}

.fw-vertical .fw-body-list {
    flex-direction: column;
    overflow-x: hidden;
}

.fw-vertical .fw-body-list li {
    display: flex;
    padding: 40px;
}

.fw-vertical .fw-body-list li .fw-list-progress {
    position: absolute;
    width: 8px;
    height: 40%;
    background: #eff0f7;
    top: 80%;
    left: 45%;
}

.fw-vertical .fw-body-list li .fw-list-progress-active {
    background: radial-gradient(circle, rgba(7, 33, 102, 1) 35%, rgba(151, 172, 228, 1) 100%);
}

.fw-vertical .fw-footer {
    padding: 15px;
}

.fw-btn {
    display: flex;
    align-items: center;
    background: #072166;
    cursor: pointer;
    padding: 0.7rem 1.5rem;
    min-width: unset;
    border-radius: 0.4rem;
    border: none;
    line-height: 20px;
    text-align: center;
    color: #fff;
}

.fw-btn span {
    margin-right: 3px;
}

.fw-btn-back {
    background: #6f6c90;
    border: none;
}

.fw-btn-back span {
    margin-left: 3px;
}

.fw-btn-disabled {
    opacity: 0.5;
    pointer-events: none;
}


</style>
