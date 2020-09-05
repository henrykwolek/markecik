<x-home-master>
    @section('content')
    @if ($message = Session::get('danger'))
<br>
<div class="alert alert-danger alert-block">

    <button type="button" class="close" data-dismiss="alert">×</button>    

    <strong>{{ $message }}</strong>

</div>

@endif
        <h1 class="my-4">
            Najnowsze ogłoszenia
            <br>
            <small>Kategoria: Sprzedaż/kupno</small>
          </h1>

          <!-- Blog Post -->
          @foreach ($posts as $post)
              <div class="card mb-4">
            <img
              class="card-img-top"
              src="{{$post->post_image}}"
              alt="Card image cap"
            />
            <div class="card-body">
            <h2 class="card-title">{{$post->title}}</h2>
              <p class="card-text">
                {{Str::limit($post->body, '150', '...')}}
              </p>
              <a href="{{route('post', $post->id)}}" class="btn btn-primary">Czytaj więcej &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              Utworzono {{$post->created_at->diffForHumans()}} przez
            <a href="#">{{$post->user->name}}</a>
            </div>
          </div>
          @endforeach

          <!-- Pagination -->
          <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
              <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
              <a class="page-link" href="#">Newer &rarr;</a>
            </li>
          </ul>
    @endsection
</x-home-master>

