Deine Berufsfelder, {{$user->first_name}}

@if(isset($professionalField1))
    {{$professionalField1->name}}
@else
    Kein Berufsfeld gewählt
@endif

@if(isset($professionalField2))
    {{$professionalField2->name}}
@else
    Kein Berufsfeld gewählt
@endif


@if(isset($generalPresentation))
    {{$generalPresentation->name}}
@else
    Kein Vortrag gewählt
@endif
