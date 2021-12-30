<x-admin-master>
    @section('content')

        <table class="table table-striped">
            <thead>
              <tr>
                <th>Id </th>
                <th> Photo</th>
                <th>Name </th>
                <th>Email</th>
                <th> Role </th>
                <th> Active </th>
                <th> Created </th>
                <th> updated </th>
              </tr>
            </thead>
            <tbody>
                @if($users)
                    @foreach($users as $user)
                        <tr>
                            <td> {{$user -> id}}</td>
{{--                            <td>--}}
{{--                                <img alt="pic"--}}
{{--                                     src="{{$user->avatar ?--}}
{{--                                                $user->photo->file : 'no user Photo'}}">--}}
{{--                            </td>--}}
                            <td> {{$user -> avatar}}</td>
                            <td>
                                <a href="{{route('users.edit' , $user->id)}}">
                                    {{$user -> name }}
                                </a>
                                </td>
                            <td> {{$user -> email}}</td>
                            <td>
                                @foreach($user->roles as $role)
                                {{$role->name}}
                                    @endforeach
                            </td>
                            <td> {{$user -> is_active == 1 ? 'Active' : 'Not Active'}}</td>
                            <td> {{$user -> created_at->diffForHumans()}}</td>
                            <td> {{$user -> updated_at-> diffForHumans()}}</td>
                        </tr>
                    @endforeach
                    @endif
            </tbody>
          </table>
    @endsection
</x-admin-master>
