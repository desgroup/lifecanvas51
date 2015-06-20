@forelse($bytes as $byte)
    @include('bytes/partials/byte')
@empty
    <h4>No Lifebytes posted yet.</h4>
@endforelse
