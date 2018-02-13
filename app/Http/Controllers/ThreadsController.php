<?php

namespace agora\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use agora\Thread;
use agora\Board;
use Log;

class ThreadsController extends Controller
{
    public function add(Board $board)
    {
        return view('threads/add', compact('board'));
    }

    public function create(Request $request, Board $board)
    {
        $thread = new Thread();
        $thread->title = $request->title;
        $thread->post = $request->post;
        $thread->user_id = Auth::id();
        $thread->board_path = $board->path;
        $thread->save();
        return redirect('/b/' . $board->path . "/t/" . $thread->id);
    }

    public function edit(Board $board, Thread $thread)
    {

        if (Auth::check() && Auth::user()->id == $thread->user_id)
        {
            return view('threads/edit', compact('thread'));
        }
        else {
            return redirect('/b/' . $board->path . "/t/" . $thread->id);
        }
    }

    public function update(Request $request, Board $board, Thread $thread)
    {
        if(isset($_POST['delete'])) {
            $thread->delete();
            return redirect('/b/' . $thread->board_path);
        }
        else
        {
            $thread->title = $request->title;
            $thread->post = $request->post;
            $thread->save();
            return redirect('/b/' . $thread->board_path . "/t/" . $thread->id);
        }
    }

    public function view(Board $board, Thread $thread)
    {
        return view('threads/view',compact('board','thread'));
    }
}
