@extends('todos.layout')

@section('content')
    <div class="flex justify-between border-b px-4 pb-4 ">
        <h1 class="text-2xl pb-4">{{$todo->title}}</h1>
        <a href="{{route('todo.index')}}" class="text-gray-300 mx-5
         cursor-pointer bg-white">
            <span class="fa fa-arrow-left"></span>
        </a>
    </div>
    <div>
        <div>
            <p>{{$todo->description}}</p>
        </div>
    </div>

@endsection
