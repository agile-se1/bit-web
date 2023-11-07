<template>
    <Layout>
        <div class="flex-col flex">
            <div class="text-center mb-5">
                <p class="text-bit-blue text-2xl font-bold md:font-normal md:text-6xl">Infos für Referenten</p>
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
                            <li>Allgemeine Vorträge zum Universitätsstudium, zu Ausbildungsberufen und dualem bzw.
                                trialem Studium
                            </li>
                            <li>Workshops zu zwei im Vorfeld gewählten Berufsfeldern</li>
                            <li>Networking & offener Austausch</li>
                        </ul>
                        <Link href="/arrival"
                              class="bg-bit-blue text-white p-2 px-5 max-w-fit rounded tracking-wide self-center md:self-start">
                            Zeitplan
                        </Link>

                </section>
                <section class="md:col-start-2 md:row-start-2">
                    <p class="text-bit-blue text-lg md:text-xl tracking-wide">Allgemeine Vorträge</p>
                    <p>
                        Den Schüler*innen werden verschiedene Wege vorgestellt, die sie nach dem Abitur gehen können.
                        Die Schüler*innen entscheiden sich, ob sie allgemeine Informationen zum Universitätsstudium oder
                        zu Ausbildungsberufen in der Industrie oder im Handwerk erhalten möchten. Vertreter der
                        Leibniz-Universität Hannover, der Industrie- und Handelskammer sowie der Handwerkskammer stehen
                        den Schüler*innen Rede und Antwort. So werden unter anderem die Möglichkeiten eines Dualen
                        Studiums sowie eines Trialen Studiums im Handwerk vorgestellt.
                    </p>

                    <p class="text-bit-blue text-lg md:text-xl mt-3 tracking-wide">Workshops zweier Berufsfelder</p>
                    <p>
                        Die Schüler*innen des 12. Jahrgangs haben im Vorfeld des BITs jeweils zwei aus dreizehn
                        Berufsfeldern gewählt, die sie am meisten interessieren. Die Workshops der Berufsfelder dauern
                        jeweils 75 Minuten. Zu Beginn der Workshops stellen sich die Referent*innen sowie ihre einzelnen
                        Berufe vor und stehen anschließend den Schüler*innen für Fragen zur Verfügung. Anschließend
                        wechseln die Schüler*innen zu ihrem zweiten Workshop (ihrem zweiten gewählten Berufsfeld) und
                        die Referent*innen begrüßen in ihrem Workshop eine neue Gruppe von Schüler*innen. Insofern ist
                        es wichtig, dass Sie als Referentin bzw. Referent den Raum ihres Workshops bitte nicht
                        verlassen, da in der Regel nach einer kurzen Kaffeepause eine zweite Gruppe von Schüler*innen
                        ihren Workshop besuchen wird.
                    </p>

                    <p class="text-bit-blue text-lg md:text-xl mt-3 tracking-wide">Networking & offener Austausch</p>
                    <p>
                        Im Anschluß an den BIT haben die Schüler*innen, im Rahmen eines kleinen Mittagsimbisses, die
                        Möglichkeit mit den Referent*innen in einen lockeren Austausch zu kommen und noch offene Fragen
                        bilateral besprechen zu können sowie erste Kontakte zu knüpfen.
                    </p>
                </section>
                <section class="md:row-start-3 md:col-start-1 md:col-span-2 my-4 flex flex-col items-center">
                    <div>
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
                    <div>

                        <a href="mailto:alexandra.matthaei@ffgm.de?subject=Referent für den BIT"
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
