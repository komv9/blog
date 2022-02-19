<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Advertise</title>
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
	<h1>Advertise</h1>
	<form method="POST" action="{{url('/ad_store')}}" enctype="multipart/form-data">
		@csrf
		<label>Image: </label>
	    <input type="file" accept="image/*" name="image" class="@error('image') is-invalid @enderror"><br>
	    @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
		<label>Text: </label>
		<input type="text" name="text" class="@error('text') is-invalid @enderror"><br>
		@error('text')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
		<label>URL: </label>
		<textarea name="url" class="@error('url') is-invalid @enderror"></textarea><br>
		@error('url')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
		<button type="submit">Add</button>
	</form>
</body>
</html>