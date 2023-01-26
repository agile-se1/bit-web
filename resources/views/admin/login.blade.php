<h1>
    Login Admin
</h1>

<x-error/>

<form method="POST" action="/admin/login">
    @CSRF

    <input placeholder="Username" name="username">
    <input placeholder="Pasword" name="password">
    <input type="submit" value="Login">
</form>
