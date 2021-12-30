<x-admin-master>
    @section('content')
        <h1> User Profile for {{$user->name}}</h1>

        <div class="row">
            <div class="col-sm-6">
                <form action="{{route('user.profile.update' , $user)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                         <img src="" alt="" class="img-profile rounded-circle">
                    </div>

                    <div class="form-group">
                        <input type="file" name="avatar">
                    </div>

                    <div class="form-group">
                        <label>username </label>
                        <input type="text"
                               name="username"
                               value="{{$user->username}}"
                               class="form-control
                               @error('username') is-invalid @enderror"
                               id="name" >
                    </div>


                    <div class="form-group">
                        <label>Name </label>
                        <input type="text"
                               name="name"
                               value="{{$user->name}}"
                               class="form-control
                               {{$errors->has('namee') ? 'is-invalid' : ''}}"
                               id="name" >
                    </div>

                    <div class="form-group">
                        <label>Email  </label>
                        <input type="email"
                               name="email"
                               value="{{$user->email}}"
                               class="form-control"
                               id="email" >
                        @error('email')
                        <div class="alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>password  </label>
                        <input type="password"
                               name="password"
                               class="form-control"
                               id="password" >
                        @error('password')
                        <div class="alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Password_Confirmation  </label>
                        <input type="password"
                               name="password_confirmation"
                               class="form-control"
                               id="password_confirmation " >
                    </div>

                    <button type="submit" class="btn btn-primary"> Submit</button>

                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                Data Tables Roles
                      <div class="card shadow mb-4">
                                  <div class="card-header py-3">
                                      <h6 class="m-0 font-weight-bold text-primary"> Data User Tables</h6>
                                  </div>

                                  <div class="card-body">
                                      <div class="table-responsive">

                                          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                              <thead>
                                              <tr>
                                                  <th> Options</th>
                                                  <th> Id </th>
                                                  <th> Name </th>
                                                  <th> Slug </th>
                                                  <th> Attach </th>
                                                  <th> Detach </th>
                                                  </tr>
                                              </thead>
                                              <tfoot>
                                              <tr>
                                                  <th> Option</th>
                                                  <th> Id </th>
                                                  <th> Name </th>
                                                  <th> Slug </th>
                                                  <th> Attach </th>
                                                  <th> Detach </th>
                                              </tr>
                                              </tfoot>

                                              <tbody>
                                              @foreach($roles as $role)
                                                <tr>
                                                    <td>
                                                        <input type="checkbox"
                                                        @foreach($user->roles as $user_role)
                                                            @if($user_role->slug == $role->slug)
                                                                checked
                                                               @endif
                                                            @endforeach>
                                                    </td>
                                                    <td>{{$role->id}}</td>
                                                    <td> {{$role->name}}</td>
                                                    <td>{{$role->slug}}</td>
                                                    <td>
                                                       <form method="post" action="{{route('user.role.attach', $user)}}">
                                                           @method('PUT')
                                                           @csrf
                                                           <input type="hidden" name="role" value="{{$role->id}}">
                                                           <button type="submit"
                                                                   class="btn btn-primary"
                                                                   @if($user->roles->contains($role))
                                                                       disabled
                                                               @endif> Attach</button>
                                                       </form>
                                                    </td>
                                                    <td>
                                                        <form method="post" action="{{route('user.role.detach', $user)}}">
                                                            @method('PUT')
                                                            @csrf
                                                            <input type="hidden" name="role" value="{{$role->id}}">
                                                            <button type="submit"
                                                                    class="btn btn-danger"
                                                                    @if(!$user->roles->contains($role))
                                                                    disabled
                                                                @endif> Detach </button>
                                                        </form>

                                                    </td>
                                                </tr>

                                                  @endforeach
                                              </tbody>
                                          </table>

                                      </div>
                                  </div>
                              </div>
            </div>
        </div>

        @endsection
</x-admin-master>
