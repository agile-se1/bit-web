<!doctype html>
<html>
<head>
    <title>Sie haben noch keine Auswahl getroffen</title>
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
                <p>Die Berufsfeldwahl für den BIT ist nun freigeschaltet. Nutzen Sie diese Gelegenheit, um Einblicke in
                    die Arbeitswelt zu gewinnen und sich von Experten beraten zu lassen. Bitte klicken Sie auf den
                    Button, um eine Auswahl zu treffen.</p>
                <br/>
                <div style="text-align: center;">
                    <a class="text-white font-bold py-2 px-4 rounded bg-bit-blue hover:shadow" href="{{ $link }}">
                        Zur Berufsfeldwahl
                    </a>
                </div>
                <br/>

                <p><b>Um Berufsfelder und Vortrag auszuwählen, folgen Sie bitte diesen Schritten:</b></p>
                <p>1. Klicken Sie auf den Button, der Sie zur Berufsfeldwahlseite weiterleitet</p>
                <p>2. Wählen Sie einen allgemeinen Vortrag und zwei Berufsfelder aus</p>
                <p>3. Bestätigen Sie ihre Wahl</p>
                <br>
                <p>Viel Erfolg bei der Auswahl</p>
                <br/>
                <p>Mit freundlichen Grüßen</p>
                <p>Alexandra Matthaei und Diana Janicki</p>
                <br/>
                <p class="text-gray-600">Sollten Sie noch Fragen haben, können Sie an <a
                        href="mailto:alexandra.matthaei@ffgm.de" class="text-bit-blue">alexandra.matthaei@ffgm.de</a> eine Email schicken,</p>
                <p class="text-gray-600">Sollte der Button nicht funktionieren. Können Sie auch diesen Link in Ihren
                    Browser eingeben:</p>
                <div style="text-align: center;">
                    <p class="text-gray-600">{{ $link }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>



