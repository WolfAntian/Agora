<?php

namespace agora\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use agora\Board;

class BoardsController extends Controller
{
    public function add()
    {
        return view('boards/add');
    }

    public function create(Request $request)
    {
        $board = new Board();
        $board->name = $request->name;
        $board->path = $request->path;
        $board->description = $request->description;
        $board->user_id = Auth::id();
        $board->save();
        return redirect("/");
    }

    public function edit(Board $board)
    {

        if (Auth::check() && Auth::user()->id == $board->user_id)
        {
            return view('boards/edit', compact('board'));
        }
        else {
            return redirect('/');
        }
    }

    public function update(Request $request, Board $board)
    {
        if(isset($_POST['delete'])) {
            $board->delete();
            return redirect('/');
        }
        else
        {
            $board->name = $request->name;
            $board->path = $request->path;
            $board->description = $request->description;
            $board->save();
            return redirect('/');
        }
    }

    public function view()
    {
        return view('boards/view');
    }

}
