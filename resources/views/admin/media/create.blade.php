<x-admin-master>

    @section('styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css">
        @stop

    @section('content')

        <h1> Let's Upload Media Photo</h1>


            <h1> Create Form </h1>
            {!! Form::open([ 'method' => 'POST' ,
            'action' => 'MediaController@store' , 'class' => 'dropzone']) !!}

            {!! Form::close() !!}

        @endsection



    @section('script-drop')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js">
                </script>
        @stop

</x-admin-master>

