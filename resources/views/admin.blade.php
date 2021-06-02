@extends('layouts.layout')

@section('content')
<h1>Producer</h1>
<form action="{{ url('/producer') }}" method="POST">
    @csrf
    <label for="name">Název</label>
    <input type="text" id="name" name="name">
    <label for="url">URL</label>
    <input type="text" id="url" name="url">
    <input type="submit" value="Odeslat">
</form>
<p>{{ session('producermsg') }}</p>

<h1>Category</h1>
<form action="{{ url('/category') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="name">Název</label>
    <input type="text" id="name" name="name">
    <select name="category" id="category">
        <option value="">Kategorie</option>
        @foreach ($categories as $category)
        <option value="{{$category->id}}">{{ $category->name }}</option>
        @endforeach
    </select>
    <label for="photo">Fotka</label>
    <input type="file" id="photo" name="photo">
    <input type="submit" value="Odeslat">
</form>
<p>{{ session('categorymsg') }}</p>

<h1>SubCategory</h1>
<form action="{{ url('/subcategory') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="name">Název</label>
    <input type="text" id="name" name="name">
    <select name="category" id="category">
        <option value="">Kategorie</option>
        <option value="1">Mobily, tablety</option>
        <option value="2">Počítače, notebooky</option>
        <option value="3">Komponenty</option>
        <option value="4">Televize, audio</option>
        <option value="5">PC doplňky</option>
    </select>
    <label for="photo">Fotka</label>
    <input type="file" id="photo" name="photo">
    <input type="submit" value="Odeslat">
</form>
<p>{{ session('subcategorymsg') }}</p>

<h1>Product</h1>
<form action="{{ url('/product') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="name">Název</label>
    <input type="text" id="name" name="name">
    <label for="producer"></label>
    <select name="producer" id="producer">
        @foreach ($producers as $producer)
        <option value="{{$producer->id}}">{{ $producer->name }}</option>
        @endforeach
    </select>
    <select name="subcategory" id="subcategory">
        @foreach ($subcategories as $subcategory)
        <option value="{{$subcategory->id}}">{{ $subcategory->name }}</option>
        @endforeach
    </select>
    <label for="main_photo">Fotka</label>
    <input type="file" id="main_photo" name="main_photo">
    <label for="description">Popisek</label>
    <textarea type="text" id="description" name="description"></textarea>
    <input type="submit" value="Odeslat">
</form>
<p>{{ session('productmsg') }}</p>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
    @endif

@foreach ($producers as $producer)
<li>{{ $producer->name }}</li> <span>{{ $producer->url }}</span>
<button><a href="/delete/{{ $producer->id }}">SMAZAT</a></button>
@endforeach
<p>{{ session('proddltmsg') }}</p>

@foreach ($categories as $category)
<li>{{ $category->name }}</li>
<li><img src="/storage/photo/{{ $category->photo }}" alt="" style="height: 150px"></li>
<button><a href="/delete/{{ $category->id }}">SMAZAT</a></button>
@endforeach
<p>{{ session('catdltmsg') }}</p>
@endsection


