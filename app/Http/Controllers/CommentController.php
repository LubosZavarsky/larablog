<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  
    public function store(Request $request)
    {
        //dd($request);

        $request->validate([
            'text' => 'required',
            'post_id' => 'required|integer|exists:posts,id'
        ]);

        auth()->user()->comments()->create(
            $request->all()
        );

        // Comment::create(
        //     $request->all()
        // );

        //return redirect()->back();
        return redirect('/posts/' . $request->post_id . '#comments')->with('flash', 'you commented!');
    }    

     /**
     * Show the form for editing the specified resource.
     *     
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {        
        return view('comments.edit', ['comment' => $comment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)    
    {
        $this->authorize('update', $comment);

        $request->validate([
            'text' => 'required',            
        ]);

        //dd($comment);
        $comment->text = $request->text;
        $comment->save();

        return redirect('/posts/' . $comment->post_id . '#comments')->with('flash', 'you updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Comment $comment)
    {
        $this->authorize('update', $comment);
        
        $comment->delete();

        return redirect()->back()->with('flash', 'you deleted!');
    }
}
