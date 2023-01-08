<h1>Decision</h1>

<h2>General Presentation</h2>
@unless(count($generalPresentations) == 0)
    @foreach($generalPresentations as $generalPresentation)
        <h3>{{$generalPresentation->name}} (ID:{{$generalPresentation->id}})</h3>
        <p>{{$generalPresentation->description}}</p>
        <hr/>
    @endforeach
@else
    <p>There are no general presentations</p>
@endunless

<h2>Professional fields</h2>
@unless(count($professionalFields) == 0)
    @foreach($professionalFields as $professionalField)
        <h3>{{$professionalField->name}} (ID:{{$professionalField->id}})</h3>
        <p>{{$professionalField->description}}</p>
        <p>{{$professionalField->current_count}} / {{$professionalField->max_count}}</p>
        <hr/>
    @endforeach
@else
    <p>There are no general presentations</p>
@endunless

