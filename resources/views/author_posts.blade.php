<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Posts by Author</title>
</head>
<body>
	@extends('layouts.app')
	 <div class="container mt-5">
            <div class="row main-section">
                <div class="col-sm-12 col-md-9 col-lg-9">
                    @foreach($posts as $post)
                    <div class="card rounded-0 shadow-sm" >
                        <div class="card-header">
                            <span>By</span>
                            <a href="{{url('/author_posts/'.$post->user_id)}}"><span class="text-success">{{$post->user->name}}</span></a>
                            <span>On</span>
                            <span class="text-success">{{date('d-F-Y', strtotime($post->created_at))}}</span>
                        </div>
                        <div class="card-body">
                             <img class="card-img-top" src="{{asset($post->image)}}" alt="bootstrap simple blog" style="width:50%">
                            <hr>
                            <h2 class="card-title">{{$post->title}}</h2>
                            <p class="card-text">{{substr($post->post, 0, 200)}}</p>
                            <a href="blog-post.html" class="btn btn-primary">Read more</a>
                        </div>
                        <br><br>
                        @endforeach
                    </div>
                </div>
</body>
</html>