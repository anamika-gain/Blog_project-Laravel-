@extends('frontend.app')
@section('title','category-post')

@section('content')

    <!-- END header -->
@php
$categories=DB::table ('categories')->get();
$tags=DB::table('tags')->get();
@endphp

    <section class="site-section pt-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h2 class="mb-4">Tag:Posts</h2>
                </div>
            </div>
            <div class="row blog-entries">

                <div class="col-md-12 col-lg-8 main-content">
                    <div class="row mb-5 mt-5">
                        @foreach($posts as $post)
                            <div class="col-md-12">

                                <div class="post-entry-horzontal">
                                    <a href="{{ url('post/'.$post->slug) }}">
                                        <div class="image element-animate" data-animate-effect="fadeIn" >  <img src="{{ asset($post->image) }}" alt="Image placeholder" height="200" width="200"></div>
                                        <span class="text">
                      <div class="post-meta">
                        <span class="author mr-2"><img src="{{asset($post->user->image)}}" alt="Colorlib">{{$post->user->name}}</span>&bullet;
                        <span class="mr-2">{{$post->created_at}} </span> &bullet;
                        <span class="mr-2"></span> &bullet;
                        <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                      </div>
                      <h2>{{$post->title}}</h2>
                    </span>
                                    </a>
                                </div>
                                <!-- END post -->


                            </div>
                        @endforeach
                    </div>




                </div>

                <!-- END main-content -->
                <div class="col-md-12 col-lg-4 sidebar">

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
