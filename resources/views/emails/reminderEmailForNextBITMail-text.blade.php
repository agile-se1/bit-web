Guten Tag {{ $first_name }} {{ $last_name }},
Nächste Woche findet der nächste Berufsinformationstag statt. Als Erinnerung haben wir Ihnen noch einmal ihre Auswahl zusammengefasst.

@if(isset($generalPresentation, $professionalField1, $professionalField2))
    Allgemeiner Vortrag: {{ $generalPresentation->name }}
    Berufsfeld: {{ $professionalField1->name }}
    Berufsfeld: {{ $professionalField2->name }}

@else
    Sie haben keine Auswahl getroffen und wurden entsprechend zugeteilt.
@endif

Mit freundlichen Grüßen
Alexandra Matthaei
