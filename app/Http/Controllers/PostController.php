<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{  

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       //$posts = DB::table('posts')->get();
       //$posts = Post::all();       

       
       // PULL POSTS W./COMMENTS TO SAVE no. OF DB QUERIES (eager loading)

       // get all
       //$posts = Post::with('comments', 'user')->latest()->get();

       // with pagination
       $posts = Post::with('comments', 'user')->latest()->paginate(5);  

       // POSTS SEARCH
       if ($request) {

            // Get the search value from the request
            $search = $request->input('search');

            // Search in the title column from the posts table
            $posts = Post::query()
                ->where('title', 'LIKE', "%{$search}%")                
                ->latest()->paginate(5);
       }
    
       return view('posts.index',  ['posts' => $posts]);
    }

  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $request['slug'] = Str::slug($request->title);

        // dd($request);

        $request->validate([
            'text' => 'required', 
            'title' => 'required',          
        ]);       

        auth()->user()->posts()->create(
            $request->all()
        );       
        
        return redirect('/posts/')->with('flash', 'you posted!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // eager loading
        $post->load('comments', 'comments.user');

        // if key = value in array, can use php fn compact: ['post' => $post] = compact('post')
        return view('posts.show',  ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $request->validate([
            'title' => 'required', 
            'text' => 'required',            
        ]);      
        
        $post->title = $request->title;
        $post->text = $request->text;
        $post->save();
       

        return redirect('/posts/' . $post->post_id)->with('flash', 'you updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('update', $post);

        $post->delete();

        return redirect('/posts')->with('flash', 'you deleted!');
    }
}


