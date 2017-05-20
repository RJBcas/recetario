@extends('layouts.app')

@section('content')

	<h2>Create Post</h2>
	
@include('layouts._formce',['post'=>$post])

@endsection