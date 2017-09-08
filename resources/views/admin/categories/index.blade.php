@extends("layouts.admin")
@section("content")
    <h1>List of categories</h1>
    <div class="row">
        <div class="col-sm-3">
                {!! Form::open(["method" => "POST","action"=>"AdminCategoriesController@store"]) !!}
                    <div class="form-group">
                        {!! Form::label("name","Name:") !!}
                        {!! Form::text("name",null,["class"=>"form-control"]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit("Create Category",["class"=>"btn btn-prymary"]) !!}
                    </div>
                    {!! Form::close() !!}
        </div>
    <div class="col-sm-9">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Create</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
            <th scope="row">{{$category->id}}</th>
            <td><a href="{!! route("admin.category.edit",$category->id) !!}">{{$category->name}}</a></td>
            <td>{{$category->created_at->diffForHumans()}}</td>
            <td>{{$category->updated_at->diffForHumans()}}</td>

        </tr>
                @endforeach
        </tbody>
    </table>
    </div>
    </div>
@endsection