<x-admin-master>
    @section('content')
        <h1><small>Wszystkie ogłoszenia</small></h1>
         @if($message = Session::get('success'))
<br>
<div class="alert alert-success alert-block">

    <button type="button" class="close" data-dismiss="alert">×</button>    

    <strong>{{ $message }}</strong>

</div>
@endif

@if ($message = Session::get('danger'))
<br>
    <div class="alert alert-danger alert-block">

    <button type="button" class="close" data-dismiss="alert">×</button>    

    <strong>{{ $message }}</strong>

  </div>
@endif

                  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Wszystkie ogłoszenia</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Tytuł</th>
                      <th>Zdjęcie</th>
                      <th>Utworzono</th>
                      <th>Cena</th>
                      <th>Autor</th>
                      <th>Akcje</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Tytuł</th>
                      <th>Zdjęcie</th>
                      <th>Utworzono</th>
                      <th>Cena</th>
                      <th>Autor</th>
                      <th>Akcje</th>
                    </tr>
                  </tfoot>
                  <tbody>
                     @foreach ($posts as $post)
                        <tr>
                          <td>{{$post->id}}</td>
                          <td><a href="{{route('post.edit', $post->id)}}">{{$post->title}}</a></td>
                          <td> 
                            <img height="50px" src="{{asset($post->post_image)}}">
                          </td>
                          <td>{{$post->created_at->diffForHumans()}}</td>
                          <td>{{$post->post_price}}</td>
                          <td>{{$post->user->name}}</td>
                          <td>
                            <form action="{{route('post.destroy', $post->id)}}" method="post">
                              @csrf
                              @method('delete')
                              <button type="submit" class="btn btn-danger">Usuń ogłoszenie</button>
                            </form>
                          </td>
                        </tr>
                     @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="d-flex">
            <div class="mx-auto">
            {{$posts->links()}}
            </div>

    @endsection

    @section('scripts')
        <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
    @endsection
</x-admin-master>