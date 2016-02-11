<!-- Begin Byte -->
<div class="inner-results">
    <h3><a href="{!! action('PeopleController@show', [$person->id]) !!}">{{$person->name}}</a></h3>
    <ul class="list-inline down-ul">
        <li><a href="{!! action('PeopleController@edit', [$person->id]) !!}"><i class="fa fa-pencil"></i> Edit</a></li>
    @if(isset($person->account_id))
        <li><a href="{!! action('FollowingController@follow', [$person->account_id]) !!}"><i class="glyphicon glyphicon-link"></i> Follow</a></li>
    @endif
        <li><a href="{!! action('PeopleController@destroy', [$person->id]) !!}"><i class="fa fa-trash-o"></i> Delete</a></li>
    </ul>
</div>
<hr>
<!-- End Byte -->
