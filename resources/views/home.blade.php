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
            <!--side section starts-->
<div class="col-sm-12 col-md-3 col-lg-3" style="float:right; margin-top: 100px;">
                    <div class="card rounded-0 shadow-sm">
                        <div class="card-header">
                            Categories
                        </div>
                        <ul class="list-group list-group-flush">
                            @foreach($categories as $category)
                            <li class="list-group-item"><a href="{{url('/category/'.$category->id)}}">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                        <div class="card-footer">
                            @if(isset($advertise))
                            <a href="{{$advertise->ad_url}}">
                            <span class="text-info">{{$advertise->text}}</span>
                            <img src="{{asset($advertise->image)}}" width="100%" height="50px">
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
<!--side section ends-->


            <!--post starts-->
            
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
                             <img class="card-img-top" src="{{asset($post->image)}}" alt="bootstrap simple blog">
                            <hr>
                            <h2 class="card-title">{{$post->title}}</h2>
                            <p class="card-text">{{substr($post->post, 0, 200)}}</p>
                            <a href="{{url('/blog_post/'.$post->id)}}" class="btn btn-primary">Read more</a>
                            <a href="{{url('/edit_post/'.$post->id)}}"  class="btn btn-primary">Edit Post</a>
                            <a href="{{url('/delete_post/'.$post->id)}}"  class="btn btn-primary">Delete Post</a>
                        </div>
                    </div>
            @endforeach
            <!--post ends-->
            {{$posts->links()}}

        </div>

    </div>
</div>
@endsection
