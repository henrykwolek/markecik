<x-admin-master>
     @section('content')

        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Nowe ogłoszenia ({{ date('d/m/Y') }})</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{
                          App\Post::whereDate('created_at', Carbon\Carbon::today())->count()
                        }}
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Suma ogłoszeń</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{App\Post::count()}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Suma korepetycji</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Nowe wiadomości</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!--two datatables -->

        <div class="row">
          <div class="col">
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">5 najnowszych ogłoszeń</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Tytuł</th>
                      <th>Opis</th>
                      <th>Zdjęcie</th>
                      <th>Utworzono</th>
                      <th>Zaktualizowano</th>
                      <th>Cena</th>
                      <th>Autor</th>
                      <th>Akcje</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Tytuł</th>
                      <th>Opis</th>
                      <th>Zdjęcie</th>
                      <th>Utworzono</th>
                      <th>Zaktualizowano</th>
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
                            {{Str::limit($post->body, 100)}}
                          </td>
                          <td> 
                            <img height="50px" src="{{asset($post->post_image)}}">
                          </td>
                          <td>{{$post->created_at->diffForHumans()}}</td>
                          <td>{{$post->updated_at->diffForHumans()}}</td>
                          <td>{{$post->post_price}}</td>
                          <td>{{$post->user->name}}</td>
                          <td>
                            <form action="{{route('post.destroy', $post->id)}}" method="post">
                              @csrf
                              @method('delete')
                              <button type="submit" class="btn btn-danger">Usuń</button>
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
          </div>
          <div class="col">
            
          </div>
        </div>
     @endsection
     
</x-admin-master>