@extends("layouts.admin")
@section("content")

    <h1>Users</h1>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Photo</th>
            <th>Email</th>
            <th>Role</th>
            <th>Active</th>
            <th>Create</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>
        @if($users)
                @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td><a href="{{route("admin.users.edit",$user->id)}}">{{$user->name}}</a></td>
            <td><img height="50" src="{{$user->photo ? $user->photo->file : "http://placehold.it/50x50" }}" class=" img-rounded" alt=""></td>
            <td>{{$user->email}}</td>
            <td>{{$user->role->name}}</td>
            <td>{{$user->is_active == 1 ?  "Active" : "No Active"}}
            </td>
            <td>{{$user->created_at->diffForHumans()}}</td>
            <td>{{$user->updated_at->diffForHumans()}}</td>
        </tr>
            @endforeach
            @endif
        </tbody>
    </table>
    @endsection()