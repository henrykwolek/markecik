@if(Auth::user()->id != $user->id)
    {{redirect('home')}}
@endif
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Blog Home - Start Bootstrap Template</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('css/blog-home.css') }}">

    <!-- Custom styles for this template -->
    <link href="css/blog-home.css" rel="stylesheet" />
  </head>

  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Marketplace project</a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarResponsive"
          aria-controls="navbarResponsive"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('home') }}"
                ><button class="btn btn-dark">Strona główna</button>
                <span class="sr-only">(current)</span>
              </a>
            </li>
            @if(Auth::check())
              @if (Auth::user()->is_admin == 1)
                  <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.index') }}"><button class="btn btn-dark">Administracja</button></a>
            </li>
              @else
              <li class="nav-item">
              <a class="nav-link" href="{{route('user.show.profile', Auth::user())}}"><button class="btn btn-dark">{{Auth::user()->name}} - profil</button></a>
            </li>
              @endif
            <li class="nav-item">
              <a class="nav-link" href="/logout">
              <form action="/logout" method="post">
                @csrf
                <button class="btn btn-dark">Wyloguj się</button>
            </form>
            </a>
            </li>
            @else
            <li class="nav-item">
              <a class="nav-link" href="/login">
                <button class="btn btn-dark">Logowanie</button>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/register">
                <button class="btn btn-dark">Rejestracja</button>
              </a>
            </li>
            @endif
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">
      <div class="row"><hr></div>
      @if($message = Session::get('success'))
<br>
<div class="alert alert-success alert-block">

    <button type="button" class="close" data-dismiss="alert">×</button>    

    <strong>{{ $message }}</strong>

</div>
@endif
      <div class="row">
        <div class="col-md-4">
           <img src="{{asset($user->avatar)}}" class="rounded-circle mx-auto d-block" alt="Cinque Terre">
           <br>
           <p class="lead text-center mb-0" style="font-size: 175%">{{$user->name}}</p>
           <p class="text-center mt-0">{{$user->username}}</p>
           <hr>
           <blockquote class="blockquote text-justify">
            <p class="mb-0">{{$user->about}}</p>
            <footer class="blockquote-footer">{{$user->name}}, <cite title="Source Title">Mój biogram</cite></footer>
          </blockquote>
          <p class="lead"><strong>Data dołączenia:</strong> {{$user->created_at}}</p>
          <p class="lead">Ostatnia zmiana: {{$user->updated_at->diffForHumans()}}</p>
        </div>
        <div class="col-md-8">
          <form method="post" action="{{route('user.profile.update', $user)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="username">Nazwa użytkownika</label>
                        <input type="text" placeholder="Podaj nazwę użytkownika" class="form-control" value="{{$user->username}}" name="username" id="username">
                    </div>
                    @error('username')
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>    
                                <strong>{{ $message }}</strong>
                            </div>
                    @enderror
                    <div class="form-group">
                        <label for="name">Imię i nazwisko</label>
                        <input type="text" placeholder="Podaj swoje imię i nazwisko" class="form-control" value="{{$user->name}}" name="name" id="name">
                    </div>
                    @error('name')
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>    
                                <strong>{{ $message }}</strong>
                            </div>
                    @enderror
                    <div class="form-group">
                        <label for="email">Adres email</label>
                        <input type="text" placeholder="Podaj swój adres email" class="form-control" value="{{$user->email}}" name="email" id="email">
                    </div>
                    @error('email')
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>    
                                <strong>{{ $message }}</strong>
                            </div>
                    @enderror
                    <label for="profilePicturue">Nowe zdjęcie profilowe</label>
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" name="avatar" class="custom-file-input" id="avatar" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="avatar">Wybierz plik</label>
                        </div>
                        @error('avatar')
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>    
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="about">Biogram</label>
                        <textarea class="form-control" name="about" id="about" cols="30" placeholder="Opowiedz o sobie" rows="4">{{$user->about}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="password">Hasło • Wymagane dla potwierdzenia</label>
                        <input type="password" placeholder="Nowe hasło" class="form-control" value="" name="password" id="password">
                    </div>
                    @error('password')
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>    
                                <strong>{{ $message }}</strong>
                            </div>
                    @enderror
                    <div class="form-group">
                        <label for="password-confirm">Powtórz hasło • Wymagane dla potwierdzenia</label>
                        <input type="password" placeholder="Powtórz hasło" class="form-control" value="" name="password_confirmation" id="password_confirmation">
                    </div>
                    @error('password_confirmation')
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>    
                                <strong>{{ $message }}</strong>
                            </div>
                    @enderror
                    <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
                </form>
        </div>
      </div>
      <hr>


          <script src="{{ asset('vendor/jquery/jquery.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>