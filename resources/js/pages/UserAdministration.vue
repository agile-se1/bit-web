<template>
    <Layout>
        <div class="flex flex-col items-center h-full">
            <p class="text-bit-blue text-4xl mb-10 font-bold">Nutzerverwaltung</p>
            <div class="flex justify-between min-w-full">
                <Link href="/admin/dashboard" class="bg-bit-blue text-white rounded p-2 mb-2">
                    <font-awesome-icon icon="fa-solid fa-arrow-left" class="ml-2"/>
                    Zurück
                </Link>
                <button class="bg-bit-blue text-white rounded p-2 mb-2">
                    Nutzer hinzufügen
                    <font-awesome-icon icon="fa-solid fa-user-plus" class="ml-2"/>
                </button>

            </div>

            <Vue3EasyDataTable
                :headers="tableHeaders"
                :items="users"
                :theme-color="'#062266'"
                alternating
                buttons-pagination
                class="mb-6 rounded-lg border overflow-hidden">
                <template #item-generalPresentationDecisionDate="item">
                    {{ formatDate(item.generalPresentationDecisionDate) }}
                </template>
                <template #item-professionalFields="item">
                    {{
                        item.professionalFieldDecision1 != null ? [item.professionalFieldDecision1, item.professionalFieldDecision2].join(', ') : ''
                    }}
                </template>
                <template #item-actions="item">
                    <div class="flex flex-row gap-2">
                        <button class="p-2" @click="showModal(item)">
                            <font-awesome-icon title="Nutzer bearbeiten" icon="fa-solid fa-pen-to-square"
                                               class="text-bit-blue"/>
                        </button>
                        <button class="p-2" @click="newMail(item)">
                            <font-awesome-icon title="Neuen Login-Link senden" icon="fa-solid fa-paper-plane"
                                               class="text-bit-blue"/>
                        </button>
                        <button class="p-2" @click="deleteUser(item)">
                            <font-awesome-icon title="Nutzer löschen" icon="fa-solid fa-trash" class="text-red-700"/>
                        </button>
                    </div>
                </template>
            </Vue3EasyDataTable>
            <BitEditUserModal v-model="showEditModal" @confirm="showEditModal = false"
                              :item="modalValue" @cancel="showEditModal = false"/>
            <BitConfirmModal v-model="showDeleteModal" title="Wirklich löschen?" confirm-button-text="Löschen"
                             @confirm="confirmDelete" @cancel="showDeleteModal = false">
                <template #content>
                    <p>Wollen Sie den folgenden Nutzer wirklich löschen?</p>
                    <p class="font-bold">{{ userToDelete.user.first_name }} {{ userToDelete.user.surname }}</p>
                </template>
            </BitConfirmModal>
            <BitConfirmModal v-model="showNewLinkModal" title="Wirklich senden?" confirm-button-text="Senden"
                             @confirm="confirmNewMail" @cancel="showNewLinkModal = false">
                <template #content>
                    <p>Wollen Sie dem folgendem Nutzer einen neuen Login-Link senden?</p>
                    <p class="font-bold">{{ userToNewMail.user.first_name }} {{ userToNewMail.user.surname }}</p>
                </template>
            </BitConfirmModal>
        </div>

    </Layout>
</template>

<script setup lang="ts">
import Layout from "../components/Layout.vue";
import Vue3EasyDataTable, {Header} from 'vue3-easy-data-table';
import 'vue3-easy-data-table/dist/style.css';
import {defineProps, ref} from "vue";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import BitEditUserModal from "../components/BitEditUserModal.vue";
import BitConfirmModal from "../components/BitConfirmModal.vue";
import {Inertia} from "@inertiajs/inertia";
import {Link} from "@inertiajs/inertia-vue3";


let modalValue = ref({
    user: {
        id: 0,
        first_name: '',
        surname: '',
        email: ''
    },
    generalPresentationDecision: '',
    professionalFieldDecision1: '',
    professionalFieldDecision2: '',
})

let showEditModal = ref(false);
let showDeleteModal = ref(false);
let showNewLinkModal = ref(false);

let userToDelete = ref({});
let userToNewMail = ref({});

let deleteUser = (item: any) => {
    userToDelete.value = item;
    showDeleteModal.value = true;
}

let newMail = (item: any) => {
    userToNewMail.value = item;
    showNewLinkModal.value = true;
}

function confirmDelete() {
    Inertia.get(`/admin/user/${userToDelete.value.user.id}/delete`,);
}

function confirmNewMail() {
    Inertia.get(`/admin/user/${userToNewMail.value.user.id}/newLoginLink`,);
}


function showModal(item: any) {
    modalValue = item;
    showEditModal.value = true;
}


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
    {text: 'Vorname', value: 'user.first_name', sortable: true, width: 200},
    {text: 'Nachname', value: 'user.surname', sortable: true, width: 200},
    {text: 'Email', value: 'user.email'},
    {text: 'Präsentation', value: 'generalPresentationDecision', sortable: true},
    {text: 'Berufsfelder', value: 'professionalFields', sortable: true},
    {text: 'gewählt am', value: 'generalPresentationDecisionDate', sortable: true},
    {text: 'Aktionen', value: 'actions', sortable: false}
];


</script>


