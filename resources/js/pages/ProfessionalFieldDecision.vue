<template>
    <layout>
        <div>
            <vue-form-wizard class="text-black"
                             :form="form"
                             v-model="formData"
                             @submit="handleForm(formData)"
            />
        </div>
    </layout>

</template>

<script setup>
import VueFormWizard from '@anivive/vue3-form-wizard'
import Layout from "@/components/Layout.vue";
import '@anivive/vue3-form-wizard/dist/index.css';


//TODO Replace with DB Call
const form = [
    {
        "property": "Vortrag",
        "text": "Welchen Vortrag willst Du besuchen?",
        "type": "options",
        "required": true,
        "options": {
            "multiSelect": false,
            "list": [
                {
                    "id": 1,
                    "value": "Informationen zum Universitätsstudium"
                },
                {
                    "id": 2,
                    "value": "Informationen von der Industrie- und Handelskammer (Duales Studium)"
                },
                {
                    "id": 3,
                    "value": "Informationen von der Industrie- und Handelskammer (Duales Studium)"
                },

            ]
        }
    },
    {
        "property": "Berufsfeld1",
        "text": "Vormittags: Welches Berufsfeld interessiert Dich?",
        "type": "options",
        "required": true,
        "options": {
            "multiSelect": false,
            "list": [
                {
                    "id": 1,
                    "value": "Berufsfeld 1",
                },
                {
                    "id": 2,
                    "value": "Berufsfeld 2"
                },
                {
                    "id": 3,
                    "value": "Berufsfeld 3"
                },
                {
                    "id": 4,
                    "value": "Berufsfeld 4"
                },
                {
                    "id": 5,
                    "value": "Berufsfeld 5"
                }

            ]
        }
    },
    {
        "property": "Berufsfeld2",
        "text": "Nachmittags: Welches Berufsfeld interessiert Dich?",
        "type": "options",
        "required": true,
        "options": {
            "multiSelect": false,
            "list": [
                {
                    "id": 1,
                    "value": "Berufsfeld 1",
                },
                {
                    "id": 2,
                    "value": "Berufsfeld 2"
                },
                {
                    "id": 3,
                    "value": "Berufsfeld 3"
                },
                {
                    "id": 4,
                    "value": "Berufsfeld 4"
                },
                {
                    "id": 5,
                    "value": "Berufsfeld 5"
                }

            ]
        }
    },
];

const formData = [];

//TODO Replace with DB Call
function handleForm(data) {
    console.log(data);
}
</script>
