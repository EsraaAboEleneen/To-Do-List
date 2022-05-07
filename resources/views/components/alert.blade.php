<div>
    <!-- The only way to do great work is to love what you do. - Steve Jobs -->
    {{$slot}}
    @if(session()->has('message'))
        <div class="py-4 px-2 bg-green-300 alert alert-success" role="alert">
            {{ session()->get('message') }}
        </div>
    @elseif(session()->has('error'))
        <div class="py-4 px-2 bg-red-300 alert alert-danger" role="alert">{{session()->get('error')}}</div>
    @endif

    @if ($errors->any())
        <div class="py-4 px-2 bg-red-300">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

