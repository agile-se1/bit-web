<template>
    <layout>
        <Wizard
            :customTabs="[
        {id: 0, title: 'Vortrag'},
        {id: 1, title: 'Berufsfeld'},
        {id: 2, title: 'Bestätigen',}]"
            :next-button="nextButton"
            :key="key"
            :back-button="{
        text: 'Zurück',
        hideIcon: 'true'}"
            :done-button="{
        text: 'Absenden',
        icon: 'check'}"
            @change="onChangeCurrentTab" @complete:wizard="wizardCompleted"
            class="min-w-full">

            <template v-if="currentTabIndex === 0">
                <div v-for="presentation in general_presentations"
                     class="p-4 m-2 min-w-full text-xl flex border border-gray-200 rounded-lg shadow max-h-fit items-center justify-between"
                     @click="validate">
                    <input type="radio" :id="presentation.id" :value="presentation" name="presentation"
                           @click="selectPresentation">
                    <label :for="presentation.id">
                        {{ presentation.name }}
                    </label>
                    <button class="ml-2">
                        <font-awesome-icon icon="fa-solid fa-circle-info" class="text-bit-blue"/>
                    </button>
                </div>
            </template>

            <template v-if="currentTabIndex === 1">
                <div v-for="field in professional_fields"
                     class="p-4 m-2 min-w-full text-xl flex border border-gray-200 rounded-lg shadow max-h-fit items-center justify-between"
                     @click="validate">
                    <input type="checkbox" :id="field.id" :value="field.id" name="field">
                    <label :for="field.id">
                        {{ field.name }}
                    </label>
                    <button class="ml-2">
                        <font-awesome-icon icon="fa-solid fa-circle-info" class="text-bit-blue"/>
                    </button>
                </div>
            </template>

            <template v-if="currentTabIndex === 2">
                <div v-for="item in selectedFields"
                     class="p-4 m-2 min-w-full text-xl flex border border-gray-200 rounded-lg shadow max-h-fit items-center justify-between">
                    <label :for="item.id">
                        {{ item.name }}
                    </label>
                    <button class="ml-2">
                        <font-awesome-icon icon="fa-solid fa-circle-info" class="text-bit-blue"/>
                    </button>
                </div>
            </template>
        </Wizard>
    </Layout>

</template>

<script setup>
import Wizard from 'form-wizard-vue3'
import 'form-wizard-vue3/dist/form-wizard-vue3.css'
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import Layout from "@/components/Layout.vue";
import {ref} from "vue";

const props = defineProps({
    professional_fields: Array,
    general_presentations: Array,
});

let key = 0;

//Config of the Wizard
let currentTabIndex = 0;

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
    console.log('validate')
    if (currentTabIndex.value === 0) {
        validatePresentation();
    }
    if (currentTabIndex.value === 1) {
        validateFields();
    }
}


function validatePresentation() {
    if (selectedPresentation.value === null) {
        disableNextButton();
    } else {
        enableNextButton();
    }
    console.log('validatePresentation');
}

function validateFields() {
    if (!(selectedFields.value.length === 2)) {
        disableNextButton();
    } else {
        enableNextButton();
    }
    console.log('validateFields');
}

function selectPresentation() {
    selectedPresentation.value = document.querySelector('input[name="presentation"]:checked').value;
    console.log(selectedPresentation.value);
    validatePresentation();
}

function selectFields() {
    console.log(document.querySelectorAll('input[name="field"]:checked'));
    console.log(selectedFields.value);
    validateFields();
}


function onChangeCurrentTab(index, oldIndex) {
    console.log(index, oldIndex);
    currentTabIndex = index;
}

function wizardCompleted() {
    console.log(props.professional_fields);
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
    background: linear-gradient(90deg, #08f -3.12%, #a033ff 48.22%, #ff5c87 105.52%);
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
    background: linear-gradient(90deg, #4a3aff 0%, #6d3aff 100%);
    color: #fff;
}

.form-wizard-vue .fw-step-checked {
    border: 2px solid #4a3aff 9 e;
}

.fw-overflow-scroll .fw-body-list:hover {
    overflow-x: scroll;
}

.fw-overflow-scroll .fw-body-list::-webkit-scrollbar {
    width: 3px;
    height: 3px;
    background-color: linear-gradient(90deg, #4a3aff 0%, #6d3aff 100%);
}

.fw-overflow-scroll .fw-body-list::-webkit-scrollbar-track {
    box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
    border-radius: 10px;
    background-color: linear-gradient(90deg, #4a3aff 0%, #6d3aff 100%);
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
    background: linear-gradient(90deg, #08f -3.12%, #a033ff 48.22%, #ff5c87 105.52%);
}

.fw-vertical .fw-footer {
    padding: 15px;
}

.fw-btn {
    display: flex;
    align-items: center;
    background: linear-gradient(90deg, #4a3aff 0%, #6d3aff 100%);
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
