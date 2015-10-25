@foreach($lines as $line)
    <li><a href="/lines/{{ $line->id }}">{{ $line->name }}</a></li>
@endforeach
