<x-admin-master>
    @section('content')

        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>

    @if(Session::has('message'))
          <div class="alert alert-danger"> {{Session::get('message')}}</div>
        @elseif(session('post-created-message'))
          <div class="alert alert-success">
              {{session('post-created-message')}}
          </div>
        @else
            <div class="alert alert-success">
                {{session('post-update-message')}}
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id </th>
                            <th>Owner </th>
                            <th> Title </th>
                            <th>Image </th>
                            <th>Created_at</th>
                            <th> Updated_at</th>
                            <th> Edit</th>
                            <th>Delete </th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Id </th>
                            <th> Owner </th>
                            <th> Title </th>
                            <th>Image </th>
                            <th>Created_at</th>
                            <th> Updated_at</th>
                            <th> Edit</th>
                            <th>Delete </th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <td>{{$post -> id }} </td>
                            <td>{{$post ->user->name }} </td>
                            <td> {{$post -> title }} </td>
                            <td>
                              <img alt="" width="100px"
                                   src="uploads/.{{$post -> post_image}}"
                                   height="40px">
                            </td>
                            <td> {{$post -> created_at}} </td>
                            <td> {{$post -> updated_at}} </td>
                            <td>
                                <a href="{{route('post.edit' ,$post->id)}}" class="btn btn-info">
                                    Edit
                                </a>
                            </td>
                            <td>

                                <form method="post"
                                      action="{{route('posts.destroy' , $post->id )}}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"> Delete </button>
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
                {{$posts -> links()}}
            </div>
        </div>

    @endsection
    @section('script')

            <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
            <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

            <!-- Page level custom scripts -->
{{--            <script src="{{asset('js/demo/datatables-demo.js')}}"></script>--}}

        @endsection

</x-admin-master>
