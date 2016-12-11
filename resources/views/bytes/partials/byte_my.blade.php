<div class="profile-event" style="overflow:auto;">
    <a href="{!! action('BytesController@show', [$byte->id]) !!}"><div class="date-formats">
        <span>{{ $byte->byte_date->day }}</span>
        <small>{{ $byte->byte_date->month }}, {{ $byte->byte_date->year }}</small>
    </div></a>
    <div class="overflow-h">
        <h3 class="heading-xs"><a href="{!! action('BytesController@show', [$byte->id]) !!}">
                @if(strlen($byte->name) > 25)
                    {{ substr( $byte->name , 0 , 25 ) . " ..." }}
                @else
                    {{ $byte->name }}
                @endif
            </a></h3>

        <p>
            @if(strlen($byte->story) > 70)
                {{ substr( $byte->story , 0 , 70 ) . " ..." }}
            @else
                {{ $byte->story }}
            @endif
        </p>
    </div>
</div>
