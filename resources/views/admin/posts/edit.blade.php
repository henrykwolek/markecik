<x-admin-master>
    @section('content')

        <h1>Edytuj istniejące ogłoszenie</h1>

                <form method="post" action="{{route('post.update', $post->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="input-group mb-3">
                            <div class="input-group-prepend" style="width: 150px">
                                <span class="input-group-text" style="width: 150px" id="basic-addon1">Tytuł ogłoszenia</span>
                            </div>
                            <input type="text" value="{{$post->title}}" name="title" id="title" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
                        </div>
                        <hr>
                        <div class="form-group">
                            <img height="150px" src="{{asset($post->post_image)}}" alt="">
                        </div>
                        <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend" style="width: 150px">
                                         <span class="input-group-text" style="width: 150px" id="post_image">Nowe zdjęcie</span>
                                     </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="post_image" name="post_image" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="post_image">Choose file</label>
                                        </div>
                                </div>

                        </div>
                        <hr>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend" style="width: 150px">
                                <span class="input-group-text" style="width: 150px" id="basic-addon1">Cena</span>
                            </div>
                            <input type="text" value="{{$post->post_price}}" name="post_price" id="post_price" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
                            <div class="input-group-append">
                                <span class="input-group-text">PLN</span>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend" style="width: 150px">
                                <span class="input-group-text" style="width: 150px">Opis ogłoszenia</span>
                            </div>
                             <textarea name="body" id="body" class="form-control" aria-label="With textarea">{{$post->body}}
                             </textarea>
                        </div>


                        <button type="submit" class="btn btn-primary">Edytuj ogłoszenie</button>
                </form>



    @endsection
</x-admin-master>