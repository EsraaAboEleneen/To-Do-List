@if($todo->completed)
    <span class="fa fa-check text-green-400 px-3"
          onclick="event.preventDefault();
              document.getElementById('form-incomplete-{{$todo->id}}')
              .submit()"></span>
    <form id="{{'form-incomplete-'.$todo->id}}" style="display: none" method="post"
          action="{{route('todo.incomplete',$todo->id)}}">
        @csrf
        @method('delete')
    </form>
@else
    <span onclick="event.preventDefault();
        document.getElementById('form-complete-{{$todo->id}}').submit()"
          class="fa fa-check text-gray-300 px-3 cursor-pointer"></span>
    <form id="{{'form-complete-'.$todo->id}}" style="display: none" method="post"
          action="{{route('todo.complete',$todo->id)}}">
        @csrf
        @method('put')
    </form>
@endif
