
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
      </div>
      <div class="row">
          
        <div class="col-md-4">
           <h3 class="my-4">Uwaga!</h3>
           <ul class="list-group">
            <li class="list-group-item d-flex justify-content-baseline align-items-center">
                <span class="badge badge-primary badge-pill mr-2">1</span>
                Dokładnie opisz swoje ogłoszenie. To bardzo ważne, aby każdy wiedział co masz na myśli.
            </li>
            <li class="list-group-item d-flex justify-content-baseline align-items-center">
                <span class="badge badge-primary badge-pill mr-2">2</span>
                Nie publikuj treści kontrowersyjnych, obrażających i niestosownych.
            </li>
            <li class="list-group-item d-flex justify-content-baseline align-items-center">
                <span class="badge badge-primary badge-pill mr-2">3</span>
                W razie pytań proszę kontaktować się z administratorem.
            </li>
           </ul>
        </div>

        <div class="col-md-8">
            <h3 class="my-4">Nowe ogłoszenie</h3>
          <form method="post" action="{{route('user.post.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-prepend" style="width: 150px">
                                <span class="input-group-text" style="width: 150px" id="basic-addon1">Tytuł ogłoszenia</span>
                            </div>
                            <input type="text" name="title" id="title" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
                        </div>
                        <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend" style="width: 150px">
                                         <span class="input-group-text" style="width: 150px" id="post_image">Dodaj zdjęcie</span>
                                     </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="post_image" name="post_image" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="post_image">Choose file</label>
                                        </div>
                                </div>

                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend" style="width: 150px">
                                <span class="input-group-text" style="width: 150px" id="basic-addon1">Cena</span>
                            </div>
                            <input type="text" name="post_price" id="post_price" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
                            <div class="input-group-append">
                                <span class="input-group-text">PLN</span>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend" style="width: 150px">
                                <span class="input-group-text" style="width: 150px">Opis ogłoszenia</span>
                            </div>
                             <textarea name="body" id="body" class="form-control" aria-label="With textarea"></textarea>
                        </div>


                        <button type="submit" class="btn btn-primary">Zapisz post</button>
                </form>
        </div>
      </div>
      <hr>


          <script src="{{ asset('vendor/jquery/jquery.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>