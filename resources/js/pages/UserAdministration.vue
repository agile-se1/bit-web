<template>
    <Layout>
        <div class="flex flex-col items-center justify-between h-full">
            <p class="text-bit-blue text-4xl mb-10 font-bold">Nutzerverwaltung</p>
            <Vue3EasyDataTable
                :headers="tableHeaders"
                :items="users"
                :theme-color="'#062266'"
                alternating
                buttons-pagination>
                <template #item-generalPresentationDecisionDate="item">
                    {{ formatDate(item.generalPresentationDecisionDate) }}
                </template>
                <template #item-professionalFields="item">
                    {{ [item.professionalFieldDecision1, item.professionalFieldDecision2].join(', ') }}
                </template>
                <template #item-actions="item">
                    <div class="flex flex-row gap-2">
                        <button class="p-2">
                            <font-awesome-icon icon="fa-solid fa-pen-to-square" class="text-bit-blue"/>
                        </button>
                        <button class="p-2">
                            <font-awesome-icon icon="fa-solid fa-trash" class="text-red-700"/>
                        </button>
                    </div>
                </template>
            </Vue3EasyDataTable>
        </div>


    </Layout>
</template>

<script setup lang="ts">
import Layout from "../components/Layout.vue";
import Vue3EasyDataTable, {Header} from 'vue3-easy-data-table';
import 'vue3-easy-data-table/dist/style.css';
import {defineProps} from "vue";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";


const props = defineProps({
        users: {
            type: Array,
            required: true
        }
    }
);

function pad(num: string, size: number): string {
    let s = num + "";
    while (s.length < size) s = "0" + s;
    return s;
}

function formatDate(date: Date) {
    if (!date) return '';
    const d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    return [pad(day, 2), pad(month, 2), year].join('.');
}

const tableHeaders: Header[] = [
    {text: 'ID', value: 'user.id', sortable: true},
    {text: 'Vorname', value: 'user.first_name', sortable: true},
    {text: 'Nachname', value: 'user.surname', sortable: true},
    {text: 'Email', value: 'user.email'},
    {text: 'Präsentation', value: 'generalPresentationDecision', sortable: true},
    {text: 'Berufsfelder', value: 'professionalFields', sortable: true},
    {text: 'gewählt am', value: 'generalPresentationDecisionDate', sortable: true},
    {text: 'Aktionen', value: 'actions', sortable: false}
];


</script>


