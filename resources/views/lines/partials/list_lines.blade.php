@forelse($lines as $line)
    @include('lines.partials.line')
@empty
    <h4>No Lifelines posted yet.</h4>
@endforelse
