<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <title>CreateUserByCSV</title>
</head>
<body>
    <h1>Upload CSV to create User</h1>

    <x-error/>

    @if (\Session::has('success'))
        <p>{!! \Session::get('success') !!}</p>
    @endif

    <form method="post" action="/admin/createUserByCSV" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" id="file">
        <input type="submit" value="Upload">
    </form>
</body>
</html>
