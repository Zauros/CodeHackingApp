@extends("layouts.admin")
@section("content")
<h1>Create User</h1>

{!! Form::open(["method" => "POST","action" =>"AdminUsersController@store","files" =>true]) !!}
    <div class="form-group">
    {!! Form::label("name","Name: ") !!}
    {!! Form::text("name",null,["class"=>"form-control"]) !!}
    </div>
<div class="form-group">
{!! Form::label("email","Email: ") !!}
{!! Form::email("email",null,["class"=>"form-control"]) !!}
</div>
<div class="form-group">
{!! Form::label("role_is","Role: ") !!}
{!! Form::select("role_id",[""=>"Choose Options"]+$roles,null,["class"=>"form-control"]) !!}
</div>
    <div class="form-group">
{!! Form::label("is_active","Status: ") !!}
{!! Form::select("is_active",array(1 => "Active",0=>"Not Active"),0,["class"=>"form-control"]) !!}
    </div>
<div class="form-group">
    {!! Form::label("file","File upload: ") !!}
    {!! Form::file("file",["class"=>"form-control"]) !!}
</div>
<div class="form-group">
    {!! Form::label("password","Password: ") !!}
    {!! Form::password("password",["class"=>"form-control"]) !!}
</div>

    {!! Form::submit("Crea un utente", ["class"=>"btn btn-info"]) !!}

    {!! Form::close() !!}

<div>
    @include("includes.form_error")
</div>

@stop
