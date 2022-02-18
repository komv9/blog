<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Post</title>
</head>
<style type="text/css">
	* {
		margin: 20px;
	}
	.alert {
		color: red;
	}
</style>
<body>
@if(isset($post->id))
<h1>Edit Post</h1>
	<form method="POST" action="{{url('/update_post/'.$post->id)}}" enctype="multipart/form-data">
		@csrf
		<label>Add picture:</label>
		<input type="file" name="image" accept="image/*" value="{{$post->image??''}}" class="@error('image') is-invalid @enderror"><br>
	    <img src="{{asset($post->image)}}"><br><br>
	    @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
		<label>Title</label>
		<input type="text" name="title" class="@error('title') is-invalid @enderror" value="{{$post->title}}"><br>
		@error('title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
		<label>Content</label>
		<textarea name="post" class="@error('post') is-invalid @enderror">{{$post->post}}</textarea><br>
		@error('post')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label>Select Categories</label>
        <select name="category[]" multiple>
        @foreach($categories as $category)
  <option value="{{$category->id}}" @if(in_array($category->id,$post_category)) selected @endif>{{$category->name}}</option>
        @endforeach
</select><br>
    <br>
        @error('category')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
		<button type="submit">Edit</button>
	</form>

@else
	<h1>Add Post</h1>
	<form method="POST" action="{{url('/store_post')}}" enctype="multipart/form-data">
		@csrf
		<label>Add picture:</label>
	    <input type="file" accept="image/*" name="image" class="@error('image') is-invalid @enderror"><br>
	    @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
		<label>Title</label>
		<input type="text" name="title" class="@error('title') is-invalid @enderror"><br>
		@error('title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
		<label>Content</label>
		<textarea name="post" class="@error('post') is-invalid @enderror"></textarea><br>
		@error('post')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label>Select Categories</label>
        <select name="category[]" multiple>
        @foreach($categories as $category)
       <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
        </select>
        @error('category')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
		<button type="submit">Add</button>
	</form>
@endif
</body>
</html>