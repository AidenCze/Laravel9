<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Změna hesla</h1>
<form action="{{ url('/change_password') }}" method="POST">
    @csrf
    <label for="password">Staré heslo</label>
    <input type="password" name="password" id="password">
    <label for="newpassword">Nové heslo</label>
    <input type="password" name="newpassword" id="newpassword">
    <label for="newpasswordagain">Nové heslo znovu</label>
    <input type="password" name="newpasswordagain" id="newpasswordagain">
    <input type="submit" name="submit" id="submit">
</form>
<p>{{ session('msg') }}</p>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
    @endif

</body>
</html>
