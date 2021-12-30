<x-admin-master>

    @section('content')
        <h2> Users are here </h2>

        @if(session('user-deleted'))
            <div class="alert-danger alert"> {{session('user-deleted')}}</div>
            @endif

              <div class="card shadow mb-4">
                          <div class="card-header py-3">
                              <h6 class="m-0 font-weight-bold text-primary">  User Tables</h6>
                          </div>

                          <div class="card-body">
                              <div class="table-responsive">

                                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                      <thead>
                                      <tr>
                                          <th> Id </th>
                                          <th> Photo</th>
                                          <th> UserName </th>
                                          <th> Avatar </th>
                                          <th> Name </th>
                                          <th> Registered date </th>
                                          <th> Update Profile date</th>
                                          <th> Delete </th>
                                          </tr>
                                      </thead>
                                      <tfoot>
                                      <tr>
                                          <th> Id </th>
                                          <th> UserName </th>
                                          <th> Avatar </th>
                                          <th> Name </th>
                                          <th> Registered date </th>
                                          <th> Update Profile date</th>
                                          <th> Delete </th>
                                      </tr>
                                      </tfoot>

                                      <tbody>
                                      @foreach($users as $user)
                                        <tr>
                                            <td> {{$user->id }}</td>
                                            <td> {{$user->username }}</td>
                                            <td>
                                               <img src="{{$user->avatar }}" height="50px ">
                                            </td>
                                            <td> {{$user->name }}</td>
                                            <td> {{$user->created_at->diffForhumans() }}</td>
                                            <td> {{$user->updated_at->diffForhumans() }}</td>
                                            <td>
                                                <form action="{{route('user.destroy' , $user->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>

                                          @endforeach
                                      </tbody>
                                  </table>

                              </div>
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
