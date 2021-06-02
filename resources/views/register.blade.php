@extends('layouts.layout')

@section('content')
<form action="" method="POST">
@csrf
<label for="username">Jmeno</label>
<input type="text" id="username" name="username">
<label for="email">Email</label>
<input type="text" id="email" name="email">
<label for="password">Heslo</label>
<input type="text" id="password" name="password">
<input type="submit">
</form>
@if ($errors->any())
@foreach ($errors->all() as $error)
<p>{{ $error }}</p>
@endforeach
@endif
@endsection
