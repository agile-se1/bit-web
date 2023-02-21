<template>
    <Layout>
        <div class="flex flex-col items-center justify-between h-full">
            <p class="text-bit-blue text-4xl mb-10 font-bold">Admin-Dashboard</p>
            <div class="flex flex-wrap justify-between gap-10">
                <div class="w-full hover:bg-gray-100 max-h-fit max-w-fit border-gray-200 border rounded p-4">
                    <Link href="/admin/user">
                        <p class="text-white bg-bit-blue rounded text-2xl p-2 my-2 text-center">Nutzerverwaltung</p>
                        <p class="text-gray-800 mt-2">Funktionen:</p>
                        <ul class="list-disc pl-4">
                            <li class="text-gray-700">Alle Nutzer einsehen</li>
                            <li class="text-gray-700">Nutzer hinzufügen</li>
                            <li class="text-gray-700">Nutzer löschen</li>
                        </ul>
                    </Link>
                </div>


                <div class="hover:bg-gray-100 max-h-fit max-w-fit border-gray-200 border rounded p-4">
                    <Link>
                        <p class="text-white bg-bit-blue rounded text-2xl p-2 my-2 text-center">Emails</p>
                        <p class="text-gray-800 mt-2">Funktionen:</p>
                        <ul class="list-disc pl-4">
                            <li class="text-gray-700">Anmeldemails versenden</li>
                            <li class="text-gray-700">Erinnerungsmails versenden</li>
                            <li class="text-gray-700">Infomails versenden</li>
                        </ul>
                    </Link>
                </div>


                <div class="hover:bg-gray-100 max-h-fit max-w-fit border-gray-200 border rounded p-4 cursor-pointer">
                    <div @click="showResetModal = true">
                        <p class="text-white bg-red-700 rounded text-2xl p-2 my-2 text-center">Gefahrenzone</p>
                        <p class="text-gray-800 mt-2">Funktionen:</p>
                        <ul class="list-disc pl-4">
                            <li class="text-gray-700">BIT-Seite zurücksetzen</li>
                        </ul>
                    </div>
                </div>


            </div>
        </div>
        <BitConfirmModal title="BIT-Seite zurücksetzten?" confirm-button-text="Zurücksetzen"
                         text="Möchten Sie die BIT-Seite wirklich zurücksetzen? Alle Daten werden gelöscht und können nicht wiederhergestellt werden."
                         v-model="showResetModal" @confirm="resetBIT" @cancel="showResetModal = false" type="danger"/>

    </Layout>


</template>


<script setup>

import Layout from "@/components/Layout.vue";
import {Link} from "@inertiajs/inertia-vue3";
import {ref} from "vue";
import BitConfirmModal from "@/components/BitConfirmModal.vue";
import {Inertia} from "@inertiajs/inertia";

let showResetModal = ref(false);

function resetBIT() {
    Inertia.get('/admin/reset');
    alert('BIT-Seite wurde zurückgesetzt!')
}

</script>
