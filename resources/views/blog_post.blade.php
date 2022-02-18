<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/blog.css">
        <title>Blog Post</title>
    </head>
    <body>
        @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                <a href="{{url('categories')}}"><button>Categories</button></a>
                <a href="{{url('add_post')}}"><button>Add Post</button></a>
            </div>
        <!-- main content start  -->
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
                            @if(isset($loginID))
                            <a href="{{url('/edit_post/'.$post->id)}}"  class="btn btn-primary">Edit Post</a>
                            <a href="{{url('/delete_post/'.$post->id)}}"  class="btn btn-primary">Delete Post</a>
                            @endif

                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col col-sm-10 col-md-10">
                                    <div class="form-group">
                                        <input type="text" name="comment" class="form-control rounded-0" value="Enter comment...">
                                    </div>
                                </div>
                                <div class="col col-sm-2 col-md-2">
                                    <button class="btn btn-warning rounded-0">Submit</button>
                                </div>
                            </div>
                            <div class="comment-section">
                                <span class="text-success bg-faded">Nice Aritcle...</span>
                                <span class="text-success">Wow...Nice!</span>
                                <span class="text-success">Nice one...Great thanks...</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <div class="card rounded-0 shadow-sm">
                        <div class="card-header">
                            Category
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="#">Social</a></li>
                            <li class="list-group-item"><a href="#">Sports</a></li>
                            <li class="list-group-item"><a href="#">Technology</a></li>
                            <li class="list-group-item"><a href="#">Trend's</a></li>
                            <li class="list-group-item"><a href="#">Samsung</a></li>
                        </ul>
                        <div class="card-footer">
                            <span class="text-info"> Ads will be goes here</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main content ends -->
        @endsection
        <div class="footer-section mt-5">
            <p class="text-center m-0 text-white">2018 © Copyright by Bootcatch.com</p>
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
