@if(count($errors) > 0)
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
@endif

@auth
    <h1>Logged in</h1>
    <?php
        $user = Auth::user();
        print($user);
    ?>
@else
    <h1>Not logged in</h1>
@endauth

<br/>
<hr/>
<a href="/logout">Logout</a> <br/>
<a href="/testLoginLinks">Test Links</a> <br/>
<a href="/decision">Decision</a> <br/>
