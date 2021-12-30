<x-admin-master>
    @section('content')
        <h1> This Category page </h1>

        @if(Session::has('inserted_category'))
            <div class="alert alert-success">
                {{session('inserted_category')}}
            </div>
        @endif

        <div class="col-sm-6">

            <h1> Create Form </h1>
            {!! Form::model($category ,[ 'method' => 'PATCH' ,
                    'action' => ['CategoriesController@update', $category -> id]]) !!}

            <div class="form-group">
                {!! Form::label('name' , 'CATEGORY') !!}
                {!! Form::text('name' , null , ['class'=> 'form-control']) !!}
            </div>

            {!! Form::submit('Create Category' , ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>

        <div class="col-sm-6">
            {!! Form::model($category ,[ 'method' => 'DELETE' ,
             'action' => ['CategoriesController@destroy', $category -> id]]) !!}

            {!! Form::submit('Delete Category' , ['class' => 'btn btn-danger']) !!}

            {!! Form::close() !!}
        </div>


    @endsection
</x-admin-master>
