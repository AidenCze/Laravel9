@extends('layouts.layout')

<?php
//$categories = \App\Models\Category::all();
?>
@section('content')
{{--
<style>
    body {
    font-family: Helvetica, Arial, sans-serif;
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
}


.mainnav  {
    z-index: 99;
    margin-bottom: 60px;
    list-style-type: none;
    padding-left: 26.8%;


}

 .mainnav  li {
        text-align: center;
        font-size: 20px;
        float: left;
        list-style: none;
        margin-left: 1px;
    }

  .mainnav  ul{
        display: inline-block;

    }

 .mainnav a {
        color: white;
        background-color: red;
        text-decoration: none;
        text-align: center;
        cursor: pointer;
        padding: 16px;

    }

    nav h2 {
        padding-left: 60px;
        margin: 0;
        text-align: left;
        color: #fff;
    }

    nav a:hover {
        color: black;
        background-color: white;
        transition:500ms;
    }


.dropdown {
    float: left;
    overflow: hidden;
  }


  .dropdown-content {
    margin-top: 12px;
    display: none;
    position: absolute;
    width: 55%;
    left: 0;
    z-index: 1;
    padding-left: 28.5%;
    background-color: white;
  }


  .column {
    float: left;
    width: 33.33%;

  }


  .column a {
    margin-top: 15px;
    float: none;
    color: black;
    text-decoration: none;
    display: block;
    padding:0;
    text-align: left;
    width: 75%;
    background-color: white;
  }

.column img{
  float: left;
  width: 90px;
  height: 90px;
  position: relative;
  background-color: transparent;
}
.column :hover .mainnav a{
  color: black;
  background-color: white;
}
nav ul li:hover div {
    display: block;
}


</style> --}}
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


{{--
@foreach ($categories as $category)
<div class="column">
    <a href=""><h4>{{ $category->name }}</h4></a>
    <a href=""><img src="/storage/photo/{{ $category->photo }}" alt=""></a>
    <a href="#">Link 1</a>
    <a href="#">Link 2</a>
    <a href="#">Link 3</a>
  </div>
@endforeach

<nav class="mainnav">
    <ul>
        <li><a href=Hry.html>Mobily, tablety</a></li>

          <div class="dropdown-content">
            <div class="row">

                @foreach ($categories as $category)
                <div class="column">
                    <a href=""><h4>{{ $category->name }}</h4></a>
                    <a href=""><img src="public/storage/photo/{{ $category->photo }}" alt=""></a>
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                  </div>
                @endforeach
            </div>
          </div>

      </li>
        <li><a href=Hry.html>Počítače, tablety</a>

      </li>
        <li><a href=Esport.html>Komponenty</a>

      </li>
        <li><a href=Herni_Veletrhy.html>Televize, audio</a></li>
        <li><a href=Galerie.html>PC doplňky</a></li>
    </ul>
</nav> --}}
<div class="container" style="width:50%">
    <div class="row" style="margin:1%">
    @foreach ($products as $product)
    <div class="col-3" style="">
    <a href="/produkt/{{$product->id}}">{{$product->name}}</a>
    <a href="/produkt/{{$product->id}}"><img src="/storage/photo/product/{{ $product->main_photo }}" alt="" width="150px" height="150px"></a>
</div>
@endforeach
</div>
</div>
@endsection
