{!! Form::model($place, ['method' => 'PATCH', 'url' => "places/$place->id"]) !!}

<div class='form-group'>
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class='form-group'>
    {!! Form::label('address', 'Address:') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>
<div class="row form-group">
    <div class="col-md-4">
        {!! Form::label('city', 'City:') !!}
        {!! Form::text('city', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-md-4">
        {!! Form::label('province', 'Province:') !!}
        {!! Form::text('province', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-md-4">
        {!! Form::label('country_code', 'Country:') !!}
        {!! Form::text('country_code', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="row form-group">
    <div class="col-md-6">
        {!! Form::label('url_place', 'Place URL:') !!}
        {!! Form::text('url_place', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-md-6">
        {!! Form::label('url_wikipedia', 'Wikipedia URL:') !!}
        {!! Form::text('url_wikipedia', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="row form-group">
    <div class="col-md-4">
        {!! Form::label('lat', 'Latitude:') !!}
        {!! Form::text('lat', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-md-4">
        {!! Form::label('lng', 'Longitude:') !!}
        {!! Form::text('lng', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-md-4">
        {!! Form::label('zoom', 'Map Zoom Level:') !!}
        {!! Form::text('zoom', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="row form-group">
    <div class="col-md-4">
        {!! Form::label('image_id', 'Image ID:') !!}
        {!! Form::text('image_id', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-md-4">
        {!! Form::label('zone_id', 'Timezone:') !!}
        {!! Form::text('zone_id', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class='form-group'>
    {!! Form::submit('Save Place', ['class' => 'btn-u']) !!}
    {!! link_to(URL::previous(), 'Cancel', ['class' => 'btn-u btn-u-default']) !!}

</div>

{!! Form::close() !!}