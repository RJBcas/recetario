@extends('layouts.app')

@section('content')


	<div class="row">
		<div class="col-md-12">
			<h2> {{ $post->title}}</h2>
			<h3>{{ $post->description }}</h3>
			<p> Posted {{$post->created_at->diffForHumans() }}</p>
		</div>
	</div>
<small class="pull-right">
	 <a class="btn btn-success" href="{{ route('posts_path') }}"> Home </a>
</small>

@endsection