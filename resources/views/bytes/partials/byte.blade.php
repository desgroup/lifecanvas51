<!-- Begin Byte -->
<div class="inner-results">
    <i class="fa fa-trash-o icon-byte"></i>
    <h3><a href="{!! action('BytesController@show', [$byte->id]) !!}">{{$byte->name}}</a></h3>
    @if($byte->place)
        <p>{{$byte->place->name}}</p>
    @endif
    <ul class="list-inline down-ul">
        @include('layouts.partials.ranking')
        <li>{{ $byte->byte_date->diffForHumans() }} - {{ $byte->byte_date->format('l F jS T') }}</li>
    </ul>
    <p>{{ $byte->story }}</p>
    <ul class="list-inline down-ul">
        <li><a href="{!! action('BytesController@edit', [$byte->id]) !!}"><i class="fa fa-pencil"></i> Edit</a></li>
        <li><a href="{!! action('BytesController@destroy', [$byte->id]) !!}"><i class="fa fa-trash-o"></i> Delete</a></li>
    </ul>
</div>
<hr>
<!-- End Byte -->
