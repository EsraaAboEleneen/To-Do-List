<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\Todo;
//use http\Env\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


//use Illuminate\Validation\Validator;

class TodoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $todos = auth()->user()->todos()->orderBy('completed')->get();
//        $todos = Todo::orderBy('completed')->get();
        return view('todos.index',compact('todos'));
    }
    public function create(){
        return view('todos.create');
    }
    public function edit($id){

        $todo = Todo::find($id);
        return view('todos.edit',compact('todo'));
    }
    public function update(TodoCreateRequest $request, Todo $todo){
        //update todo
      $todo->update(['title'=>$request->title]);
      return redirect()->back()->with('message','updated!');
    }
    public function store(TodoCreateRequest $request){

//        $rules=[
//           'title'=>'required|max:255'
//        ];
//        $messages=[
//            'required'=>'The Title Feild should not be empty',
//            'title.max'=>'Should not be greater than 255 chars'
//        ];
//        $validator = Validator::make($request->all(),$rules,$messages);
//        if ($validator->fails()){
//            return redirect()->back()
//                ->withErrors($validator)
//                ->withInput();
//        }
//       $request->validate([
//          'title'=> 'required|max:255',
//       ]);
       $user_id = auth()->id();
       $request['user_id']  = $user_id;
       Todo::create($request->all());
//        auth()->user()->todos()->create($request->all());
         return redirect(route('todo.index'))->with('message','ToDo added');
    }
    public function complete(Todo $todo)
    {
        $todo->update(['completed'=>true]);
       return redirect()->back()->with('message','Todo marked as completed');

    }
    public function incomplete(Todo $todo)
    {
        $todo->update(['completed'=>false]);
        return redirect()->back()->with('message','Todo marked as incompleted');

    }
    public function show(Todo $todo){
        return view('todos.show',compact('todo'));
    }
    public function destroy(Todo $todo){
        $todo->delete();
        return redirect()->back()->with('message','Todo Deleted');
    }
}
