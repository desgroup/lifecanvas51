@forelse($people as $person)
    @include('lines.partials.person')
@empty
    <h4>No Lifelines posted yet.</h4>
@endforelse
