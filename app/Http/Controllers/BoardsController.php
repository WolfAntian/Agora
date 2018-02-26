<?php

namespace agora\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Auth\Events\Authenticated;
use Illuminate\Http\Request;
use Auth;
use agora\Board;
use agora\User;

class BoardsController extends Controller
{
    public function add()
    {
        if(Auth::check()){
            $user = User::find(Auth::user()->id);
            if($user->hasRole('admin'))
                return view('boards/add');
        }

        return redirect('/');
    }

    public function create(Request $request)
    {
        if(Auth::check()){
            $user = User::find(Auth::user()->id);
            if($user->hasRole('admin')){

                $validatedData = $request->validate([
                    'name' => 'required|max:40',
                    'path' => 'required|max:10',
                    'description' => 'required'
                ]);

                $board = new Board();
                $board->name = $request->name;
                $board->path = $request->path;
                $board->description = $request->description;
                $board->user_id = Auth::id();
                $board->save();
                return redirect('/b/' . $board->path);
            }
        }
        return redirect('/');
    }

    public function edit(Board $board)
    {
        if(Auth::check()) {
            $user = User::find(Auth::user()->id);
            if ($user->hasRole('mod')) {
                return view('boards/edit', compact('board'));
            }
        }
        return redirect('/b/' . $board->path);
    }

    public function update(Request $request, Board $board)
    {
        if(Auth::check()) {
            $user = User::find(Auth::user()->id);
            if ($user->hasRole('mod')) {
                if(isset($_POST['delete']) && $user->hasRole('admin')) {
                    $board->delete();
                    return redirect('/');
                }
                else
                {
                    $validatedData = $request->validate([
                        'name' => 'required|max:40',
                        'path' => 'required|max:10',
                        'description' => 'required'
                    ]);

                    $board->name = $request->name;
                    $board->path = $request->path;
                    $board->description = $request->description;
                    $board->save();

                }
            }
        }
        return redirect('/b/' . $board->path);
    }

    public function view(Board $board)
    {
        if(Auth::check()) {
            $user = User::find(Auth::user()->id);
        }

        $currentTime = Carbon::now();

        return view('boards/view',compact('board', 'user', 'currentTime'));
    }

}
