<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use App\User;

class CommentsController extends Controller
{
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'content' => 'required',
        ]);
        
        $comment = new Comment;
        $comment->content = $request->get('content');
        $comment->user()->associate($request->user());
        $post = Post::find($request->get('post_id'));
        $post->comment()->save($comment);

        return redirect()->route('posts.show', $post)->with('success','Comment Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.comment')->with('post',$post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id); 
        $comment->delete();
        
        return back()->with('success','Comment deleted');
    }
}
