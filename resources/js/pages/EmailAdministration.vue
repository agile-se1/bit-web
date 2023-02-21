<template>
    <Layout>
        <div class="flex flex-col items-center justify-between w-full">
            <p class="text-bit-blue text-4xl font-bold">Email-Verwaltung</p>
            <div class="flex flex-wrap justify-between gap-10">
                <div
                    class="w-full hover:bg-gray-100 max-h-fit max-w-fit border-gray-200 border rounded p-4 flex-1 cursor-pointer ml-10">
                    <div @click="showAnmeldeLinkModal = true">
                        <p class="text-white bg-bit-blue rounded text-2xl p-2 my-2 text-center">Anmelde-Link
                            versenden</p>
                        <p class="break-normal">Versenden Sie eine Email an alle Nutzer, um ihnen den Anmeldelink
                            zukommen zu lassen und eine Wahl der Berufsfelder zu ermöglichen.</p>
                    </div>
                </div>


                <div
                    class="hover:bg-gray-100 max-h-fit max-w-fit border-gray-200 border rounded p-4 flex-1 cursor-pointer">
                    <div @click="showReminderModal = true">
                        <p class="text-white bg-bit-blue rounded text-2xl p-2 my-2 text-center">Erinnerungsmail
                            versenden</p>
                        <p>Versenden Sie eine Email, die daran erinnert eine Präsentation, sowie zwei Berufsfelder zu
                            wählen.</p>
                    </div>
                </div>


                <div
                    class="hover:bg-gray-100 max-h-fit max-w-fit border-gray-200 border rounded p-4 flex-1 cursor-pointer mr-10">
                    <div @click="showInfoMailModal = true">
                        <p class="text-white bg-bit-blue rounded text-2xl p-2 my-2 text-center">Info-Mail versenden</p>
                        <p>Versenden Sie eine Email an alle Nutzer, um ihnen die finalen Informationen für den BIT
                            zukommen zu lassen.</p>
                    </div>
                </div>
            </div>
            <div class="w-full flex justify-start">
                <Link href="/admin/dashboard" class="bg-bit-blue text-white rounded p-2 mb-2 ml-10">
                    <font-awesome-icon icon="fa-solid fa-arrow-left" class="ml-2"/>
                    Zurück zum Dashboard
                </Link>
            </div>
            <BitConfirmModal title="Link zum Anmelden versenden?" confirm-button-text="Senden"
                             text="Sind Sie sicher, dass Sie den Link zum Anmelden an alle Nutzer versenden möchten?"
                             @confirm="sendLinkToAllUsers" @cancel="showAnmeldeLinkModal = false"
                             v-model="showAnmeldeLinkModal"/>
            <BitConfirmModal title="Erinnerung zur Berufswahl versenden?" confirm-button-text="Senden"
                             text="Sind Sie sicher, dass Sie eine Erinnerung an alle Nutzer, ohne gültige Auswahl, versenden möchten?"
                             @confirm="sendReminderMail" @cancel="showReminderModal = false"
                             v-model="showReminderModal"/>
            <BitConfirmModal title="Finales Infos versenden?" confirm-button-text="Senden"
                             text="Sind Sie sicher, dass Sie die finalen Informationen zum BIT versenden möchten?"
                             @confirm="sendInfoMail" @cancel="showInfoMailModal = false" v-model="showInfoMailModal"/>
        </div>
    </Layout>

</template>

<script setup>
import Layout from "@/components/Layout.vue";
import BitConfirmModal from "@/components/BitConfirmModal.vue";
import {ref} from "vue";
import {Inertia} from "@inertiajs/inertia";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import {Link} from "@inertiajs/inertia-vue3";

let showAnmeldeLinkModal = ref(false);
let showReminderModal = ref(false);
let showInfoMailModal = ref(false);

function sendLinkToAllUsers() {
    Inertia.get('/admin/email/sendLoginLinkMailToAllUsers');
    showAnmeldeLinkModal = false;
    alert("Emails wurden versendet");
}

function sendReminderMail() {
    Inertia.get('/admin/email/sendDecisionReminderMailToAllUsers');
    showReminderModal = false;
    alert("Emails wurden versendet");
}

function sendInfoMail() {
    Inertia.get('/admin/email/sendBeforeBITMailToAllUsers');
    showInfoMailModal = false;
    alert("Emails wurden versendet");
}


</script>
