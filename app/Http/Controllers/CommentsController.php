<?php

namespace agora\Http\Controllers;

use agora\Comment;
use agora\Thread;
use agora\Board;
use Illuminate\Http\Request;
use Auth;

class CommentsController extends Controller
{


    public function create(Request $request, Board $board, Thread $thread)
    {
        $comment = new Comment();
        $comment->post = $request->post;
        $comment->user_id = Auth::id();
        $comment->thread_id = $thread->id;
        $comment->save();
        return redirect('/b/' . $board->path . "/t/" . $thread->id . '#' . $comment->id);
    }
}
