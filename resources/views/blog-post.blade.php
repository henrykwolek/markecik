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
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.css') }}" rel="stylesheet" />

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
              <a class="nav-link" href="#"
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

    <!-- Page Content -->
    <div class="container">
      <h1 class="my-4">
            Najnowsze ogłoszenia
            <br>
            <small>Kategoria: Sprzedaż/kupno</small>
          </h1>
      </div>
      <!-- Blog Post -->
          <div class="container">
            <div class="row">
              <div class="col-md-8">
                <h1 class="mt-4">{{$post->title}}</h1>

            <!-- Author -->
            <p class="lead">
                by
                <a href="{{route('user.show.profile', $post->user_id)}}">{{$post->user->name}}</a>
            </p>

            <hr>

            <!-- Date/Time -->
            <p>Posted on {{$post->created_at->diffForHumans()}} </p>

            <hr>

            <!-- Preview Image -->
            <img class="img-fluid rounded" src="{{asset($post->post_image)}}" alt="">

            <hr>

            <!-- Post Content -->
            <p>{{$post->body}}</p>

            <hr>

            <!-- Comments Form -->
            <div class="card my-4">
                <h5 class="card-header">Leave a Comment:</h5>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

            <!-- Single Comment -->
            <div class="media mb-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                    <h5 class="mt-0">Commenter Name</h5>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
            </div>

            <!-- Comment with nested comments -->
            <div class="media mb-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                    <h5 class="mt-0">Commenter Name</h5>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

                    <div class="media mt-4">
                        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                        <div class="media-body">
                            <h5 class="mt-0">Commenter Name</h5>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </div>
                    </div>

                    <div class="media mt-4">
                        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                        <div class="media-body">
                            <h5 class="mt-0">Commenter Name</h5>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </div>
                    </div>

                </div>
            </div>
              </div>
              <div class="col-md-4">
                <div class="card">
                  <div class="card-body">
                    <a class="weatherwidget-io" href="https://forecast7.com/pl/54d5218d53/gdynia/" data-label_1="GDYNIA" data-label_2="Pogoda" data-theme="original" >GDYNIA Pogoda</a>
<script>
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
</script>
                  </div>
                </div>

                <div class="card">
                  <div class="card-body">
                    <iframe style="height: 400px;" src="https://www.arcgis.com/apps/opsdashboard/index.html#/85320e2ea5424dfaaa75ae62e5c06e61"></iframe><br>
                  </div>
                </div>

              </div>
            </div>
          </div>

          

          <!-- Pagination -->
          <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
              <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
              <a class="page-link" href="#">Newer &rarr;</a>
            </li>
          </ul>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">
          Copyright &copy; 2020
        </p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
  </body>
</html>