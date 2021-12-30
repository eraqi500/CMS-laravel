<x-admin-master>
    @section('content')

        <h1>show  Posts </h1>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>Id </th>
                <th> Owner </th>
                <th>Category </th>
                <th>Photo </th>
                <th> Title </th>
                <th> Body </th>
                <th> Post link </th>
                <th> Comments  </th>
                <th> Created_at </th>
                <th> Updated_at </th>
            </tr>
            </thead>
            <tbody>
            @if($newposts)
                @foreach($newposts as $post)
                    <tr>
                        <td> {{$post -> id}}</td>
                        <td>
                            <a href="{{route('newposts.edit', $post-> id)}}">
                            {{$post -> user->name}}
                            </a>
                        </td>
                        <td> {{$post -> category ? $post->category ->name: 'not Categorized'}}</td>
                        <td>
                           <img alt="post_image"
                                height="50"
                                src="{{$post ->photo ? $post->photo->file : 'http://placehold.it/400x400'}}">
                        </td>
                        <td>
                            <a href="{{route('newposts.edit', $post-> id)}}">
                                {{$post -> title}}
                            </a>
                           </td>
                        <td> {{Str::limit($post -> body , 10 ,'##')}} </td>
                        <td> <a href="{{route('home.post' , $post->id)}}"> View Post</a></td>
                        <td> <a href="{{route('comments.show', $post->id)}}"> View Comments </a></td>
{{--                        <td> {{$post -> created_at->diffForHumans()}}</td>--}}
{{--                        <td> {{$post -> updated_at->diffForHumans()}}</td>--}}
                    </tr>
                @endforeach

            </tbody>
        </table>

        @else
        <h1 class="text-danger"> No Comments  </h1>
        @endif
        @endsection

</x-admin-master>


