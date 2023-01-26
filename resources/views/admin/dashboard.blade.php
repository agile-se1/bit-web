<?php
use Illuminate\Support\Facades\Auth;
?>
<x-error/>

@auth('admin')
    <h1>Logged in</h1>
    <?php
    $user = Auth::guard()->user();
    print($user);
    ?>
@else
    <h1>Not logged in</h1>
@endauth

<h1>Admin Dashboard</h1>
