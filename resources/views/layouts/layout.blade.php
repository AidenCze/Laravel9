<!DOCTYPE html>
<html lang="en">
<head>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

@if(session('loginerror') || $errors->any() && session('form')=='login')
<script>
	$(document).ready(function(){
		$("#LoginFormModal").modal('show');
	});
</script>
@endif

@if(session('registererror') || $errors->any() && session('form')=='register')
<script>
	$(document).ready(function(){
		$("#RegisterFormModal").modal('show');
	});
</script>
@endif

@if($errors->any() && session('form')=='review')
<script>
	$(document).ready(function(){
		$("#ReviewFormModal").modal('show');
	});
</script>
@endif

@if(session('error'))
<script>
	$(document).ready(function(){
		$("#Error").modal('show');
	});
</script>
@endif

@if(session('msg'))
<script>
	$(document).ready(function(){
		$("#Msg").modal('show');
	});
</script>
@endif

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if (Auth::check())
    <div class="position-absolute top-0 end-0">
        <a class="nav-link" href="#" data-bs-toggle="dropdown"><img src="/storage/photo/icon/{{ Auth::user()->icon }}" alt="" class="float-left" height="50px" width="50px"></a>
        <div class="dropdown-menu mt-5"  style="width:100%">
        <a href="/dashboard">Účet</a><br>
        <a href="/logout">Odhlásit se</a>
        </div>
    </div>
    @else   <div class="position-absolute top-0 end-0">
     <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#LoginFormModal">
        Přihlásit se
      </button>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#RegisterFormModal">
        Zaregistrovat se
      </button>

        </div>
    @endif
    <div class="container" style="width:50%">
        <nav class="navbar navbar-expand-lg bg-dark">
            <ul class="container-fluid">
                    <a class="nav-link  dropdown-toggle" href="#" data-bs-toggle="dropdown">
                      Mobily, tablety
                    </a>
                  <div class="dropdown-menu"  style="width:100%">
                    <div class="row" style="margin-left: 0px">

                        @foreach ($categories as $category)
                        @if($category->main_category=='1')
                        <div class="col-3">
                            <a href="/{{ $category->name }}/produkty"><h4>{{ $category->name }}</h4></a>
                            <a href="/{{ $category->name }}/produkty"><img src="/storage/photo/category/{{ $category->photo }}" alt="" style="height: 100px"></a>
                          </div>
                          @endif
                        @endforeach



                    </div>
                  </div>

                  <a class="nav-link  dropdown-toggle" href="#" data-bs-toggle="dropdown">
                    Počítače, notebooky
                  </a>
                <div class="dropdown-menu"  style="width:100%">
                  <div class="row" style="margin-left: 0px">

                      @foreach ($categories as $category)
                      @if($category->main_category=='2')
                      < <a href="/{{ $category->name }}/produkty"><h4>{{ $category->name }}</h4></a>
                      <a href="/{{ $category->name }}/produkty"><img src="/storage/photo/category/{{ $category->photo }}" alt="" style="height: 100px"></a>
                        </div>
                        @endif
                      @endforeach



                  </div>
                </div>

                <a class="nav-link  dropdown-toggle" href="#" data-bs-toggle="dropdown">
                    Komponenty
                  </a>
                <div class="dropdown-menu"  style="width:100%">
                  <div class="row" style="margin-left: 0px">

                      @foreach ($categories as $category)
                      @if($category->main_category=='3')
                      <div class="col-3">
                        <a href="/{{ $category->name }}/produkty"><h4>{{ $category->name }}</h4></a>
                        <a href="/{{ $category->name }}/produkty"><img src="/storage/photo/category/{{ $category->photo }}" alt="" style="height: 100px"></a>
                        </div>
                        @endif
                      @endforeach



                  </div>
                </div>
                <a class="nav-link  dropdown-toggle" href="#" data-bs-toggle="dropdown">
                    Televize, audio
                  </a>
                <div class="dropdown-menu"  style="width:100%">
                  <div class="row" style="margin-left: 0px">

                      @foreach ($categories as $category)
                      @if($category->main_category=='4')
                      <div class="col-3">
                        <a href="/{{ $category->name }}/produkty"><h4>{{ $category->name }}</h4></a>
                        <a href="/{{ $category->name }}/produkty"><img src="/storage/photo/category/{{ $category->photo }}" alt="" style="height: 100px"></a>
                        </div>
                        @endif
                      @endforeach



                  </div>
                </div>
                <a class="nav-link  dropdown-toggle" href="#" data-bs-toggle="dropdown">
                    PC doplňky
                  </a>
                <div class="dropdown-menu"  style="width:100%">
                  <div class="row" style="margin-left: 0px">

                      @foreach ($categories as $category)
                      @if($category->main_category=='5')
                      <div class="col-3">
                        <a href="/{{ $category->name }}/produkty"><h4>{{ $category->name }}</h4></a>
                        <a href="/{{ $category->name }}/produkty"><img src="/storage/photo/category/{{ $category->photo }}" alt="" style="height: 100px"></a>
                        </div>
                        @endif
                      @endforeach



                  </div>
                </div>
            </ul>
        </nav>
        </div>



    <div class="modal fade in" id="Error" tabindex="-1" aria-labelledby="ErrorLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                <div class="bg-red-50 p-4 rounded flex items-start text-red-600 shadow-lg px-8 pt-6 pb-8 mb-4 max-w-sm">
                    <div class=" px-3">


                <ul class="list-disc list-inside">

                    {{ session('error') }}
                </div>
                </ul>
            </div>
            </div>
          </div>
        </div>
      </div>


    <div class="modal fade in" id="Msg" tabindex="-1" aria-labelledby="MsgLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                <div class="bg-green-50 p-4 rounded flex items-start text-green-600 shadow-lg px-8 pt-6 pb-8 mb-4 max-w-sm">
                    <div class=" px-3">


                <ul class="list-disc list-inside">

                    {{ session('msg') }}
                </div>
                </ul>
            </div>
            </div>
          </div>
        </div>
      </div>


<div class="modal fade in" id="LoginFormModal" tabindex="-1" aria-labelledby="LoginFormModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="LoginFormModalLabel">Přihlášení</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 max-w-sm" method="POST" action="/login">
                @csrf
                <div class="mb-4">
                  <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="username" name="username" type="text" placeholder="Jméno">
                </div>
                <div class="mb-6">
                  <input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="password" name="password" type="password" placeholder="Heslo">
                </div>
                @if ($errors->any() && session('form')=='login')
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


            @if (session()->has('loginerror'))

            <div class="bg-red-50 p-4 rounded flex items-start text-red-600 shadow-lg px-8 pt-6 pb-8 mb-4 max-w-sm">
                <div class=" px-3">
                    <ul class="list-disc list-inside">
                        {{ session('loginerror') }}
                    </ul>
                </div>
            </div>
            @endif
        </div>
        <div class="modal-footer">
            <div class="flex items-center justify-between">
                <input type="submit" name="submit" id="">
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="RegisterFormModal" tabindex="-1" aria-labelledby="RegisterFormModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="RegisterFormModalLabel">Registrace</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 max-w-sm" method="POST" action="/register">
                @csrf
                <div class="mb-4">
                  <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="username" name="username" type="text" placeholder="Jméno">
                </div>
                <div class="mb-4">
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="email" name="email" type="text" placeholder="Email">
                  </div>
                <div class="mb-6">
                  <input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="password" name="password" type="password" placeholder="Heslo">
                </div>

            @if ($errors->any() && session('form')=='register')
            <div class="bg-red-50 p-4 rounded flex items-start text-red-600 shadow-lg px-8 pt-6 pb-8 mb-4 max-w-sm">
                <div class=" px-3">
                    <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        </ul>

            @endforeach
        </div>
</div>
            @endif

            @if (session()->has('registererror'))

            <div class="bg-red-50 p-4 rounded flex items-start text-red-600 shadow-lg px-8 pt-6 pb-8 mb-4 max-w-sm">
                <div class=" px-3">
                    <ul class="list-disc list-inside">
                        {{ session('registererror') }}
                    </ul>
                </div>
            </div>
            @endif
        </div>
        <div class="modal-footer">
            <div class="flex items-center justify-between">
                <input type="submit" name="submit" id="">
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@yield('content')
</body>
</html>
