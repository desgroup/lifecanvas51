<?php

namespace App\Lifecanvas\Presenters;

use Laracasts\Presenter\Presenter;
use App\Place;

class PlacePresenter {

    public function showMap($placeId, $id, $mapTypeId = 'roadmap', $zoomOffset = 0){

        // get the place record for the id passed if possible
        $place = Place::findOrFail($placeId);

        // set a default zoom level
        $zoom = $place->zoom > 0 ? $place->zoom : 15;

        $zoom = $zoom - $zoomOffset;

        // build the javascript for the map
        $script = "
            $(document).ready(function(){
                var map = new GMaps({
                div: '#$id',
                lat: $place->lat,
                lng: $place->lng,
                zoom: $zoom,
                disableDefaultUI: true,
                mapTypeId: '$mapTypeId'
            });

            map.addMarker({
                lat: $place->lat,
                lng: $place->lng,
                title: '$place->name',
            });
        });";

        return $script;
    }

}