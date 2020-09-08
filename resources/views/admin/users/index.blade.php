<x-admin-master>
    @section('content')
    @if ($message = Session::get('danger'))
<br>
    <div class="alert alert-danger alert-block">

    <button type="button" class="close" data-dismiss="alert">×</button>    

    <strong>{{ $message }}</strong>

  </div>
@endif
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Wszyscy użytkownicy</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Imię i nazwisko</th>
                      <th>Nazwa użytkownika</th>
                      <th>Awatar</th>
                      <th>Utworzono</th>
                      <th>Zaktualizowano</th>
                      <th>Rola</th>
                      <th>Akcje</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Imię i nazwisko</th>
                      <th>Nazwa użytkownika</th>
                      <th>Awatar</th>
                      <th>Utworzono</th>
                      <th>Zaktualizowano</th>
                      <th>Rola</th>
                      <th>Akcje</th>
                    </tr>
                  </tfoot>
                  <tbody>
                     @foreach ($users as $user)
                        <tr>
                          <td>{{$user->id}}</td>
                          <td><a href="">{{$user->name}}</a></td>
                          <td>
                            {{$user->username}}
                          </td>
                          <td> 
                            <img height="50px" src="{{asset($user->avatar)}}">
                          </td>
                          <td>{{$user->created_at->diffForHumans()}}</td>
                          <td>{{$user->updated_at->diffForHumans()}}</td>
                          <td>
                              @if ($user->is_admin == 1)
                                <button type="button" class="btn btn-success">Administrator</button>
                              @else
                                <button type="button" class="btn btn-primary">Użytkownik</button>
                              @endif
                          </td>
                          <td>
                            <form action="{{route('user.destroy', $user)}}" method="post">
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
            </div>
    @endsection
</x-admin-master>