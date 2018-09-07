@if ( session()->has('messages') )
    <div>
        <ul>
            @foreach (session()->pull('messages') as $message)
                <li class="alert alert-{{ $message["type"] }}">
                    {{ $message["text"] }}
                </li>
            @endforeach
        </ul>
    </div>
@endif