<li class="list-group-item
    @if($line_selected->id == $line->id)
        active
    @endif">
    <a href="/lines/{{ $line->id }}"><i class="fa fa-sliders"></i> {{ $line->name }}</a>
</li>
