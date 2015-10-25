<div>
    <p>
    @forelse($byte->people as $person)
            <a href="{!! action('PeopleController@show', [$person->id]) !!}">{{ $person->name }}</a> |
    @empty
        No People
    @endforelse
    </p>
</div>