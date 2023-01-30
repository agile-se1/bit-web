<h1>Create new User</h1>

<form method="POST" action="/admin/user/store">
    @CSRF
    <input type="text" placeholder="Vorname" name="firstName"><br/>
    <input type="text" placeholder="Nachname" name="surname"><br/>
    <input type="email" placeholder="Email" name="email"><br/>
    <input type="submit"><br/>
</form>
