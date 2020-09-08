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
        <a class="navbar-brand" href="{{ route('home') }}">Portal uczniowski IILO w Gdyni</a>
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
      <div class="row">
        <div class="col-md-4">
           <img style="width: 100%; max-width: 300px;" src="{{asset($user->avatar)}}" class="rounded-circle" alt="Cinque Terre"> 
        </div>
        <div class="col-md-8">
          <h4 class="my-4"><strong>Imię i nazwisko: </strong>{{$user->name}}</h4>
          <h4 class="my-4"><strong>Nazwa użytkownika: </strong>{{$user->username}}</h4>
          <h4 class="my-4"><strong>Adres email: </strong>{{$user->email}}</h4>
          <h4 class="my-4"><strong>Data dołączenia: </strong>{{$user->created_at}}</h4>
          <h4 class="my-4"><strong>Ostatnia aktualizacja: </strong>{{$user->updated_at->diffForHumans()}}</h4>
          <h4 class="my-4"><a href="">Edytuj swój profil</a></h4>
        </div>
      </div>
      <hr>
      <div class="row">
        @if (Auth::user()->id == $user->id)
            <h2 class="my-4">Twoje posty:</h2>
        @else
          <h2 class="my-4">Posty użytkownika {{$user->username}}:</h2>
        @endif
      </div>
      <div class="row">
        @foreach ($posts->chunk(3) as $chunk)
              <div class="card-deck">
                @foreach ($chunk as $post)
                <div class="card mb-3">
                  <img src="{{asset($post->post_image)}}" class="img-fluid" alt="...">
                  <div class="card-body">
                    <h4 class="card-title"><a href="{{route('post', $post->id)}}">{{$post->title}}</a></h4>
                    <p class="card-text">{{Str::limit($post->body, '150', '...')}}</p>
                    <p class="card-text">{{$post->post_price}} PLN</p>
                  </div>
                  <div class="card-footer">
                    <small class="text-muted">Utworzono {{$post->created_at->diffForHumans()}} przez
                    <a href="#">{{$post->user->name}}</a></small>
                  </div>
                </div>
              @endforeach
              </div>
              <br>
          @endforeach
      </div>
    </div>
    <script src="{{ asset('vendor/jquery/jquery.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>