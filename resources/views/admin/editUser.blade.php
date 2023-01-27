{{
    $user = $data['user']
}}

<h1>Edit user ({{$data['user']->first_name}} {{$data['user']->surname}})</h1>

<form method="POST" action="/admin/user/{{$data['user']->id}}">
    <input type="text" value="{{$data['user']->first_name}}" name="firstName" placeholder="Vorname"> <br/>
    <input type="text" value="{{$data['user']->surname}}" name="surname" placeholder="Nachname"> <br/>
    <input type="text" value="{{$data['user']->email}}" name="email" placeholder="Email"> <br/>
    <input type="text" value="{{$data['generalPresentationDecision']}}" name="generalPresentation" placeholder="Generelle Presentation"> <br/>
    <input type="text" value="{{$data['professionalFieldDecision1']}}" name="professionalPresentation1" placeholder="Berufsfeld 1"> <br/>
    <input type="text" value="{{$data['professionalFieldDecision2']}}" name="professionalPresentation2" placeholder="Berufsfeld 2"> <br/>

    <input type="Submit" value="Speichern">
</form>
