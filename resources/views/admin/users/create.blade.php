<x-admin-master>
    @section('content')

        <h1> Create Users </h1>


            <h1> Create Form </h1>
            {!! Form::open([ 'method' => 'post' ,
            'action' => 'AdminUsersController@store' ,
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
                {!! Form::submit('Create Users' , ['class' => 'btn btn-primary']) !!}

            </div>

            {!! Form::close() !!}

        @include('includes.form-admin-error')
        @endsection
</x-admin-master>
