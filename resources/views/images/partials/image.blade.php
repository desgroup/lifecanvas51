<!-- Begin Image -->
<div class="inner-results">
    <h3><a href="{!! action('ImagesController@show', [$image->id]) !!}">{{$image->caption}}</a></h3>
    <ul class="list-inline down-ul">
        <li><a href="{!! action('ImagesController@edit', [$image->id]) !!}"><i class="fa fa-pencil"></i> Edit</a></li>
        <li><a href="{!! action('ImagesController@destroy', [$image->id]) !!}"><i class="fa fa-trash-o"></i> Delete</a></li>
    </ul>
</div>
<hr>
<!-- End Image -->
