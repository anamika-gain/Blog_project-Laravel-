@extends('frontend.app')
@section('title','home')

@section('content')
    @php
        $resent_post=DB::table('posts')->where('status',1)->orderBy('id','desc')->limit(4)->get();
        $posts=DB::table('posts')->where('status',1)->get();
        $tags=DB::table('tags')->get();
    @endphp
    <section class="site-section pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="owl-carousel owl-theme home-slider">
                        <div>
                            @foreach ($resent_post as $resent)
                                <a href="" class="a-block d-flex align-items-center height-lg" style="background-image: url('{{ asset($resent->image) }}'); ">
                                    <div class="text half-to-full">
                                        <span class="category mb-5"></span>
                                        <div class="post-meta">

                                            <span class="author mr-2"><img src="{{ asset($resent->image) }}" alt="Colorlib"> Colorlib</span>&bullet;
                                            <span class="mr-2">March 15, 2021 </span> &bullet;
                                            <span class="ml-2"><span class="fa fa-comments"></span> 3</span>

                                        </div>
                                        <h3>{{$resent->title}}</h3>
                                        <p>{{$resent->body}}</p>
                                    </div>
                                </a>
                            @endforeach
                        </div>

                    </div>

                </div>
            </div>

        </div>


    </section>
    <section class="site-section py-sm">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="mb-4">Latest Posts</h2>
                </div>
            </div>
            <div class="row blog-entries">
                <div class="col-md-12 col-lg-8 main-content">
                    <div class="row">
                        @foreach($posts as $post)
                            <div class="col-md-6">
                                <a href="blog-single.html" class="blog-entry element-animate" data-animate-effect="fadeIn">
                                    <img src="{{ asset($post->image) }}" alt="Image placeholder" height="220px" width="330px">
                                    <div class="blog-content-body">
                                        <div class="post-meta">
                                            <span class="author mr-2">{{$post->user_id}}</span>&bullet;
                                            <span class="mr-2">{{$post->created_at}} </span> &bullet;
                                            <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                                        </div>
                                        <h2 class="title"><a href="{{route('post.details',$post->slug)}}"> {{$post->title}}</a></h2>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>

                    <div class="row mt-5">
                        <div class="col-md-12 text-center">
                            <nav aria-label="Page navigation" class="text-center">
                                <ul class="pagination">
                                    <li class="page-item  active"><a class="page-link" href="#">&lt;</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                                    <li class="page-item"><a class="page-link" href="#">&gt;</a></li>
                                </ul>
                            </nav>
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
                    @php
                        $admin=DB::table('users')->where('role_id',1)->get();
                    @endphp
                    @foreach($admin as $user)
                        <div class="sidebar-box">
                            <div class="bio text-center">
                                <img src="{{ asset($user->image) }}" alt="Image placeholder">
                                {{--                            <img src="{{asset($user->image)}}alt="Image Placeholder" class="img-fluid">--}}
                                <div class="bio-body">
                                    <h2>{{$user->name}}</h2>
                                    <p>{{$user->about}}</p>
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
                @endforeach
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
                        @foreach( $categories as $category)
                            <ul class="categories">
                                <li><a href="#">{{$category->name}} <span>(12)</span></a></li>

                            </ul>
                        @endforeach
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
<section class="site-section pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="owl-carousel owl-theme home-slider">
                    <div>
                        <a href="blog-single.html" class="a-block d-flex align-items-center height-lg" style="background-image: url('{{ asset ('/') }}/front-end/images/img_1.jpg'); ">
                            <div class="text half-to-full">
                                <span class="category mb-5">Food</span>
                                <div class="post-meta">

                                    <span class="author mr-2"><img src="{{ asset ('/') }}/front-end/images/person_1.jpg" alt="Colorlib"> Colorlib</span>&bullet;
                                    <span class="mr-2">March 15, 2018 </span> &bullet;
                                    <span class="ml-2"><span class="fa fa-comments"></span> 3</span>

                                </div>
                                <h3>How to Find the Video Games of Your Youth</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem nobis, ut dicta eaque ipsa laudantium!</p>
                            </div>
                        </a>
                    </div>
                    <div>
                        <a href="blog-single.html" class="a-block d-flex align-items-center height-lg" style="background-image: url('{{ asset ('/') }}/front-end/images/img_1.jpg'); ">
                            <div class="text half-to-full">
                                <span class="category mb-5">Food</span>
                                <div class="post-meta">

                                    <span class="author mr-2"><img src="{{ asset ('/') }}/front-end/images/person_1.jpg" alt="Colorlib"> Colorlib</span>&bullet;
                                    <span class="mr-2">March 15, 2018 </span> &bullet;
                                    <span class="ml-2"><span class="fa fa-comments"></span> 3</span>

                                </div>
                                <h3>How to Find the Video Games of Your Youth</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem nobis, ut dicta eaque ipsa laudantium!</p>
                            </div>
                        </a>
                    </div>

                </div>

            </div>
        </div>

    </div>


</section>
