<x-admin-master>
    @section('content')

        <h1>Utwórz nowy post</h1>

                <form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
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



    @endsection
</x-admin-master>