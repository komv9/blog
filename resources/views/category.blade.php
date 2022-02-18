<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Category</title>
</head>
<body>

@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <!--post starts-->
            @forelse($posts as $post)
            <div class="container mt-5">
            <div class="row main-section">
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <div class="card rounded-0 shadow-sm" >
                        <div class="card-header">
                            <span>By</span>
                            <a href="{{url('/author_posts/'.$post->user_id)}}"><span class="text-success">{{$post->user->name}}</span></a>
                            <span>On</span>
                            <span class="text-success">{{date('d-F-Y', strtotime($post->created_at))}}</span>
                        </div>
                        <div class="card-body">
                             <img class="card-img-top" src="{{asset($post->image)}}" alt="bootstrap simple blog">
                            <hr>
                            <h2 class="card-title">{{$post->title}}</h2>
                            <p class="card-text">{{$post->post}}</p>
                            <a href="blog-post.html" class="btn btn-primary">Read more</a>
                        </div>
                    </div>
                    @empty
                    No Post Found
            @endforelse
            <!--post ends-->

</div>
</div>
</div>
</body>
</html>