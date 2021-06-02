@extends('layouts.layout')

@section('content')
<form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 max-w-sm" method="POST">
    @csrf
    <div class="mb-4">
      <label class="block text-grey-darker text-sm font-bold mb-2" for="username">
        Username
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="username" name="username" type="text" placeholder="Username">
    </div>
    <div class="mb-6">
      <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
        Password
      </label>
      <input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="password" name="password" type="password" placeholder="******************">
    </div>
    <div class="flex items-center justify-between">
      <input type="submit" name="submit" id="">
    </div>
</form>
@if ($errors->any())
@foreach ($errors->all() as $error)
<p>{{ $error }}</p>
@endforeach
@endif
@if (session()->has('error'))

<div class="bg-red-50 p-4 rounded flex items-start text-red-600 shadow-lg px-8 pt-6 pb-8 mb-4 max-w-sm">
    <div class="text-lg">
        <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-5 pt-1" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.597 17.954l-4.591-4.55-4.555 4.596-1.405-1.405 4.547-4.592-4.593-4.552 1.405-1.405 4.588 4.543 4.545-4.589 1.416 1.403-4.546 4.587 4.592 4.548-1.403 1.416z"/></svg>
    </div>
    <div class=" px-3">
        <ul class="list-disc list-inside">
            {{ session('error') }}
        </ul>
    </div>
</div>
@endif
@endsection
