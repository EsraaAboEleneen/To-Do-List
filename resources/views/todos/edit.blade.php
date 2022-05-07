@extends('todos.layout')

@section('content')
    <div class="flex justify-between border-b px-4 pb-4 ">
        <h1 class="text-2xl">Update this todo list</h1>
        <a href="{{route('todo.index')}}" class="text-gray-300 mx-5
         cursor-pointer bg-white">
            <span class="fa fa-arrow-left"></span>
        </a>
    </div>
    <x-alert/>
    <form method="post" class="py-5" action="{{route('todo.update',$todo->id)}}">
        @csrf
        @method('patch')
        <div class="py-1">
            <input type="text" placeholder="title" value="{{$todo->title}}" name="title"
                   class="py-2 py-2 border rounded">

        </div>
        <div class="py-1">
            <textarea placeholder="description" class="p-2 px-2 border rounded" name="description">{{$todo->description}}</textarea>
        </div>
        <div>
            <input type="submit" value="Update" class="py-2 border rounded">
        </div>

    </form>

@endsection
