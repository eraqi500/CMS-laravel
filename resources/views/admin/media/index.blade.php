<x-admin-master>
    @section('content')
        <h1> This Media page </h1>

{{--      @if(Session::has('inserted_category'))--}}
{{--          <div class="alert alert-success">--}}
{{--              {{session('inserted_category')}}--}}
{{--          </div>--}}
{{--          @elseif(Session::has('delete_cat'))--}}
{{--          <div class="alert-danger alert">--}}
{{--              {{session('delete_cat')}}--}}
{{--          </div>--}}
{{--        @endif--}}

{{--       <div class="col-sm-6">--}}

{{--               <h1> Create Form </h1>--}}
{{--               {!! Form::open([ 'method' => 'POST' , 'action' => 'CategoriesController@store']) !!}--}}

{{--               <div class="form-group">--}}
{{--                   {!! Form::label('name' , 'CATEGORY') !!}--}}
{{--                   {!! Form::text('name' , null , ['class'=> 'form-control']) !!}--}}
{{--               </div>--}}

{{--               {!! Form::submit('Create Category' , ['class' => 'btn btn-primary']) !!}--}}

{{--               {!! Form::close() !!}--}}
{{--       </div>--}}

        <div class="col-sm-6">
            @if($photos)
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Id </th>
                        <th> Name </th>
                        <th>Created_at </th>
                        <th> Delete </th>

                    </tr>
                    </thead>
                    <tbody>
                    @if($photos)
                        @foreach($photos as $photo)
                            <tr>
                                <td> {{$photo -> id}}</td>
                                <td>
                                   <img height="50" src="{{$photo->file}}" alt="img">
                                </td>
                                <td> {{$photo -> created_at ?
                                   $photo->created_at->diffForHumans(): 'no day supported'}}
                                </td>
                                <td>
{{--                                    <div class="col-sm-6">--}}
{{--                                    {!! Form::model($photo ,['method' => 'DELETE',--}}
{{--                                        'action' =>['MediaController@destroy' , $photo->id]]) !!}--}}
{{--                                    <div class="form-group">--}}
{{--                                        {!! Form::submit(['Delete Pic' , ['class' => 'btn btn-danger']]) !!}--}}
{{--                                    </div>--}}
{{--                                    {!! Form::close() !!}--}}
{{--                                    </div>--}}
                                    <div class="col-sm-6">
                                        <form action="/admin/media/{{$photo->id}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="btn btn-danger"> Delete </button>
                                        </form>
                                    </div>


                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                @endif

        </div>
        @endsection
</x-admin-master>
