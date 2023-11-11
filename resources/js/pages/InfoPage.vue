

<template>
    <Layout>
        <div class="flex flex-col text-justify break-after-auto md:text-left">

            <p class="bg-bit-blue text-white md:text-6xl text-xl mx-2 p-4 text-center font-semibold">Der BIT am Gymnasium Mellendorf</p>
            <div class="text-bit-blue w-full flex flex-col mt-5">
                <div class="p-4 mx-32">
                    <p class="text-bit-blue text-center font-semibold md:text-3xl text-lg">Wie alles begann:</p>
                    <p class=" text-bit-blue text-sm md:text-lg leading-relaxed">
                        Aufgrund des großen Wunsches zahlreicher Schüler*innen und Eltern, dem Thema Berufsinformation am
                        Gymnasium Mellendorf einen höheren Stellenwert einzuräumen, organisierten Karen Drews (Erste
                        Vorsitzende des FFGM) und Jutta Holtmann (damals SER-Vorstand) im Jahr 2008 den ersten
                        <strong>B</strong>erufs<strong>I</strong>nformations<strong>T</strong>ag des Gymnasium
                        Mellendorfs.
                    </p>
                </div>
            </div>

            <div class="flex flex-col md:flex-row gap-y-2 justify-around mt-5 mx-32">
                <div class="flex flex-col p-2">
                    <img src="/img_3.png" alt="Foto von Alexandra Matthaei" class="max-h-60 pb-2 object-contain">
                    <label class="text-center text-bit-blue">
                        Alexandra Matthaei <br>
                        Aktuelle Organisatorin des BITs
                    </label>
                </div>
                <div class="flex flex-col p-2">
                    <img src="/img_4.png" alt="Foto von Karen Drews" class="max-h-60 object-contain">
                    <label class="text-center text-bit-blue">
                        Karen Drews <br>
                        Gründerin des BITs
                    </label>
                </div>
                <div class="flex flex-col p-2">
                    <img src="/img_5.png" alt="Foto von Jutta Holtmann" class="max-h-60 object-contain">
                    <label class="text-center text-bit-blue">
                        Jutta Holtmann <br>
                        Gründerin des BITs
                    </label>
                </div>
            </div>

            <div class="w-full flex flex-col mt-10">
                <div class="p-4 mx-32">
                    <p class="text-bit-blue text-left font-semibold text-xl">Als Referent*innen für diese Veranstaltung
                        wurden Eltern, Fördervereinsmitglieder und vor allem Ehemalige des Gymnasiums Mellendorf
                        angesprochen. Dies motivierte die beiden engagierten Gründerinnen zur weiteren Planung der
                        Veranstaltung, deren Ziele damals wie heute in erster Linie sein sollen:
                    </p>
                    <ul class="list-disc text-bit-blue list-inside text-left">
                        <li>
                            Zusammenführung des 12. Jahrgangs mit Eltern, Ehemaligen, Firmen aus der Wedemark oder
                            der Region, die in unterschiedlichen Berufen arbeiten.
                        </li>
                        <li>
                            Vermittlung von Informationen über verschiedene Berufsfelder und Studienmöglichkeiten.
                        </li>
                        <li>
                            Einblick in persönliche Werdegänge, insbesondere solche, die trotz Brüchen erfolgreich sind,
                            so dass den jungen Menschen die Angst vor etwaigen Fehlentscheidungen genommen wird.
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Adjust the following section and styles for responsiveness -->
            <div class="flex flex-col mt-10">
                <div class="p-4 mx-32 flex flex-col items-center">
                    <p class="text-bit-blue text-center font-semibold text-2xl mb-2">Übersicht der Berufsfelder: </p>
                    <div class="max-w-fit">
                        <ul class=" text-bit-blue md:columns-2 text-left md:text-justify">
                            <li class="border-blue-200 border-2  p-2 max-w-fit my-2">
                                Polizei / Zoll
                            </li>
                            <li class="border-blue-200 border-2  rounded p-2 max-w-fit my-2">
                                Bundeswehr / Luftfahrt
                            </li>
                            <li class="border-blue-200 border-2  rounded p-2  max-w-fit my-2">
                                Theater / Musik / Gestaltung
                            </li>
                            <li class="border-blue-200 border-2  rounded p-2 max-w-fit my-2">
                                Medizin / Psychologie / Pharmazie
                            </li>
                            <li class="border-blue-200 border-2  rounded p-2 max-w-fit my-2">
                                Medien / Mediengestaltung
                            </li>
                            <li class="border-blue-200 border-2  rounded p-2 max-w-fit my-2">
                                Architektur
                            </li>
                            <li class="border-blue-200 border-2  rounded p-2 max-w-fit my-2">
                                Maschinenbau / Elektrotechnik
                            </li>
                            <li class="border-blue-200 border-2  rounded p-2 max-w-fit my-2">
                                Sportmanagement / Eventmanagement von Musikgroßveranstaltungen
                            </li>
                            <li class="border-blue-200 border-2  rounded p-2 max-w-fit my-2">
                                Eventmanagement / Tourismus / Hotel
                            </li>
                            <li class="border-blue-200 border-2  rounded p-2 max-w-fit my-2">
                                Jura / Steuerberatung / Logistik /Wirtschaftswissenschaften
                            </li>
                            <li class="border-blue-200 border-2  rounded p-2 max-w-fit my-2">
                                Chemie / Biologie / Geowissenschaften
                            </li>
                            <li class="border-blue-200 border-2  rounded p-2 max-w-fit my-2">
                                Lehramt / Sozialpädagogik / Sozialwissenschaften
                            </li>
                            <li class="border-blue-200 border-2  rounded p-2 max-w-fit my-2">
                                Mathe / Informatik
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <p class="text-bit-blue text-center font-semibold text-3xl mt-5" id="timetable">Ablauf</p>
            <ul class="flex flex-col text-bit-blue my-2 mb-8 p-4">
                <li class="text-bit-blue rounded mx-32 py-2">
                    <p> Nach einer Begrüßung und dem „allgemeinen Teil“, in dem die Schüler*innen zeitgleich je nach
                        Interesse Informationen zum Universitätsstudium, zum dualen Studium (Industrie- und
                        Handelskammer) oder zu Ausbildungsmöglichkeiten im Handwerk sowie dem trialen Studium (Handwerkskammer) erhalten, findet
                        eine Kaffeepause statt.
                    </p>
                </li>
                <li class="text-bit-blue rounded mx-32 py-2">
                    <p> Anschließend versammeln sich die Schülergruppen je nach Wahl in den entsprechenden
                        Berufsfeldgruppen und nach ca. einer Stunde wechseln die Schüler*innen zum Workshop ihres zweiten Wunsches.
                        Den Schüler*innen stehen hervorragende Referent*innen Rede und Antwort; vielfach sind es junge
                        Menschen am Anfang der Berufstätigkeit bzw. in Ausbildung, deren Ausführungen von langjährige
                        Berufstätigen mit großer Erfahrung ergänzt werden - oder auch umgekehrt, kurz Informationen aus
                        vielerlei Perspektiven werden weitergegeben.
                    </p>
                </li>
                <li class="text-bit-blue rounded mx-32 py-2">
                    <p>
                        Ein Mittagsimbiss mit vielen netten und anregenden Gesprächen zwischen den Referent*innen sowie Schüler*innen bildet den Abschluss des Vormittags.
                    </p>
                </li>
            </ul>
        </div>
    </Layout>
</template>

<script setup>
import Layout from "@/components/Layout.vue";
</script>

