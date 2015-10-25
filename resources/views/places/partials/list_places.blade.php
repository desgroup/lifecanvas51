@forelse($places as $place)
    @include('places.partials.place')
@empty
    <h4>No Places posted yet.</h4>
@endforelse
