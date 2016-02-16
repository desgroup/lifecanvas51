<!-- Followed Item -->
<div class="col-md-3 col-sm-6 md-margin-bottom-50">
    <img class="img-responsive rounded-x" src="/usr/{{$byter->id}}/profile/{{$byter->photo}}" alt="">
    <span><a href="{!! action('FollowingController@show', [$byter->id]) !!}">{{$byter->name}}</a></span>
    @include('follow.partials.follow_button')
</div>
<!-- End Followed Item -->
