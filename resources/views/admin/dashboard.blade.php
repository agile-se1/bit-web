<?php
use Illuminate\Support\Facades\Auth;
?>
<x-error/>
<x-message/>

@auth('admin')
    <h2>Logged in</h2>

    <h1>Admin Dashboard</h1>
    <h2>Emails</h2>
    <a href="/admin/email/sendLoginLinkMailToAllUsers">Login Link to all Users</a><br/>
    <a href="/admin/email/sendBeforeBITMailToAllUsers">Before Bit Email to all Users</a><br/>
    <a href="/admin/email/sendDecisionReminderMailToAllUsers">Decision Reminder Mail to all Users</a><br/>

    <h2>User</h2>
    <a href="/admin/user">Index all user</a><br/>
    <a href="/admin/createUserByCSV">Create User to CSV</a><br/>


    <h2>Admin Stuff</h2>
    <a href="/admin/logout">Logout</a><br/>


@else
    <h1>Not logged in</h1>
@endauth
