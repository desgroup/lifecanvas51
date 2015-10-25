<!-- Begin Byte -->
<div class="inner-results">
    @if($byte->image)
        <a href="{!! action('BytesController@show', [$byte->id]) !!}"><img src="/usr/{{ $byte->user_id }}/thumb/{{ $byte->image->filename }}" width="100px" class="img-responsive"></a>
    @endif
    <h3><a href="{!! action('BytesController@show', [$byte->id]) !!}">{{$byte->name}}</a></h3>
    @if($byte->place)
        <p><a href="{!! action('PlacesController@show', [$byte->place->id]) !!}">{{$byte->place->name}}</a></p>
    @endif
    <ul class="list-inline down-ul">
        @include('layouts.partials.ranking')
        @if(!is_null($byte->byte_date))
        <li>{{ $byte->byte_date->diffForHumans() }} - {{ $byte->byte_date->format('l F jS') }}</li>
        @endif
    </ul>
    <p>{{ $byte->story }}</p>
    @include('lines.partials.lines_list')
        @include('people.partials.peoples_list')
    <ul class="list-inline down-ul">
        <li><a href="{!! action('BytesController@edit', [$byte->id]) !!}"><i class="fa fa-pencil"></i> Edit</a></li>
        <li><a href="{!! action('BytesController@destroy', [$byte->id]) !!}"><i class="fa fa-trash-o"></i> Delete</a></li>
    </ul>
</div>
<hr>
<!-- End Byte -->