<header role="banner">
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-9 social">
                    <a href="#"><span class="fa fa-twitter"></span></a>
                    <a href="#"><span class="fa fa-facebook"></span></a>
                    <a href="#"><span class="fa fa-instagram"></span></a>
                    <a href="#"><span class="fa fa-youtube-play"></span></a>
                </div>
                <div class="col-3 search-top">
                    <!-- <a href="#"><span class="fa fa-search"></span></a> -->
                    <form method="GET" action="{{route('search')}}" class="search-top-form">
                        <span class="icon fa fa-search"></span>
                        <input type="text" name="query" id="s" placeholder="Type keyword to search...">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container logo-wrap">
        <div class="row pt-5">
            <div class="col-12 text-center">
                <a class="absolute-toggle d-block d-md-none" data-toggle="collapse" href="#navbarMenu" role="button" aria-expanded="false" aria-controls="navbarMenu"><span class="burger-lines"></span></a>
                <h4 class="site-logo"><a href="index.html">HEALTH BLOG</a></h4>
            </div>
        </div>
    </div>


</header>
@php
    $categories = DB::table('categories')->get();
    $tags = DB::table('tags')->get();
@endphp
<nav class="navbar navbar-expand-md  navbar-light bg-light">
    <div class="container">


        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="index.html">Home</a>
                </li>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="category.html" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tags</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown05">
                        @foreach($tags as $tag)
                            <a class="dropdown-item" href="{{route('tag.posts',$tag->slug)}}">
                                {{$tag->name}}
                            </a>
                        @endforeach
                    </div>

                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="category.html" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown05">
                        @foreach($categories as $category)
                            <a class="dropdown-item" href="{{route('category.posts',$category->slug)}}">
                                {{$category->name}}
                            </a>
                        @endforeach
                    </div>

                </li>

                <li class="nav-item">
                    <a class="nav-link" href="about.html">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact</a>
                </li>
            </ul>

        </div>
    </div>
</nav>

<!-- END section -->
