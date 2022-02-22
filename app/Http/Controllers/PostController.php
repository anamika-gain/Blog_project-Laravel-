<?php

namespace App\Http\Controllers;
use App\Category;
use App\Post;
use App\tag;
use Illuminate\Http\Request;

class PostController extends Controller
{  public function index()
{
    $posts = Post::latest()->paginate(6);
    return view('frontend.post_details',compact('posts'));
}
    public function details($slug)
    {   $tags=tag::all();
        $categories =Category::all();
        $post = Post::where('slug',$slug)->first();
        $randomposts = Post::take(3)->inRandomOrder()->get();
        return view('frontend.post',compact('post','randomposts','categories','tags'));

    }
    public function postByCategory($slug)
    {
        $category = Category::where('slug',$slug)->first();
        $posts = $category->posts()->get();
        $randomposts = Post::take(3)->inRandomOrder()->get();
        return view('category_post',compact('category','posts','randomposts'));
    }

    public function postByTag($slug)
    {
        $tag = tag::where('slug',$slug)->first();
        $posts = $tag->posts()->get();
        $randomposts = Post::take(3)->inRandomOrder()->get();
        return view('tag_post',compact('tag','posts','randomposts'));
    }
    public function tagdetails($slug)
    {
        $tags=tag::all();
        $categories =Category::all();
        $post = Post::where('slug',$slug)->first();
        $randomposts = Post::take(3)->inRandomOrder()->get();
        return view('frontend.post',compact('post','randomposts','categories','tags'));
    }
}

