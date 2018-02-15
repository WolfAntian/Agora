<?php

namespace agora\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use agora\Thread;
use agora\Board;
use agora\User;
use Log;

class ThreadsController extends Controller
{
    public function add(Board $board)
    {
        if(Auth::check()) {
            return view('threads/add', compact('board'));
        }
        return redirect('/b/' . $board->path);
    }

    public function create(Request $request, Board $board)
    {
        if(Auth::check()) {
            $validatedData = $request->validate([
                'title' => 'required|max:255',
                'post' => 'required',
            ]);


            $thread = new Thread();
            $thread->title = $request->title;
            $thread->post = $request->post;
            $thread->img = $request->img;
            if ($thread->img == null) {
                $thread->img = "https://i.imgur.com/ZlMqj25.png";
            }
            $thread->user_id = Auth::id();
            $thread->board_path = $board->path;
            $thread->save();
            return redirect('/b/' . $board->path . "/t/" . $thread->id);
        }
        return redirect('/b/' . $board->path);
    }

    public function edit(Board $board, Thread $thread)
    {
        if(Auth::check()) {
            $user = User::find(Auth::user()->id);
            if (Auth::user()->id == $thread->user_id || $user->hasRole('mod')) {
                return view('threads/edit', compact('thread'));
            }
        }
            return redirect('/b/' . $board->path . "/t/" . $thread->id);
    }

    public function update(Request $request, Board $board, Thread $thread)
    {
        if(Auth::check()) {
            $user = User::find(Auth::user()->id);
            if (Auth::user()->id == $thread->user_id || $user->hasRole('mod')) {
                if(isset($_POST['delete'])) {
                    $thread->delete();
                    return redirect('/b/' . $thread->board_path);
                }
                else
                {
                    $validatedData = $request->validate([
                        'title' => 'required|max:255',
                        'post' => 'required',
                    ]);
                    $thread->img = $request->img;
                    if ($thread->img == null) {
                        $thread->img = "https://i.imgur.com/ZlMqj25.png";
                    }
                    $thread->title = $request->title;
                    $thread->post = $request->post;
                    $thread->save();
                }
            }
        }
        return redirect('/b/' . $thread->board_path . "/t/" . $thread->id);

    }

    public function view(Board $board, Thread $thread)
    {
        if(Auth::check()) {
            $user = User::find(Auth::user()->id);
        }
        return view('threads/view',compact('board','thread', 'user'));
    }
}
