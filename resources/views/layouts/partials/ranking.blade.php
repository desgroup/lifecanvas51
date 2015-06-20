@if (isset($byte->rating))
    <li>
    <ul class="list-inline star-vote">
        @for ($i = 0; $i < 5; $i++)
            @if($i < $byte->rating)
                <li><i class="color-green fa fa-star"></i></li>
            @else
                <li><i class="color-green fa fa-star-o"></i></li>
            @endif
        @endfor
    </ul>
    </li>
@else
    {{ $byte->rating }}
@endif