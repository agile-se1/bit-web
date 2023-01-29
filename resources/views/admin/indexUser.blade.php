<h1>User data</h1>

<x-message/>

<table class="table table-sm">
    <thead>
    <tr>
        <th>Vorname</th>
        <th>Nachname</th>
        <th>Email</th>
        <th>Generelle Presentation</th>
        <th>Auswahldatum oder Änderungsdatum</th>
        <th>Berufsfeld 1</th>
        <th>Auswahldatum oder Änderungsdatum</th>
        <th>Berufsfeld 2</th>
        <th>Auswahldatum oder Änderungsdatum</th>
        <th>Ändern</th>
        <th>Neuer LoginLink</th>
        <th>Löschen</th>
    </tr>
    </thead>
    <tbody>
        @foreach($data as $userData)
            <tr>
                <td>{{$userData['user']->first_name}}</td>
                <td>{{$userData['user']->surname}}</td>
                <td>{{$userData['user']->email}}</td>
                <td>{{$userData['generalPresentationDecision']}}</td>
                <td>{{$userData['generalPresentationDecisionDate']}}</td>
                <td>{{$userData['professionalFieldDecision1']}}</td>
                <td>{{$userData['professionalFieldDecision1Date']}}</td>
                <td>{{$userData['professionalFieldDecision2']}}</td>
                <td>{{$userData['professionalFieldDecision2Date']}}</td>
                <td><a href="/admin/user/{{$userData['user']->id}}/edit">Edit</a></td>
                <td><a href="/admin/user/{{$userData['user']->id}}/newLoginLink">Senden</a></td>
                <td><a href="/admin/user/{{$userData['user']->id}}/delete">Löschen</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
