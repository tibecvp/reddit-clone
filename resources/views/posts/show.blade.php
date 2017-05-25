@extends('layouts.app')

@section('content')

<div class="row">
	<div class="col-md-12">
		<h2>{{$post->title}}</h2>
		<p>{{$post->description}}</p>
		<a href="{{$post->url}}">{{$post->url}}</a>
		<p>Posted {{$post->created_at->diffForHumans()}}</p>
	</div>
</div>

@endsection