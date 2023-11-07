<!doctype html>
<html>
<head>
    <title>Der nächste BIT steht vor der Tü</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body>
<br/>
<div class="p-6 mx-auto bg-white border border-gray-200 rounded-lg flex shadow max-w-3xl">
    <div class="">
        <p class="mb-2 text-2xl font-bold tracking-tight text-bit-blue">Guten Tag {{$first_name}} {{ $last_name }}!</p>
        <div class="flex-col justify-between">
            <div>
                <p>Kommende Woche findet der nächste Berufsinformationstag statt. Als Erinnerung haben wir Ihnen noch
                    einmal ihre Auswahl
                    zusammengefasst.</p>
                <br/>

                <!-- Berufsfelder gewählt -->
                @if(isset($generalPresentation, $professionalField1, $professionalField2))
                    <div
                        class="p-4 m-2 min-w-full text-xl flex border border-gray-200 rounded-lg shadow max-h-fit items-center justify-between">
                        <label>
                            <b>Allgemeiner Vortrag:</b> {{ $generalPresentation->name }}
                        </label>
                    </div>

                    <div
                        class="p-4 m-2 min-w-full text-xl flex border border-gray-200 rounded-lg shadow max-h-fit items-center justify-between">
                        <label>
                            <b>Berufsfeld:</b> {{ $professionalField1->name }}
                        </label>
                    </div>

                    <div
                        class="p-4 m-2 min-w-full text-xl flex border border-gray-200 rounded-lg shadow max-h-fit items-center justify-between">
                        <label>
                            <b>Berufsfeld:</b> {{ $professionalField2->name }}
                        </label>
                    </div>

                @else
                    <div style="text-align: center;">
                        <p><b>Sie haben keine Auswahl getroffen und wurden entsprechend zugeteilt.</b></p>
                    </div>
                @endif

                <br/>

                <p>Wir hoffen wieder auf eine interessante und informative Veranstaltung und freuen uns, Sie nächste Woche begrüßen zu können.</p>
                <br/>
                <p>Mit freundlichen Grüßen</p>
                <p>Alexandra Matthaei und Diana Janicki</p>
                <br/>
                <p class="text-gray-600">Sollten Sie noch Fragen haben, können Sie an <a
                        href="mailto:alexandra.matthaei@ffgm.de" class="text-bit-blue">alexandra.matthaei@ffgm.de</a> eine Email schicken.</p>
            </div>
        </div>
    </div>
</div>
</body>
</html>


