<x-admin-master>
    @section('content')

        <div class="row">

            <h1> Create Form </h1>
            {!! Form::open([ 'method' => 'POST' , 'action' => 'NewPostsController@store' , 'files'=> true]) !!}

            <div class="form-group">
                {!! Form::label('title' , 'Title') !!}
                {!! Form::text('title' , null , ['class'=> 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('category_id' , 'Category') !!}
                {!! Form::select('category_id' ,
                    $categories,
                    null , ['class'=> 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id' , 'Photo') !!}
                {!! Form::file('photo_id' , null , ['class'=> 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('body' , 'Description') !!}
                {!! Form::textarea('body' , null , ['class'=> 'form-control']) !!}
            </div>


            {!! Form::submit('Create' , ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>

       <div class="row">
           @include('includes.form-admin-error')

       </div>



        @endsection
</x-admin-master>
