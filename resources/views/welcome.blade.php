<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/blog.css">
        <title>Blog</title>
    </head>
    <body>
        <!-- navbar start -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
            <a class="navbar-brand" href="#">Blog</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Notification</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" method="GET" action="">
                    <input class="form-control mr-sm-2 rounded-0" type="search" placeholder="Search" aria-label="Search" name="term">
                    <button class="btn btn-outline-success rounded-0 my-2 my-sm-0" type="submit">Search</button>
                    </a>  
                </form>
            </div>
        </nav>
        <!-- navbar ends -->
        <!-- main content start  -->
        <div class="container mt-5">
            <div class="row main-section">
                <div class="col-sm-12 col-md-9 col-lg-9">
                    @if(isset($searchResults))
                    <h2>Search Results</h2>
                    <p>Following are posts matching your search:</p>
                    @foreach($searchResults as $result)
                    <div class="card rounded-0 shadow-sm" >
                        <div class="card-header">
                            <span>By</span>
                            <a href="{{url('/author_posts/'.$result->user_id)}}"><span class="text-success">{{$result->user->name}}</span></a>
                            <span>On</span>
                            <span class="text-success">{{date('d-F-Y', strtotime($result->created_at))}}</span>
                        </div>
                        <div class="card-body">
                             <img class="card-img-top" src="{{asset($result->image)}}" alt="bootstrap simple blog" style="width:50%">
                            <hr>
                            <h2 class="card-title">{{$result->title}}</h2>
                            <p class="card-text">{{substr($result->post, 0, 200)}}</p>
                            <a href="{{url('/blog_post/'.$result->id)}}" class="btn btn-primary">Read more</a>
                        </div>
                        <br><br>
                        @endforeach
                    @else
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
                            <a href="{{url('/blog_post/'.$post->id)}}" class="btn btn-primary">Read more</a>
                        </div>
                        <br><br>
                        @endforeach
                        @endif
                    </div>
                </div>
                
                    <div class="d-flex justify-content-center">
                        <nav aria-label="...">
                            <ul class="pagination">
                                <li class="page-item disabled">
                                    <span class="page-link">Previous</span>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active">
                                    <span class="page-link">
                                        2
                                        <span class="sr-only">(current)</span>
                                    </span>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <div class="card rounded-0 shadow-sm">
                        <div class="card-header">
                            Categories
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="{{url('category')}}">Social</a></li>
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
