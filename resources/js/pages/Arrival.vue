<template>
    <Layout>
        <div
            class="grid grid-cols-1 md:grid-cols-2 text-bit-blue mx-4 md:mx-32 mt-10 gap-6 gap-y-6 mb-8"
        >
            <section class="row-start-1 col-span-1 flex-col flex">
                <p
                    class="text-bit-blue text-xl md:text-2xl font-semibold text-center mb-2"
                >
                    Wann und wo?
                </p>
                <div class="flex gap-5 flex-col md:flex-row">
                    <div class="flex">
                        <p class="font-semibold pr-1">Termin:</p>
                        <p>
                            Freitag, der 08. März 2024 <br />09:00 - 13:45 Uhr
                        </p>
                    </div>
                    <div class="flex">
                        <p class="font-semibold pr-1">Ort:</p>
                        <p class="text-left">
                            PZH – Produktionstechnisches Zentrum Hannover <br />
                            (Einrichtung der Leibniz-Universität)<br />
                            An der Universität 2<br />
                            30823 Garbsen<br />
                        </p>
                    </div>
                </div>
                <iframe
                    class="google-map p-4 m-5 min-h-1/2 min-w-1/2 flex-grow"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2432.958370969627!2d9.615284216506913!3d52.42555197979622!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47b07113df15f1ed%3A0xac56b13dd80b3fd7!2sTEWISS%20-%20Technik%20und%20Wissen%20GmbH!5e0!3m2!1sde!2sde!4v1571311822456!5m2!1sde!2sde"
                ></iframe>
            </section>
            <section>
                <p
                    class="text-bit-blue text-xl md:text-2xl font-semibold text-center mb-2"
                >
                    Ablauf
                </p>
                <table class="w-full">
                    <thead>
                        <tr>
                            <th
                                class="w-1/4 text-left text-bit-blue font-bold border-b-2 border-bit-blue"
                            >
                                Zeit
                            </th>
                            <th
                                class="w-3/4 text-left text-bit-blue font-bold border-l border-bit-blue border-b-2"
                            >
                                Aktivität
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="w-1/4 py-2">09:00</td>
                            <td class="w-3/4 py-2 border-l border-bit-blue">
                                Begrüßung
                            </td>
                        </tr>
                        <tr>
                            <td class="w-1/4 py-2">09:30</td>
                            <td class="w-3/4 py-2 border-l border-bit-blue">
                                Allgemeine Vorträge
                            </td>
                        </tr>
                        <tr>
                            <td class="w-1/4 py-2">10:30</td>
                            <td class="w-3/4 py-2 border-l border-bit-blue">
                                Kaffeepause & Eintreffen der Referenten
                            </td>
                        </tr>
                        <tr>
                            <td class="w-1/4 py-2">11:00 - 12:15</td>
                            <td class="w-3/4 py-2 border-l border-bit-blue">
                                Berufsinformation Teil 1
                            </td>
                        </tr>
                        <tr>
                            <td class="w-1/4 py-2">12:30 - 13:45</td>
                            <td class="w-3/4 py-2 border-l border-bit-blue">
                                Berufsinformation Teil 2
                            </td>
                        </tr>
                        <tr>
                            <td class="w-1/4 py-2">ab 13:45</td>
                            <td class="w-3/4 py-2 border-l border-bit-blue">
                                Networking
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p class="mt-3">
                    Natürlich sind auch alle Referenten schon zur Begrüßung
                    herzlich willkommen und wir freuen uns, wenn Sie den
                    Schülerinnen und Schülern auch noch nach 13:45 Uhr, beim
                    Networking, für Fragen und Gespräche zur Verfügung stehen.
                </p>
            </section>
        </div>
    </Layout>
</template>

<script setup>
import Layout from "@/components/Layout.vue";
</script>
