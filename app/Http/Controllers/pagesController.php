<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class pagesController extends Controller
{
    //

    // function home(){
    //     return view('components.home');
    // }

    function blogs(){
        $posts = Post::all();

        return view('welcome',[
            'posts'=>$posts,
        ]);
    }

   
}
