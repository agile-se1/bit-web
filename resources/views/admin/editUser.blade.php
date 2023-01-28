{{
    $user = $data['user']
}}

<x-error/>

<h1>Edit user ({{$data['user']->first_name}} {{$data['user']->surname}})</h1>

<form method="POST" action="/admin/user/{{$data['user']->id}}/update">
    @CSRF
    <input type="text" value="{{$data['user']->first_name}}" name="firstName" placeholder="Vorname"> <br/>
    <input type="text" value="{{$data['user']->surname}}" name="surname" placeholder="Nachname"> <br/>
    <input type="text" value="{{$data['user']->email}}" name="email" placeholder="Email"> <br/>
    <input type="text" value="{{$data['generalPresentationDecision']}}" name="generalPresentationDecision" placeholder="Generelle Presentation"> <br/>
    <input type="text" value="{{$data['professionalFieldDecision1']}}" name="professionalFieldDecision1" placeholder="Berufsfeld 1"> <br/>
    <input type="text" value="{{$data['professionalFieldDecision2']}}" name="professionalFieldDecision2" placeholder="Berufsfeld 2"> <br/>

    <input type="hidden" value="{{$data['generalPresentationDecision']}}" name="generalPresentationDecisionOld">
    <input type="hidden" value="{{$data['professionalFieldDecision1']}}" name="professionalFieldDecision1Old">
    <input type="hidden" value="{{$data['professionalFieldDecision2']}}" name="professionalFieldDecision2Old">

    <input type="Submit" value="Speichern">
</form>
