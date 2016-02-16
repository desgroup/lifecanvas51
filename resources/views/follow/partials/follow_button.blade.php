@if($byter->isFollowedBy($user))

    {!! Form::open(['route' => ['following', $byter->id], 'method' => 'DELETE']) !!}
    {!! Form::hidden('follow_id', $byter->id) !!}
        <button type="submit" class="btn-u btn-u-default">UnFollow</button>
    {!! Form::close() !!}

@else

    {!! Form::open(['url' => 'follow', 'method' => 'post']) !!}
    {!! Form::hidden('follow_id', $byter->id) !!}
    <button type="submit" class="btn-u">Follow</button>
    {!! Form::close() !!}

@endif