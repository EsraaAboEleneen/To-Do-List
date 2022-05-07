@extends('todos.layout')

@section('content')
    <div class="flex justify-between border-b px-4 ml-4 pb-4 ">
        <h1 class="text-2xl">All TO-DO's</h1>
        <a href="{{route('todo.create')}}" class="text-blue-300 mx-5 cursor-pointer bg-white">
            <span class="fa fa-plus-circle"></span>
        </a>
    </div>
    <ul class="my-5">
        @forelse($todos as $todo)
            <li class="flex justify-between py-2 ml-2">
                @include('todos.completeButton')
                @if($todo->completed)
                    <p class="line-through">{{$todo->title}}</p>
                @else
                    <a class="cursor-pointer" href="{{route('todo.show',$todo->id)}}">{{$todo->title}}</a>
                @endif
                <div>
                    <a href="{{route('todo.edit',$todo->id)}}"
                       class="text-orange-400 cursor-pointer bg-white">
                        <span class="fa fa-edit px-2 mr-3"></span>
                    </a>

                    <span class="fa fa-trash text-red-400 px-2 mr-3 cursor-pointer"
                          onclick="event.preventDefault();
                          if(confirm('Are you really wanna delete this?')){
                              document.getElementById('form-delete-{{$todo->id}}').submit()
                              }"></span>
                    <form id="{{'form-delete-'.$todo->id}}" style="display: none" method="post"
                          action="{{route('todo.destroy',$todo->id)}}">
                        @csrf
                        @method('delete')
                    </form>


                </div>
            </li>
                @empty
                    <p>No tasks available, create one</p>
                @endforelse
    </ul>


@endsection
