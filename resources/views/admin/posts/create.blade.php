<x-admin-master>
    @section('content')

        <h1> Create here </h1>

          <form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
              @csrf
                              <div class="form-group">
                                  <label for="">  </label>
                                  <input type="text"
                                         name="title"
                                         class="form-control"
                                         id="title">
                              </div>

                              <div class="form-group">
                                  <label>  </label>
                                  <input type="file"
                                         name="post_image"
                                         class="form-control"
                                         id="post_image">
                              </div>
              <div class="form-group">
                  <label>  </label>
                  <textarea type="text"
                         name="body"
                         class="form-control" cols="30" rows="10"
                         id="body">
                  </textarea>
              </div>
                  <button type="submit" class="btn btn-primary"> Submit</button>
          </form>

        @endsection

</x-admin-master>
