<x-admin-master>
    @section('content')

        @if(Session::has('permission-updated'))
            <div class="alert-danger alert">
                {{session('permission-updated')}}
            </div>
        @elseif(Session::has('permission-not-updated'))
            <div class="alert-danger alert">
                {{session('permission-not-updated')}}
            </div>
        @endif

        <div class="row">
            <div class="col-sm-6">
                <h1> Edit Permission: {{$permission ->name}}</h1>

                <form method="post" action="{{route('permissions.update' ,  $permission->id)}}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name"> Name </label>
                        <input type="text"
                               name="name"
                               id="name"
                               class="form-control"
                               value="{{$permission->name}}">
                    </div>

                    <button type="submit"
                            class="btn btn-primary"> Update </button>
                </form>

            </div>
        </div>

{{--        <div class="row">--}}
{{--            <div class="col-lg-12">--}}
{{--                @if(!$permissions->isEmpty())--}}
{{--                    <div class="card shadow mb-4">--}}
{{--                        <div class="card-header py-3">--}}
{{--                            <h6 class="m-0 font-weight-bold text-primary"> Data User Tables</h6>--}}
{{--                        </div>--}}

{{--                        <div class="card-body">--}}
{{--                            <div class="table-responsive">--}}

{{--                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">--}}
{{--                                    <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th> Options</th>--}}
{{--                                        <th> Id </th>--}}
{{--                                        <th> Name </th>--}}
{{--                                        <th> Slug </th>--}}
{{--                                        <th> Attach </th>--}}
{{--                                        <th>Detach</th>--}}

{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tfoot>--}}
{{--                                    <tr>--}}
{{--                                        <th> Options</th>--}}
{{--                                        <th> Id </th>--}}
{{--                                        <th> Name </th>--}}
{{--                                        <th> Slug </th>--}}
{{--                                        <th> Attach </th>--}}
{{--                                        <th>Detach</th>--}}
{{--                                    </tr>--}}
{{--                                    </tfoot>--}}

{{--                                    <tbody>--}}
{{--                                    @foreach($permissions as $permission)--}}
{{--                                        <tr>--}}
{{--                                            <td>--}}
{{--                                                <input type="checkbox"--}}
{{--                                                       @foreach($role ->permissions as $role_per)--}}
{{--                                                       @if($role_per->slug == $permission->slug)--}}
{{--                                                       checked--}}
{{--                                                    @endif--}}
{{--                                                    @endforeach>--}}


{{--                                            </td>--}}
{{--                                            <td> {{$permission->id }}</td>--}}
{{--                                            <td> {{$permission->name }}</td>--}}
{{--                                            <td> {{$permission -> slug }}</td>--}}

{{--                                            <td>--}}
{{--                                                <form method="post"--}}
{{--                                                      action="{{route('role.permission.attach' ,$permission)}}">--}}
{{--                                                    @csrf--}}
{{--                                                    @method('PUT')--}}
{{--                                                    <input type="hidden" name="permission" value="{{$permission-> id}}">--}}
{{--                                                    <button type="submit"--}}
{{--                                                            class="btn btn-primary"--}}
{{--                                                            @if($role->permissions->contains($permission))--}}
{{--                                                            disabled--}}
{{--                                                        @endif> Attach</button>--}}

{{--                                                </form>--}}


{{--                                            </td>--}}

{{--                                            <td>--}}
{{--                                                <form method="post"--}}
{{--                                                      action="{{route('role.permission.detach' , $permission)}}">--}}
{{--                                                    @csrf--}}
{{--                                                    @method('PUT')--}}
{{--                                                    <input type="hidden" name="permission" value="{{$permission-> id}}">--}}
{{--                                                    <button type="submit"--}}
{{--                                                            class="btn btn-danger"--}}
{{--                                                            @if(!$role->permissions->contains($permission))--}}
{{--                                                            disabled--}}
{{--                                                        @endif> Detach--}}

{{--                                                    </button>--}}
{{--                                                </form>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}

{{--                                    @endforeach--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--            </div>--}}

{{--        </div>--}}
    @endsection
</x-admin-master>
