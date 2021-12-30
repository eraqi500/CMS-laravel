<x-admin-master>
    @section('content')

        <h1> Edit Users </h1>

    @if(Session('deleted_user'))
        <div class="alert alert-danger">
            {{session('deleted_user')}}
        </div>
        @endif

    <div class="col-sm-3">

        <img alt="pic"
             class="img-responsive img-round"
             height="100"
             src="{{$user->photo ? $user->photo->file :
                'http://placehold.it/400x400'}}">

    </div>

    <div class="col-sm-9">

        <h1> Create Form </h1>
        {!! Form::model( $user , ['method' => 'PATCH' ,
        'action' => ['AdminUsersController@update', $user->id] ,
        'files' => true]) !!}

        <div class="form-group">
            {!! Form::label('username' , 'UserName:') !!}
            {!! Form::text('username' , null , ['class'=> 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('name' , 'Name:') !!}
            {!! Form::text('name' , null , ['class'=> 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email' , 'email:') !!}
            {!! Form::email('email' , null , ['class'=> 'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::label('role_id' , 'Role:') !!}
            {!! Form::select('role_id' ,
                $roles,
                null , ['class'=> 'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::label('status' , 'Status') !!}
            {!! Form::select('is_active' ,
                array(1  => 'Active' ,   0 => 'Not Active') , 0,
                 ['class'=> 'form-control']) !!}
        </div>

        <div>
            {!! Form::label('file' , 'Title:') !!}
            {!! Form::file('avatar' , null ,['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password' , 'Password:') !!}
            {!! Form::password('password' , ['class'=> 'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::submit('Create Users' , ['class' => 'btn btn-primary col-sm-6']) !!}

        </div>

        {!! Form::close() !!}

        {!! Form::open(['method' => 'DELETE' ,
           'action' => ['AdminUsersController@destroy', $user->id]]) !!}

         <div class="form-group">
           {!! Form::submit('Delete User' , ['class' => 'btn btn-danger']) !!}
         </div>

        {!! Form::close() !!}
    </div>

     <div class="row">
         @include('includes.form-admin-error')

     </div>

    @endsection
</x-admin-master>
