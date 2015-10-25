<div>
    <p>
    @forelse($byte->lines as $line)
            <a href="{!! action('LinesController@show', [$line->id]) !!}">{{ $line->name }}</a> |
    @empty
        No Lifelines
    @endforelse
    </p>
</div>