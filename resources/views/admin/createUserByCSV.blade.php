<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <title>CreateUserByCSV</title>
</head>
<body>
    <h1>Upload CSV to create User</h1>

    <form method="post" action="/admin/createUserByCSV" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" id="file">
        @error('file')
        <p>{{$message}}</p>
        @enderror
        <input type="submit" value="Upload">
    </form>
</body>
</html>
