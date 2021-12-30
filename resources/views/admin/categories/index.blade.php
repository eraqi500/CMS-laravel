<x-admin-master>
    @section('content')
        <h1> This Category page </h1>

      @if(Session::has('inserted_category'))
          <div class="alert alert-success">
              {{session('inserted_category')}}
          </div>
          @elseif(Session::has('delete_cat'))
          <div class="alert-danger alert">
              {{session('delete_cat')}}
          </div>
        @endif

       <div class="col-sm-6">

               <h1> Create Form </h1>
               {!! Form::open([ 'method' => 'POST' , 'action' => 'CategoriesController@store']) !!}

               <div class="form-group">
                   {!! Form::label('name' , 'CATEGORY') !!}
                   {!! Form::text('name' , null , ['class'=> 'form-control']) !!}
               </div>

               {!! Form::submit('Create Category' , ['class' => 'btn btn-primary']) !!}

               {!! Form::close() !!}
       </div>

        <div class="col-sm-6">

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Id </th>
                    <th> Name </th>
                    <th>Created_at </th>

                </tr>
                </thead>
                <tbody>
                @if($categories)
                    @foreach($categories as $cat)
                        <tr>
                            <td> {{$cat -> id}}</td>
                            <td>
                                <a href="{{route('categories.edit' , $cat->id)}}">
                                    {{$cat -> name }}
                                </a>
                                </td>
                            <td> {{$cat -> created_at ?
                                   $cat->created_at->diffForHumans(): 'no day supported'}}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>

        </div>
        @endsection
</x-admin-master>
