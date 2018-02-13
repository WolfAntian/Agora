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
        return redirect('/b/' . $board->path);
    }

    public function edit(Board $board)
    {

        if (Auth::check() && Auth::user()->id == $board->user_id)
        {
            return view('boards/edit', compact('board'));
        }
        else {
            return redirect('/b/' . $board->path);
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
            return redirect('/b/' . $board->path);
        }
    }

    public function view(Board $board)
    {
        return view('boards/view',compact('board'));
    }

}
