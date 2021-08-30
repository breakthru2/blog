<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(Request $request)
    {
        if ($request->has('q')) {
            $q = $request->q;
            $posts=Post::where('title','like', '%'.$q.'%')->orderBy('id','desc')->paginate(1);
        } else {
            $posts = Post::orderBy('id', 'desc')->paginate(2);
        }
        return view('home', ['posts' => $posts]);
    }

    //Post Detail Page
    function detail(Request $request, $slug, $postId){
        //Update post count
        Post::find($postId)->increment('views');
        $detail=Post::find($postId);
        return view('detail',['detail'=>$detail]);
    }

    //Save comment
    function save_comment(Request $request, $slug, $id){
        $request->validate([
            'comment'=>'required'
        ]);
        $data=new Comment;
        $data->user_id=$request->user()->id;
        $data->post_id=$id;
        $data->comment=$request->comment;
        $data->save();
        return redirect('detail/'.$slug.'/'.$id)->with('success', 'Comment has been submitted');
    }
}
