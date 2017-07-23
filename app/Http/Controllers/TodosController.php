<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App\Todo;

class TodosController extends Controller
{
    //
    public function index(){

    	$data = todo::all();

    	return view('todo')->with('todolist', $data );
    }


    public function store(Request $request){

    	$todo_tb = new Todo;

    	$todo_tb->todo = $request->todo_form;

    	$todo_tb->save();


    	Session::flash('success', 'It was created !');

    	return redirect()->back();


    }

    public function delete($id){
 
    	//dd($id);

    	$todo_id = Todo::find($id);

    	$todo_id->delete();

    	Session::flash('success', 'It was deleted !');

    	return redirect()->back();
    }


    public function update($id){

    	$todo_id = Todo::find($id);

    	return view('update')->with('todolist_update', $todo_id);

    }


    public function save(Request $request, $id){

    	//dd($request->all());

    	$todo_id = Todo::find($id);

    	$todo_id->todo = $request->todo_form;

    	$todo_id->save();

    	Session::flash('success', 'It was updated !');

    	return redirect()->route('todo'); 

    }

    public function completed($id){

    	$todo_id = Todo::find($id);

    	$todo_id->completed = 1;

    	$todo_id->save();

    	Session::flash('success', 'It was completed !');

    	return redirect()->back(); 

    }



}
