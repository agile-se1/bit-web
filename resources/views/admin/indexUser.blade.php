<h1>User data</h1>

<table class="table table-sm">
    <thead>
    <tr>
        <th>Vorname</th>
        <th>Nachname</th>
        <th>Email</th>
        <th>Generelle Presentation</th>
        <th>Berufsfeld 1</th>
        <th>Berufsfeld 2</th>
        <th>Auswahldatum oder Änderungsdatum</th>
    </tr>
    </thead>
    <tbody>
        @foreach($data as $userData)
            <tr>
                <td>{{$userData['user']->first_name}}</td>
                <td>{{$userData['user']->surname}}</td>
                <td>{{$userData['user']->email}}</td>
                <td>{{$userData['generalPresentationDecision']}}</td>
                <td>{{$userData['professionalFieldDecision1']}}</td>
                <td>{{$userData['professionalFieldDecision2']}}</td>
                <td>{{$userData['decisionDate']}}</td>
            </tr>
        @endforeach
    </tbody>
</table>