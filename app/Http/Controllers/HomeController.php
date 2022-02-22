<?php

namespace App\Http\Controllers;
use App\tag;
use App\Category;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{


    public function index()
    {   $tags= tag::all();
        $categories= Category::all();
        $posts= Post::latest()->paginate(10);
        $users= User::all();
        $randomposts = Post::take(3)->inRandomOrder()->get();
        return view('frontend.home.home',compact('randomposts','categories','posts','users','tags'));
    }
}
