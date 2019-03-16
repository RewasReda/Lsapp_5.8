@extends('layouts.app')


@section('content')
<h1>{{$post->title}}</h1>
<img style="width:50% ;height 10%" src="/storage/cover_images/{{$post->cover_image}}">
<br><br>
<small>Written At {{$post->created_at}}</small>
<div>

    {!!$post->body!!}
</div>

<small>Written At {{$post->created_at}} by {{$post->user->name}}</small>
<hr>
<a href="/posts" class="btn btn-primary">Go Back</a>
<hr>

@if(!Auth::guest())
    @if(Auth::user()->id == $post->user_id)
        <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>

        {!!Form::open(['action' =>['PostsController@destroy',$post->id],'method'=>'POST', 'class'=>'float-right'])!!}
            {{Form::hidden('_method','DELETE')}}
            {{{Form::submit('Delete',['class'=>'btn btn-danger'])}}}
        {!!Form::close()!!}
    @endif
@endif
@endsection