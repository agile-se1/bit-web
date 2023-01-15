<h1>Deine Berufsfelder, {{$user->first_name}}</h1>

@if(isset($professionalField1))
    <h2>{{$professionalField1->name}}</h2>
@else
    <h2>Kein Berufsfeld gewählt</h2>
@endif

@if(isset($professionalField2))
    <h2>{{$professionalField2->name}}</h2>
@else
    <h2>Kein Berufsfeld gewählt</h2>
@endif

@if(isset($generalPresentation))
    <h2>{{$generalPresentation->name}}</h2>
@else
    <h2>Kein Vortrag gewählt</h2>
@endif

