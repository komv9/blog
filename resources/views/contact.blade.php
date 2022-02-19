<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contact Form</title>
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
	<h1>Contact form</h1>
	<form method="POST" action="{{url('/contact_upload/'.$post->id)}}" enctype="multipart/form-data">
		@csrf
		<label>Name: </label>
		<input type="text" name="name" class="@error('name') is-invalid @enderror"><br>
		@error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label>Email: </label>
		<input type="text" name="email" class="@error('email') is-invalid @enderror"><br>
		@error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label>Phone: </label>
		<input type="number" name="phone" class="@error('phone') is-invalid @enderror"><br>
		@error('phone')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
		<label>Suggestions: </label>
		<textarea name="suggestion" class="@error('post') is-invalid @enderror"></textarea><br>
		@error('suggestion')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
		<button type="submit">submit</button>
	</form>
	@endif
</body>
</html>