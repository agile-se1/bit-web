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
        <p class="mb-2 text-2xl font-bold tracking-tight text-bit-blue">Guten Tag {{$first_name}} {{ $last_name }},</p>
        <div class="flex-col justify-between">
            <div>
                <p>Wir haben gesehen, dass Sie noch keine Auswahl für den Berufsinformationstag getroffen haben. Damit
                    Sie nicht zufällig zu geteilt werden, wählen Sie doch gleiche Ihre Berufsfelder aus.</p>
                <br/>
                <div style="text-align: center;">
                    <a class="text-white font-bold py-2 px-4 rounded bg-bit-blue hover:shadow" href="{{ $link }}">
                        Zur Berufsfeldwahl
                    </a>
                </div>
                <br/>

                <p><b>Um Berufsfelder und Vortrag auszuwählen, folgen Sie bitte diesen Schritten:</b></p>
                <p>1. Klicken Sie auf den Knopf, der Sie zur Berufsfeldwahlseite weiterleitet</p>
                <p>2. Wählen Sie einen allgemeinen Vortrag und zwei Berufsfelder aus</p>
                <p>3. Bestätigen Sie ihre Wahl</p>
                <br>
                <p>Viel Erfolg bei der Auswahl</p>
                <br/>
                <p>Mit freundlichen Grüßen</p>
                <p>Alexandra Matthaei</p>
                <br/>
                <p class="text-gray-600">Sollten Sie noch Fragen haben, können Sie an <a
                        href="mailto:info@gm-bit.de" class="text-bit-blue">info@gm-bit.de</a> eine Email schicken,</p>
                <p class="text-gray-600">Sollte der Knopf nicht funktionieren. Können Sie auch diesen Link in Ihren
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
