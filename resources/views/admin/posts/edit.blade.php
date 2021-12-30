<x-admin-master>
    @section('content')

        <h1> #Edit a Post </h1>

        <form method="post" action="{{route('post.update' , $post->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="">Title  </label>
                <input type="text"
                       name="title"
                       class="form-control"
                       value="{{$post->title}}"
                       id="title">
            </div>

            <div class="form-group">
                <div>
                    <img alt="name" height="400px" src="{{$post->post_image}}">
                </div>
                <label> File </label>
                <input type="file"
                       name="post_image"
                       class="form-control"
                       id="post_image">
            </div>

            <div class="form-group">
                <label> Body </label>
                <textarea type="text"
                          name="body"
                          class="form-control" cols="30" rows="10"
                          id="body">
                    {{$post->body}}
                  </textarea>
            </div>
            <button type="submit" class="btn btn-primary"> Submit</button>
        </form>

    @endsection

</x-admin-master>
