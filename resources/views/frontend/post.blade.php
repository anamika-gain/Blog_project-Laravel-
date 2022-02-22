@extends('frontend.app')
@section('title','Post Details')

@section('content')


<section class="site-section py-lg">
    <div class="container">

        <div class="row blog-entries element-animate">

            <div class="col-md-12 col-lg-8 main-content">
                <img src="{{asset($post->image)}}" alt="Image" width="700" height="500">
                <div class="post-meta">
                    <span class="author mr-2"><img src="{{asset($post->user->image)}}" alt="Colorlib" class="mr-2">{{$post->user->name}}</span>&bullet;
                    <span class="mr-2">{{$post->created_at}} </span> &bullet;
                    <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                </div>
                <h1 class="mb-4">{{$post->title}}</h1>

                <a class="category mb-5" href="#">Food</a>
                <a class="category mb-5" href="#">Travel</a>

                <div class="post-content-body">
                    <p>{{$post->body}}</p>

                </div>



                <div class="pt-5">
                    <h3 class="mb-5">{{$post->comments()->count()}} Comments</h3>
                    <ul class="comment-list">
                        @foreach($post->comments as $comment)
                        <li class="comment">
                            <div class="vcard">
                                <img src="{{asset($comment->user->image)}}" alt="Image placeholder">
                            </div>
                            <div class="comment-body">
                                <h3>{{$comment->user->name}}</h3>
                                <div class="meta">{{ $comment->created_at->diffForHumans()}}</div>
                                <p>{{$comment->comment}}</p>
                                <p><a href="#" class="reply rounded">Reply</a></p>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <!-- END comment-list -->

                    <div class="comment-form-wrap pt-5">
                        <h3 class="mb-5">Leave a comment</h3>
                        @guest
                            <p>For post a new comment. You need to login first. <a href="{{ route('login') }}">Login</a></p>
                        @else
                        <form method="post" action="{{ route('comment.store',$post->id) }}" class="p-5 bg-light">
                          @csrf
                            <div class="form-group">
                                <label for="message">Comment</label>
                                <input name="comment" id="message"  class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Post Comment" class="btn btn-primary">
                            </div>

                        </form>
                        @endguest
                    </div>
                </div>

            </div>

            <!-- END main-content -->

            <div class="col-md-12 col-lg-4 sidebar">
                <div class="sidebar-box search-form-wrap">
                    <form action="#" class="search-form">
                        <div class="form-group">
                            <span class="icon fa fa-search"></span>
                            <input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter">
                        </div>
                    </form>
                </div>

                <!-- END sidebar-box -->
                <div class="sidebar-box">
                    <div class="bio text-center">
                        <img src="{{asset($post->user->image)}}" alt="Image Placeholder">
                        <div class="bio-body">
                            <h2>{{$post->user->name}}</h2>
                            <p>{{$post->user->about}}</p>
                            <p><a href="#" class="btn btn-primary btn-sm rounded">Read my bio</a></p>
                            <p class="social">
                                <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                                <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                                <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                                <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- END sidebar-box -->

                <div class="sidebar-box">
                    <h3 class="heading">Related Posts</h3>
                    <div class="post-entry-sidebar">
                        <ul>
                            @foreach($randomposts as $randompost)
                            <li>
                                <a href="">
                                    <img src="{{asset($randompost->image)}}" alt="Image placeholder" >
                                    <div class="text">
                                        <h4>{{$randompost->title}}</h4>
                                        <div class="post-meta">
                                            <span class="mr-2">{{$randompost->created_at}}</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- END sidebar-box -->

                <div class="sidebar-box">
                    <h3 class="heading">Categories</h3>
                    <ul class="categories">
                        @foreach($categories as $category)
                        <li><a href="#">{{$category->name}} <span>(12)</span></a></li>
                        @endforeach
                    </ul>
                </div>
                <!-- END sidebar-box -->

                <div class="sidebar-box">
                    <h3 class="heading">Tags</h3>
                    <ul class="tags">
                        @foreach($tags as $tag)
                        <li><a href="#">{{$tag->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- END sidebar -->

        </div>
    </div>
</section>


@endsection
