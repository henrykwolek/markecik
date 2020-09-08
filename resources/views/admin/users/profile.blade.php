<x-admin-master>
    @section('content')
        <h1><small>Profil użytkownika {{$user->name}}</small></h1>
        @if($message = Session::get('success'))
<br>
<div class="alert alert-success alert-block">

    <button type="button" class="close" data-dismiss="alert">×</button>    

    <strong>{{ $message }}</strong>

</div>
@endif

        <div class="row">
            <div class="col-sm-6">
                <form method="post" action="{{route('user.update', $user)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Zdjęcie profilowe</span>
                        </div>
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
                     <img src="{{asset($user->avatar)}}" height="100px" class="rounded-circle" alt="Awatar użytkownika"> 
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
                    <div class="form-group">
                        <label for="password">Hasło</label>
                        <input type="password" placeholder="Nowe hasło" class="form-control" value="" name="password" id="password">
                    </div>
                    @error('password')
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>    
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    <div class="form-group">
                        <label for="password-confirm">Powtórz hasło</label>
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
    @endsection
</x-admin-master>