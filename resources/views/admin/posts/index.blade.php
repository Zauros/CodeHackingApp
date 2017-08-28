@extends("layouts.admin")
@section("content")

    <h1>Posts</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Image</th>
            <th>Category</th>
            <th>Owner</th>
            <th>Title</th>
            <th>Body</th>
            <th>Create</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->category ? $post->category->name : "Uncategorized"}}</td>
                    <td><img height="50px" src="{{$post->photo ? $post->photo->file : "http://placehold.it/400x400"}}" alt=""></td>
                    <td>{{$post->user->name}}</td>
                    <td><a href="{{route("admin.posts.edit",$post->id)}}">{{$post->title}}</a></td>
                    <td>{{str_limit($post->body,20)}}</td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    @stop
