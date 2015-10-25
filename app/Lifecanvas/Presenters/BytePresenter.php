<?php

namespace App\Lifecanvas\Presenters;

use Laracasts\Presenter\Presenter;
use App\Place;

class BytePresenter extends Presenter {

    public function showDate($year, $month, $day){
        $mons = array(1 => "January", 2 => "February", 3 => "March",
            4 => "April", 5 => "May", 6 => "June", 7 => "July",
            8 => "August", 9 => "September", 10 => "October",
            11 => "November", 12 => "December");

        $string = "Undated";

        $date = '<i class="fa fa-calendar"></i> ';

        if($year){
            $string = $year;

            if($month){
                $string = $mons[$month] . ', ' . $string;

                if($day){
                    $string = $day . ' ' . $string;
                }
            }
        } elseif($month){
            $string = $mons[$month];
            if($day){
                $string = $day . ' ' . $string;
            }
        }

        $date = $date . $string;

        return $date;
    }

    public function showMap($placeId, $id, $mapTypeId = 'roadmap', $zoomOffset = 0){

        // get the place record for the id passed if possible
        $place = Place::findOrFail($placeId);

        // set a default zoom level
        $zoom = $place->zoom > 0 ? $place->zoom : 15;

        $zoom = $zoom - $zoomOffset;

        $place_name = htmlentities($place->name, ENT_QUOTES);

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
                title: '$place_name',
            });
        });";

        return $script;
    }

}