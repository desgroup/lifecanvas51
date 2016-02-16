<div class="media media-v2"><!--Followed Byte -->
    <a class="pull-left" href="#">
        @if($byte->image)
            <a href="{!! action('BytesController@show', [$byte->id]) !!}">
                <img src="/usr/{{ $byte->user_id }}/thumb/{{ $byte->image->filename }}" width="100px" class="media-object rounded-x pull-left">
            </a>
        @endif
    </a>

    <div class="media-body">
        <h4 class="media-heading">
            <strong><a href="#">{{ $byte->name }}</a></strong> {{ '@' . $byte->user->username }}
            <small>{{ $byte->byte_date }}</small>
        </h4>
        @if($byte->story)<p>
            @if(strlen($byte->story) > 200)
                {{ substr( $byte->story , 0 , 200 ) . " ..." }}
            @else
                {{ $byte->story }}
            @endif</p>
        @endif
        <ul class="list-inline results-list pull-left">
            <li><a href="#">25 Likes</a></li>
            <li><a href="#">10 Links</a></li>
        </ul>
        <ul class="list-inline pull-right">
            <li><a href="#"><i class="expand-list rounded-x fa fa-plus"></i></a></li>
            <li><a href="#"><i class="expand-list rounded-x fa fa-heart"></i></a></li>
        </ul>
    </div>
</div><!--End Followed Byte -->
