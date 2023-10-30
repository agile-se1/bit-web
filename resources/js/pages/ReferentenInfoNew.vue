<template>
    <Layout>
        <div class="flex-col flex">
            <div class="text-center mb-5">
                <p class="text-bit-blue text-2xl font-bold md:font-normal md:text-6xl">Infos für Referenten</p>
                <p class="text-bit-blue text-lg md:text-2xl">...oder alle die es noch werden wollen</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 text-bit-blue mx-4 md:mx-32 mt-10 gap-6 gap-y-6 mb-8 ">
                <section class="flex-col flex justify-start md:row-start-1 md:col-span-2">
                        <p class="text-bit-blue text-xl md:text-2xl font-semibold">Was ist der BIT?</p>
                        <p>
                            Der Berufsinformationstag, oder kurz BIT, findet seit 2008 am Gymnasium Mellendorf statt und
                            bietet den Schüler*innen die Möglichkeit erste Einblicke in das Berufsleben zu gewinnen.
                        </p>
                </section>
                <section class="flex justify-start flex-col self-center md:row-start-2 md:col-start-1">
                        <p class="text-bit-blue text-xl md:text-2xl font-semibold">Was passiert beim BIT?</p>
                        <p class="text-bit-blue text-lg md:text-xl">Der BIT besteht aus drei Modulen:</p>
                        <ul class="list-decimal list-inside mb-4">
                            <li>Allgemeine Präsentationen</li>
                            <li>Präsentation zweier Branchen</li>
                            <li>Networking & offener Austausch</li>
                        </ul>
                        <Link href="/arrival"
                              class="bg-bit-blue text-white p-2 px-5 max-w-fit rounded tracking-wide self-center md:self-start">
                            Zeitplan
                        </Link>

                </section>
                <section class="md:col-start-2 md:row-start-2">
                    <p class="text-bit-blue text-lg md:text-xl tracking-wide">Allgemeine Präsentationen</p>
                    <p>
                        Den Schülern werden verschiedene Wege vorgestellt, die sie nach dem Abitur gehen könnten.
                        Dabei werden Möglichkeiten wie die Duale Ausbildung oder ein Studium aber nur allgemein
                        vorgestellt und es wird nicht in detailliert über spezielle Ausbildungen oder Studiengänge gesprochen.
                    </p>

                    <p class="text-bit-blue text-lg md:text-xl mt-3 tracking-wide">Branchenspezifische Vorträge</p>
                    <p>
                        Die Referenten präsentieren sich in zwei Gruppen, die jeweils 30 Minuten lang die
                        Schüler*innen informieren. Die Referenten haben die Möglichkeit, sich in der ersten Gruppe
                        vorzustellen und anschließend Fragen zu beantworten. In der zweiten Gruppe können die Referenten dann noch einmal Fragen beantworten und sich mit den Schüler*innen austauschen.
                    </p>

                    <p class="text-bit-blue text-lg md:text-xl mt-3 tracking-wide">Networking & offener Austausch</p>
                    <p>
                        In der letzten Stunde des BITs haben die Schüler*innen die Möglichkeit, sich mit den
                        Referenten auszutauschen und sich über die verschiedenen Berufsfelder zu informieren. Die
                        Referenten können sich in dieser Zeit auch mit den Schüler*innen austauschen und
                        gegebenenfalls Kontakte knüpfen oder offene Fragen klären.
                    </p>
                </section>
                <section class="md:row-start-3 md:col-start-1 md:col-span-2 my-4 flex flex-col items-center">
                    <div>
                        <p class="text-bit-blue text-xl md:text-2xl font-semibold">Warum sollten Sie als Referent beim BIT mitwirken?</p>
                        <p class="mb-4">
                            Viele Schüler*innen haben noch keinen Plan, wie ihr Weg nach dem Abitur weitergehen soll.
                            Vielmehr
                            kennen sie gar nicht die Türen, die ihnen nach dem Abitur offen stehen. Der BIT bietet Ihnen
                            die
                            Möglichkeit Ihren Beruf vorzustellen, junge Menschen für Ihre Branche zu begeistern und
                            ihnen
                            einzigartige Einblicke in Ihr Berufsleben zu bieten.
                        </p>
                    </div>
                    <div class="">
                        <!-- TODO: Mail Adresse anpassen -->
                        <a href="mailto:*mailAdresseEinfügen*?subject=Referent für den BIT"
                           class="bg-bit-blue text-white text-xl md:text-2xl p-2 rounded">Jetzt als Referent
                            anmelden!</a>
                    </div>
                </section>
                <section class="md:row-start-4 md:col-start-1 md:col-span-2 flex flex-col">
                    <p class="text-bit-blue text-xl md:text-2xl font-semibold">Tipps für Ihren Vortrag</p>
                    <p>
                        Wir bitten in jeder Referentengruppe einen „Moderator“, nach dem Eintreffen der SchülerInnen eine
                        kurze Begrüßung und die Abfrage der Namen zu übernehmen und auch die Zeit im Auge zu
                        behalten.<br><br>

                        Dann folgt eine kurze Vorstellung der einzelnen Referenten mit Informationen zu ihrem beruflichen
                        Werdegang. Grundsätzlich geht es beim BIT nicht nur um die Darstellung des Studiums bzw. der
                        Ausbildung, sondern vielmehr um die ganz persönlichen und authentischen Erfahrungen unserer
                        Referenten:</p>
                    <ul class="list-disc p-1 ml-4">
                        <li>Warum und mit welchen Vorstellungen haben Sie Ihr Studium / Ihre Ausbildung begonnen?</li>

                        <li>Ist es heute noch der Beruf, den Sie sich ausgesucht / erträumt hatten (Wunsch und
                            Wirklichkeit)?
                        </li>

                        <li>Haben Sie zwischendurch „Richtungswechsel“ vorgenommen?</li>

                        <li>Welche Entwicklungsmöglichkeiten bestehen, bzw. was kann man alles mit Ihrem Studienfach / Ihrer
                            Ausbildung als Grundlage „anfangen“, welche anderen Fachbereiche werden tangiert?
                        </li>
                    </ul>
                    <p>
                        Natürlich können Sie auch einen ganz anderen Einstieg wählen. Die Hauptsache ist es, dass Sie mit
                        den Schüler*innen in ein angeregtes Gespräch kommen. <br><br>

                        Im Anschluss an die Vorstellungsrunde sollte genügend Zeit für Fragen bleiben - einige
                        Schülergruppen sind diesbezüglich sehr rege und interessiert!
                    </p>
                </section>
            </div>
        </div>
    </Layout>
</template>


<script setup>
import Layout from "@/components/Layout.vue";
import {Link} from "@inertiajs/inertia-vue3";


</script>
