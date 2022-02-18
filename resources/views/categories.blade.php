<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Categories</title>
</head>
<style type="text/css">
	* {
		margin: 20px;
	}
</style>
<body>
	<h1>Categories</h1>
	@if(isset($categories))
	<table>
  <tr>
    <th>Category Name</th>
    <th>Action</th>
  </tr>
  @foreach($categories as $category)
  <tr>
    <td>{{$category->name}}</td>
    <td><a href="{{url('/category_edit/'.$category->id)}}">Edit</a></td>
    <td><a href="{{url('/category_delete/'.$category->id)}}">Delete</a></td>
  </tr>
  @endforeach
</table>
	@endif

<br><br><br>
@if(isset($category_edit))
<h2>Edit Category</h2>
<form action="{{url('/category_update/'.$category_edit->id)}}" method="post">
	@csrf
	<label>Category Name:</label>
	<input type="text" name="name" value="{{$category_edit->name??''}}"><br>
	<br>
	<button type="submit">Edit</button>
</form>
@else
<h2>Add Category</h2>
<form action="{{url('categories_add')}}" method="POST">
	@csrf
	<label>Category Name: </label>
	<input type="text" name="name"><br><br>
	<button type="submit">Add</button>
</form>
@endif
</body>
</html>