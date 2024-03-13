<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Dotenv\Repository\Adapter\ReplacingWriter;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class PostrController extends Controller
{
    // function swetchpag(Request $req){
    //     $posts = Post::all();
    //     $type = 'home'; // Default value

    //     switch ($req->input('type')) {
    //         case 'home':
    //             $type = 'home';
    //             break;
    //         case 'blogs':
    //             $type = 'blogs';
    //             // dd($posts);
    //             break;
    //     }


    //     return view('dashboard',[
    //           'type' =>$type,
    //           'nom' =>'mehdi'
    //     ]);
    // }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
        $posts = Post::all();
        $type = 'home'; // Default value

        switch ($req->input('type')) {
            case 'home':
                $type = 'home';
                break;
            case 'blogs':
                $type = 'blogs';
                // dd($posts);
                break;
        }


        return view('dashboard', [
            'type' => $type,
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $PostStor =  new Post();

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image_path' => 'required|mimes:png,jpg,jpeg,avif',
        ]);

        if ($request->has('image_path')) {
            $img = $request->file('image_path');
            $extend = $img->getClientOriginalExtension();
            $filename = time() . '.' . $extend;
            $img->move('uplod', $filename);
        }
        // dd(Str::slug($request->title, '-'));

        $PostStor->slug = Str::slug($request->title, '-');
        $PostStor->title = strip_tags($request->input('title'));
        $PostStor->sedcription = strip_tags($request->input('description'));
        $PostStor->image_path = $filename;
        $PostStor->user_id = auth()->user()->id;

        $PostStor->save();

        return redirect()->route('index', ['type' => 'blogs']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        
        $adminEmil ='admin@gmail.com';
        $is_admin = (Auth::user()->email ===$adminEmil );
        
       // dd($is_admin);
         return view('blogs.show', ['post' => $post,  'is_admin'=>$is_admin]);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        //dd($posts);
        return view('blogs.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $slug)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image_path' => 'required|mimes:png,jpg,jpeg,avif',
        ]);

        if ($request->has('image_path')) {
            $img = $request->file('image_path');
            $extend = $img->getClientOriginalExtension();
            $filename = time() . '.' . $extend;
            $img->move('uplod', $filename);
        }


        //##################### method 2 to updat ###############
          Post::where('slug', $slug)->update([                
             'title'=>$request->input('title'),               
             'sedcription'=>$request->input('description'), 
             'image_path'=>$filename,  
            'slug'=>$slug,         
             'user_id'=>auth()->user()->id                    
         ]);                                                  
        //#######################################################

        return redirect('home/' . $slug)->with('msg', 'the Post updated secssesfly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $to_delete = Post::findOrFail($id);
        $to_delete->delete();

        return redirect()->route('index', ['type' => 'blogs'])->with('msge', 'the Post delete secssesfly');
    }
}
