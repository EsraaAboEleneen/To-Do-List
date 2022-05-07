@extends('todos.layout')

@section('content')
    <div class="flex justify-between border-b px-4 pb-4 ">
        <h1 class="text-2xl pb-4">What next you need To-Do?</h1>
        <a href="{{route('todo.index')}}" class="text-gray-300 mx-5
         cursor-pointer bg-white">
            <span class="fa fa-arrow-left"></span>
        </a>
    </div>
    <x-alert/>
    <form method="post" class="py-5" action="{{route('todo.store')}}">
        @csrf
        <div class="py-1">
            <input type="text" placeholder="title" name="title" class="py-2 py-2 border rounded">

        </div>
        <div class="py-1">
            <textarea placeholder="description" class="p-2 px-2 border rounded" name="description"></textarea>
        </div>
        <div class="py-1">
            <h1 class="text-2xl">All TO-DO's</h1>
            <a href="{{route('todo.create')}}" class="text-blue-300 mx-5 cursor-pointer bg-white">
                <span class="fa fa-plus-circle"></span>
            </a>
        </div>
        <div class="py-1">
            <input type="submit" value="Create" class="py-2 border rounded">
        </div>
    </form>
@endsection
