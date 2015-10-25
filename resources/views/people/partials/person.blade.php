<!-- Begin Byte -->
<div class="inner-results">
    <h3><a href="{!! action('PeopleController@show', [$person->id]) !!}">{{$person->name}}</a></h3>
    <ul class="list-inline down-ul">
        <li><a href="{!! action('PeopleController@edit', [$person->id]) !!}"><i class="fa fa-pencil"></i> Edit</a></li>
        <li><a href="{!! action('PeopleController@destroy', [$person->id]) !!}"><i class="fa fa-trash-o"></i> Delete</a></li>
    </ul>
</div>
<hr>
<!-- End Byte -->
