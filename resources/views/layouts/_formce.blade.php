@if($post->exists )

	<form action="{{ route('update_post_path',['post'=> $post->id])}}" method="POST">
	<!--helper para especificcar el tipo de metodo que se quiere -->
	 {{ method_field('Put') }}

 @else

	<form action="{{ route('store_post_path')}}" method="POST">

@endif

{{ csrf_field() }}	

<div class="for-group">
	
	<label for="Titulo">Title:</label>
	<input type="text" name="title" class="form-control" value="{{ $post->title or old('title') }}"/>
</div>	
<div class="form-group">
	
	<label for="Descripcion">Description:</label>
	<textarea name="description" id="" cols="30" class="form-control" rows="5" >{{ $post->description or old('description') }}</textarea>
</div>
<div class="form-group">
	
	<label for="Url">Url:</label>
	<input type="text" name="url" class="form-control" value="{{ $post->url or  old('url') }}">
</div>


<div class="form-group">
	<button type="submit" class="btn btn-primary">Save Post</button>	
</div>
</form>	