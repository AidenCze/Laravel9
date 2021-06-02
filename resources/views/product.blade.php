@extends('layouts.layout')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6 bg-light">
    <div class="flex flex-col md:flex-row -mx-4">
      <div class="md:flex-1 px-4">
          <img src="/storage/photo/product/{{$product->main_photo}}" alt="" width="250px" height="250px" class="float-left">
          <h1 class="text-primary">{{$product->name}}</h1>
         <h5>Výrobce: <a href="https://www.{{$producer->url}}" style="text-decoration: none">{{$producer->name}}</a></h5>
        <h5>Hodnocení: nestíhám :)</h5>
        <h5>Popisek:</h5>
        <p>{{$product->description}}</p>
        <h5>Recenze</h5>
      </div>
    </div>
  </div>
@endsection
