<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Todo;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

    	$todos = Todo::where('user_id',Auth::id())->orderBy('created_at', 'asc')->get();

        return view('home',compact('todos'));
    }

    public function addTodo()
    {
    	$action_url = '/todo';
    	return view('todo',compact('action_url'));
    }

    public function editTodo($id)
    {
    	$todo = Todo::findOrFail($id)->first();
    	$action_url = "/todo/$id";

    	return view('todo',compact('todo','action_url'));
    }

    public function todo(Request $request)
    {

	    $validator = Validator::make($request->all(), [
	        'name' => 'required|max:255',
	    ]);

	    if ($validator->fails()) {
	        return redirect('/addTodo')
	            ->withInput()
	            ->withErrors($validator);
	    }

	    $todo = new Todo;
	    $todo->name = $request->name;
	    $todo->user_id = Auth::id();
	    $todo->save();

	    return redirect('/');

    }

    public function edit(Request $request,$id)
    {
    	$validator = Validator::make($request->all(), [
	        'name' => 'required|max:255',
	    ]);

	    if ($validator->fails()) {
	        return redirect('/addTodo')
	            ->withInput()
	            ->withErrors($validator);
	    }

	    $todo = Todo::findOrFail($id);
	    $todo->name = $request->name;
	    $todo->user_id = Auth::id();
	    $todo->save();

	    return redirect('/');
    }

    public function delete($id)
    {
    	Todo::findOrFail($id)->delete();
	    return redirect('/');
    }

}
