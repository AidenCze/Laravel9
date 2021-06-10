@extends('layouts.layout')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6 bg-light">
    <div class="flex flex-col md:flex-row -mx-4">
      <div class="md:flex-1 px-4">
          <img src="/storage/photo/product/{{$product->main_photo}}" alt="" width="250px" height="250px" class="float-left">
          <h1 class="text-primary">{{$product->name}}</h1>
         <h5>Výrobce: <a href="https://www.{{$producer->url}}" style="text-decoration: none">{{$producer->name}}</a></h5>
        <h5>Hodnocení: @if(count($reviews)>=1){{ $rating }}* @else Žádné recenze @endif</h5>
        <h5>Popisek:</h5>
        <p>{{$product->description}}</p>
        <h5>Recenze</h5>
        @if(Auth::check())
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ReviewFormModal">
            Napsat recenzi
           </button>

        @else
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#LoginFormModal">
            Napsat recenzi
           </button>
           @endif

           @if(count($reviews)>=1)
        @foreach ($users as $user)
        <h5>Nahrál uživatel: {{ $user->username }}</h5>
        <img src="/storage/photo/icon/{{$user->icon}}" alt="" height="35px" width="35px">
        @foreach ($reviews as $review)
        @endforeach
        <h5>Hodnocení: {{ $review->rating }}*</h5>
        <p>{{ $review->commentary }}</p>
        @foreach ($review->pros as $pro)
        <h5><span style="color: green">+</span> {{ $pro }}</h5>
        @endforeach
        @foreach ($review->cons as $con)
        <h5><span style="color: red">-</span> {{ $con }}</h5>
        @endforeach
        @endforeach
@endif
        <div class="modal fade in" id="ReviewFormModal" tabindex="-1" aria-labelledby="ReviewFormModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="ReviewFormModalLabel">Recenze</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 max-w-sm" action="" method="POST">
                        @csrf
                        <label for="commentary">Obsah</label>
                        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" name="commentary" id="commentary" cols="1" rows="15"></textarea>
                        <label  for="pros">Klady</label>
                        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" name="pros" id="pros" cols="30" rows="5"></textarea>
                        <p>Pro další bod stistkněte enter</p>
                        <label for="cons">Zápory</label>
                        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" name="cons" id="cons" cols="30" rows="5"></textarea>
                        <p>Pro další bod stistkněte enter</p>
                        <label for="rating">Hodnocení</label>
                        <select class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" name="rating" id="rating">
                            <option value="1">1*</option>
                            <option value="2">2*</option>
                            <option value="3">3*</option>
                            <option value="4">4*</option>
                            <option value="5">5*</option>
                        </select>
                        <input class="btn btn-primary" type="submit" name="submit" id="submit">

                    </form>

                        </div>
                        @if ($errors->any() && session('form')=='review')
                        <div class="bg-red-50 p-4 rounded flex items-start text-red-600 shadow-lg px-8 pt-6 pb-8 mb-4 max-w-sm">
                            <div class=" px-3">

                        @foreach ($errors->all() as $error)
                        <ul class="list-disc list-inside">
                        {{ $error }}
                    </ul>
                        @endforeach
                    </div>
                </div>
                        @endif
                </div>
                <div class="modal-footer">

                  </form>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>


@endsection
