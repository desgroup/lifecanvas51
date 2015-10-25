<!-- Begin Byte -->
<div class="inner-results">
    <h3><a href="{!! action('PlacesController@show', [$place->id]) !!}">{{$place->name}}</a></h3>
    <ul class="list-inline down-ul">
        <li><a href="{!! action('PlacesController@edit', [$place->id]) !!}"><i class="fa fa-pencil"></i> Edit</a></li>
        <li><a href="{!! action('PlacesController@destroy', [$place->id]) !!}"><i class="fa fa-trash-o"></i> Delete</a></li>
    </ul>
</div>
<hr>
<!-- End Byte -->
