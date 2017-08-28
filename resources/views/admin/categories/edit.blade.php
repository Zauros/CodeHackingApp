@extends("layouts.admin")
@section("content")
    <h1>Edit category</h1>
<div class="row">
    <div class="col-sm-6">
    {!! Form::model($category,["method" => "PATCH","action" =>["AdminCategoriesController@update",$category->id]],$category) !!}

        {!! Form::label("name","Name: ") !!}
        {!! Form::text("name",null,["class"=>"form-control"]) !!}

        {!! Form::submit("Edit Category", ["class"=>"btn btn-info col-sm-6"]) !!}

        {!! Form::close() !!}
        {!! Form::open(["method" => "DELETE","action"=>["AdminCategoriesController@destroy",$category->id]]) !!}

            <div class="form-group">
                {!! Form::submit("Delete Category",["class"=>"btn btn-danger col-sm-6"]) !!}
            </div>
            {!! Form::close() !!}
    </div>
</div>
    @endsection