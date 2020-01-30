<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendEmail;
use App\ToDo;

class ToDoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();

        $todo = new ToDo;
        $rows = $todo->all()->where('user_id', $user->id);
        $user = auth()->user();
        return view('home')->with(['todo' => $rows]);
    }


    public function create()
    {
        $user = auth()->user();
        return view('create')->with('user', $user);
    }


    public function store(Request $request)
    {
        $user = auth()->user();
            // dd($user->id);

        $this->validate($request, [
            'title'     => 'required',
            'message'   => 'required',
        ]);

        $todo = new ToDo;
        $todo->title    = $request->input('title');
        $todo->user_id  = $user->id;
        $todo->email    = $request->input('email');
        $todo->message  = $request->input('message');
        
        if($todo->save()){
            $this->dispatch(new SendEmail($user->email));
            if($request->input('email')){
                $this->dispatch(new SendEmail($request->input('email')));
            }

        }



        return redirect('/home');
    }


    public function update(Request $request, $id)
    {
        $user = auth()->user();

        $this->validate($request, [
            'title'     => 'required',
            'email'     => 'email',
            'message'   => 'required',
        ]);

        $obj = new ToDo;

        $todo = $obj->find($id);

        $todo->user_id  = $user->id;
        $todo->title    = $request->input('title');
        $todo->user_id  = $user->id;
        $todo->email    = $request->input('email');
        $todo->message  = $request->input('message');
        if($todo->save()){
            $this->dispatch(new SendEmail($user->email));
            if($request->input('email')){
                $this->dispatch(new SendEmail($request->input('email')));
            }

        }



        return redirect('/home');
    }


    public function show($id)
    {
        $todo = new ToDo;
        $row = $todo->find($id);
        $user = auth()->user();
        return view('create')->with(['todo' => $row, 'user' => $user]);
    }


    public function delete($id)
    {
        $todo = new ToDo;
        $row = $todo->find($id);
        $row->delete();
        
        return redirect('/home');
    }
}
