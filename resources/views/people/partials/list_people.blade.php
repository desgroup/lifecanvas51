@forelse($people as $person)
    @include('people.partials.person')
@empty
    <h4>No People posted yet.</h4>
@endforelse
