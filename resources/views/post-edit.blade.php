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
      @if($message = Session::get('info'))
<br>
<div class="alert alert-info alert-block">

    <button type="button" class="close" data-dismiss="alert">×</button>    

    <strong>{{ $message }}</strong>

</div>
@endif

@if ($post->status == 'sold')
    <div class="alert alert-warning alert-block">
        <strong>To ogłoszenie zostało zaznaczone jako <u>sprzedane</u>. Sugerujemy jego usunięcie.</strong>
    </div>
@endif
      <div class="row">
        <div class="col-md-4">
           <img src="{{asset($post->post_image)}}" class="img-fluid mx-auto d-block" alt="Cinque Terre">
           <br>
           <p class="lead text-center mb-0" style="font-size: 175%">{{$post->title}}</p>
           <p class="text-center mt-0">{{$post->user->name}}</p>
           <hr>
           <blockquote class="blockquote text-justify">
            <p class="mb-0">{{$post->body}}</p>
          </blockquote>
          <p class="lead"><strong>Utworzono: </strong> {{$post->created_at}}</p>
          <p class="lead">Ostatnia zmiana: {{$post->updated_at->diffForHumans()}}</p>
        </div>
        <div class="col-md-8">
          <p class="lead" style="font-size: 150%">Szczegóły ogłoszenia</p>
          <hr>
          <form method="post" action="{{route('user.post.update', $post->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title">Tytuł</label>
                <input type="text" value="{{$post->title}}" name="title" id="title" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
            </div>
            <label for="postImage">Nowe zdjęcie</label>
            <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="post_image" name="post_image" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="post_image">Wybierz plik</label>
                        </div>
                    </div>
            </div>
            <label for="post_price">Cena</label>
            <div class="input-group mb-3">
                <input type="text" value="{{$post->post_price}}" name="post_price" id="post_price" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
                <div class="input-group-append">
                    <span class="input-group-text">PLN</span>
                </div>
            </div>

            <label for="status">Status ogłoszenia</label>
            <select class="custom-select mb-2" name="status" id="status">
                @if ($post->status == 'active')
                    <option value="active">Aktywne</option>
                    <option value="sold">Sprzedane</option>
                @else
                    <option value="sold">Sprzedane</option>
                    <option value="active">Aktywne</option>  
                @endif
            </select>

            <div class="form-group">
                <label for="body">Opis ogłoszenia</label>
                 <textarea name="body" rows="10" id="body" class="form-control" aria-label="With textarea">{{$post->body}}
                 </textarea>
            </div>


            <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
    </form>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <p class="lead" style="font-size: 150%">Usuwanie ogłoszenia</p>
                        <hr>
                        <form method="post" action="{{route('post.destroy', $post)}}" enctype="multipart/form-data">
                            @csrf
                            @method('delete')
                            <p class="lead">Tego nie można cofnąć.</p>
                            <button type="submit" class="btn btn-danger">Usuń to ogłoszenie</button> 
                            <p class="text-danger">Uwaga! ta czynność jest nieodwracalna.</p>
                        </form>
                    </div>
                </div>
        </div>
      </div>
      <hr>


          <script src="{{ asset('vendor/jquery/jquery.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>