<x-admin-master>
    @section('content')

        <h1> Comments Show</h1>

       @if(count($comments) > 0)
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Id </th>
                <th> Author  </th>
                <th>Email  </th>
                <th>Body  </th>

            </tr>
            </thead>
            <tbody>

                @foreach($comments as $com)
                    <tr>
                        <td> {{$com -> id}}</td>
                        <td> {{$com -> author}}</td>
                        <td> {{$com -> email}}</td>
                        <td> {{$com -> body}}</td>
                        <td>
{{--                            <a href="{{route('home.post' , $com->post->id)}}">--}}
                                View Post
{{--                            </a>--}}
                        </td>

                        <td>
                            @if($com-> is_active ==1)

                                    {!! Form::open([ 'method' => 'PATCH' ,
                                        'action' => ['PostCommentsController@update', $com->id]]) !!}
                                    <input type="hidden" name="is_active" value="0">
                                    <div class="form-group">
                                        {!! Form::submit('Un-Approve' , ['class' => 'btn btn-danger']) !!}
                                    </div>
                                    {!! Form::close() !!}
                                @else

                                {!! Form::open([ 'method' => 'PATCH' ,
                                    'action' => ['PostCommentsController@update',$com->id]]) !!}
                                <input type="hidden" name="is_active" value="1">
                                <div class="form-group">
                                    {!! Form::submit('Approve' , ['class' => 'btn btn-success']) !!}
                                </div>
                                {!! Form::close() !!}


                            @endif
                        </td>

                        <<td>
                            {!! Form::open(['method' => 'DELETE' ,
                                'action' => ['PostCommentsController@destroy', $com->id]] ) !!}
                            <div class="form-group">
                                {!! Form::submit('Delete' , ['class' => 'btn btn-danger']) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>

                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>

        @stop

</x-admin-master>
