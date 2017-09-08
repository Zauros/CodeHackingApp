@extends("layouts.blog-post")

@section("content")

<!-- Blog Post -->

<!-- Title -->
<h1>{{$post->title}}</h1>

<!-- Author -->
<p class="lead">
    by <a href="#">{{$post->user->name}}</a>
</p>

<hr>

<!-- Date/Time -->
<p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->diffForHumans()}}</p>

<hr>

<!-- Preview Image -->
<img class="img-responsive" src="{{$post->photo ? $post->photo->file : "http://placehold.it/900x300" }}" alt="">

<hr>

<!-- Post Content -->
<p class="lead">{{$post->body}}</p>

<hr>
@if(Session::has("comment_message"))
    {{session("comment_message")}}
@endif
<!-- Blog Comments -->
@if(Auth::check())
<!-- Comments Form -->
<div class="well">
    <h4>Leave a Comment:</h4>
      {!! Form::open(["method" => "POST","action"=>"PostCommentController@store"]) !!}
          <div class="form-group">
              <input type="hidden" name="post_id" value="{{$post->id}}">
              {!! Form::label("body","Corpo del commento:") !!}
              {!! Form::textarea("body",null,["class"=>"form-control","row"=>3]) !!}
          </div>
          <div class="form-group">
              {!! Form::submit("Submit",["class"=>"btn btn-prymary"]) !!}
          </div>
          {!! Form::close() !!}
</div>
@endif
<hr>

<!-- Posted Comments -->
@if(count($comments) >0)
@foreach($comments as $comment)
    <!-- Comment -->
<div class="media">
    <a class="pull-left" href="#">
        <img height="64px" class="media-object" src="{{Auth::user()->gravatar}}" alt="">
    </a>
    <div class="media-body">
        <h4 class="media-heading">{{$comment->author}}
            <small>{{$comment->created_at->diffForHumans()}}</small>
        </h4>
       <p> {{$comment->body}}</p>
        @if(count($comment->replies) > 0)
        @foreach($comment->replies as $replay)
            @if($replay->is_active == true)
        <!-- Nested Comment -->


        <div class="media nested-comment">
            <a class="pull-left" href="#">
                <img height="64px" class="media-object" src="{{$replay->photo}}" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading">{{$replay->author}}
                    <small>{{$replay->created_at->diffForHumans()}}</small>
                </h4>
                <p>{{$replay->body}}</p>
            </div>
            <div class="comment-reply-container">
                <button class="toggle-reply btn btn-primary pull-right">Replay</button>
            <div class="comment-reply col-sm-6">
            {!! Form::open(["method" => "POST","action"=>"CommentRepliesController@createReply"]) !!}
            <div class="form-group">
                <input type="hidden" name="comment_id" value="{{$comment->id}}">
                {!! Form::label("body","Body:") !!}
                {!! Form::text("body",null,["class"=>"form-control"]) !!}
            </div>
            <div class="form-group">
                {!! Form::submit("Create Post",["class"=>"btn btn-prymary"]) !!}
            </div>
            {!! Form::close() !!}
            </div>
            </div>

        </div>
        <!-- End Nested Comment -->
        @endif
        @endforeach
        @else
                <div class="comment-reply-container">
                    <button class="toggle-reply btn btn-primary pull-right">Replay</button>
                    <div class="comment-reply col-sm-6">
                        {!! Form::open(["method" => "POST","action"=>"CommentRepliesController@createReply"]) !!}
                        <div class="form-group">
                            <input type="hidden" name="comment_id" value="{{$comment->id}}">
                            {!! Form::label("body","Body:") !!}
                            {!! Form::text("body",null,["class"=>"form-control"]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit("Create Post",["class"=>"btn btn-prymary"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>

            @endif
    </div>
</div>
    @endforeach
    @else
    <h3>no comment</h3>
@endif

@stop
@section("script")
    <script>
        $(".comment-reply-container .toggle-reply").click(function(){
            $(this).next().slideToggle("slow")
        })
    </script>
    @endsection