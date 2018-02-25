<?php

namespace agora\Http\Controllers;

use agora\Comment;
use agora\Thread;
use agora\Board;
use agora\CommentStar;
use agora\User;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Http\Request;
use Auth;

class CommentsController extends Controller
{


    public function create(Request $request, Board $board, Thread $thread)
    {
        if(Auth::check()){
            $validatedData = $request->validate([
                'post' => 'required'
            ]);

            $comment = new Comment();
            $comment->post = $request->post;
            $comment->user_id = Auth::id();
            $comment->thread_id = $thread->id;
            $comment->save();
            return redirect('/b/' . $board->path . "/t/" . $thread->id . '#' . $comment->id);
        }
        return redirect('/b/' . $board->path . "/t/" . $thread->id);
    }

    public function star(Board $board, Thread $thread, Comment $comment){
        if(Auth::check()) {
            $user = User::find(Auth::user()->id);

            $star = CommentStar::whereRaw('user_id = ' . $user->id . ' and comment_id = ' . $comment->id)->get()->first();
            if($star == null){
                $star = new CommentStar();
                $star->user_id = $user->id;
                $star->comment_id = $comment->id;
                $star->save();
                return response()->json(['message' => 'Success'],204);
            }else{
                $star->delete();
                return response()->json(['message' => 'Deleted'],204);
            }
        }
        return response()->json(['message' => 'Unauthorized'],401);
    }
}
