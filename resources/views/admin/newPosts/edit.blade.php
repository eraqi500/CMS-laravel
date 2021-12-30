

        <x-admin-master>
            @section('content')

                <div class="col-sm-3">
                    <img src="{{$post->photo->file}}" alt="no image" class="img-responsive">
                </div>


                <div class="row">

                    <div class="col-sm-9">

                    <h1> Edit Form </h1>
                    {!! Form::model($post ,
                        [ 'method' => 'PATCH' ,
                        'action' => ['NewPostsController@update',$post->id ] , 'files'=> true]) !!}

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


                    {!! Form::submit('Edit NEw Post' , ['class' => 'btn btn-primary']) !!}

                    {!! Form::close() !!}

                    {!! Form::open(['method' => 'DELETE' ,
                    'action' => ['NewPostsController@destroy' , $post-> id]]) !!}

                    <div class="form-group">
                        {!! Form::submit('Delete Post' , ['class' => 'btn btn-danger col-sm-6']) !!}
                    </div>
                    {!! Form::close() !!}

                    </div>

                </div>

                <div class="row">
                    @include('includes.form-admin-error')

                </div>



            @endsection
        </x-admin-master>


