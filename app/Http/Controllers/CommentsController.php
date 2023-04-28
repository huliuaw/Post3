<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Comment;
use App\Models\Post;
use Session;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'store']);
    }

    public function store(Request $request, $post_id)
    {
        $this->validate($request, array( 
            'comment'   =>  'required|min:1|max:2000'
        ));
        $post = Post::find($post_id);
        //Form::open(['route' => ['comments.store', $post->id], 'method' => 'post'
        $comment = new Comment();
        if(isset(Auth::user()->name)){
            $comment->name = Auth::user()->name; 
        }else {
            $this->validate($request, array(
	            'name'      =>  'required|max:255'
            ));
        	$comment->name = $request->name; 
        }
        $comment->comment = $request->comment;
        $comment->approved = true;
        $comment->post()->associate($post);
        $comment->save();
        Session::flash('success', 'Comment was added');
        return redirect('posts/'.$post_id);
    }
    public function edit($id)
    {
        $comment = Comment::find($id);
        return view('comments.edit')->withComment($comment);
    }
    public function update(Request $request, $id) {

        $comment = Comment::find($id);
        $this->validate($request, array('comment' => 'required'));
        $comment->comment = $request->comment;
        $comment->save();
        Session::flash('success', 'Comment updated');
        return redirect()->route('posts.show', $comment->post->id); //연관
    }
    public function delete($id) //GET 방식 삭제
    {
        $comment = Comment::find($id);
        $post_id = $comment->post->id; 
        //print "코멘트상세정보 : ".$comment."포스트아이디 : ".$post_id;
        $comment->delete();
        Session::flash('success', 'Deleted Comment');
        return redirect()->route('posts.show', $post_id);

    }
    public function destroy($id) { //method="delete"
        $comment = Comment::find($id);
        $post_id = $comment->post->id;
        $comment->delete();
        Session::flash('success', 'Deleted Comment');
        return redirect()->route('posts.show', $post_id);

    }
}
