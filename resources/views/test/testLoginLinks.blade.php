<?php
    use App\Models\User;
?>
<h1>Links</h1>
<h2>Working</h2>
<x-error/>
<?php
    $user = User::where('id', '=', 1)->first();

    echo '<a href="/login/' . $user->hash .'">Token for user 1: "'. $user->hash . '"</a>';

?>

<h2>Not working</h2>
<a href="/login/45454e89942c1d">Token: "45454e89942c1d"</a>
<a href="/login/ ">Token: " "</a>
