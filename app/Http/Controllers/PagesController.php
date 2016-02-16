<?php namespace App\Http\Controllers;

use App\Follow;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Lifecanvas\Utilities;
use Auth;
use App\User;
use App\Byte;

use Illuminate\Http\Request;

/**
 * Class PagesController
 * @package App\Http\Controllers
 * @author Kyle Whatley
 */
class PagesController extends Controller {

	public function splash() {

        $title = 'Welcome to Lifecanvas';
        $description = 'Lifecanvas, take a byte our of life';
        $hidenav = false;

        return view('pages.splash', compact('title', 'description','hidenav'));

    }

    public function home() {

        $title = 'Home';
        $description = 'Lifecanvas, take a byte our of life';

        $user = User::FindOrFail(Auth::id());

        $followedUsers = $user->follow()->lists('followed_id')->all();
        $byteFeed = \App\Byte::whereIn('user_id', $followedUsers)->where('privacy', '>', '0')->latest('created_at')->get();

        $myBytes = \Auth::user()->bytes()->latest('created_at')->limit(20)->get();

        $month = date('Y') . '-' . date('m') . '-01 00:00:00';
        $year = date('Y') . '-01-01 00:00:00';

        $counts['byteTotal'] = number_format(Byte::where('user_id', '=', Auth::id())->count());
        $counts['byteYear'] = number_format(Byte::where('user_id', '=', Auth::id())
                            ->where('byte_date', '>=', $year)->count());
        $counts['byteMonth'] = number_format(Byte::where('user_id', '=', Auth::id())
                            ->where('byte_date', '>=', $month)->count());
        $counts['followers'] = number_format(Follow::where('followed_id', '=', Auth::id())->count());
        $counts['following'] = number_format(Follow::where('follower_id', '=', Auth::id())->count());

        //$byteFeed = \Auth::user()->getFollowedByteFeed($user)->latest('byte_date')->past()->with('place', 'image')->get();

        return view('pages.home', compact('title', 'description', 'user', 'counts', 'byteFeed', 'myBytes'));

    }

    public function profile() {

        $title = 'Profile';
        $description = 'Lifecanvas, take a byte our of life';

        return view('pages.profile', compact('title', 'description'));

    }

    public function info() {

        return view('pages.info');

    }

    public function fileupdate() {

        $images = \App\Image::all();
        //dd(Auth::user()->id . "-");

        foreach($images as $image) {

            $id = $image['id'];

            $record = \App\Image::findOrFail($id);

            //dd($record);

            $old_filename = $record->filename;
            $info = new \SplFileInfo($old_filename);
            $extension = strtolower ($info->getExtension());
            //dd($extension);
            //dd(Auth::user()->id . "-");

            if($extension == "jpg" || $extension == "png") {

                if(!$record->flag == 1) {

                    //dd(Auth::user()->id);
                    $filename = uniqid(Auth::user()->id . "-", true);
                    $filename = str_replace(".","-",$filename) . "." . $extension;
                    $filePath = public_path() . '/usr/' . Auth::user()->id;
                    //dd($filePath);
                    $utilities = new Utilities();
                    $utilities->makePath($filePath . '/org/');
                    $utilities->makePath($filePath . '/medium/');
                    $utilities->makePath($filePath . '/small/');
                    $utilities->makePath($filePath . '/thumb/');
                    $utilities->makePath($filePath . '/org/');
                    $old_filepath = public_path() . '/usr/' . $old_filename;
                    //dd($old_filepath);
                    //$file->move($filePath . '/org/', $filename);

                    $img = \Image::make($old_filepath)->save($filePath . '/org/' . $filename, 100);
                    $img_medium = \Image::make($old_filepath);
                    $img_small = \Image::make($old_filepath);
                    $img_thumbnail = \Image::make($old_filepath);
                    $img_medium->resize(1500, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })->save($filePath . '/medium/' . $filename, 90);
                    $img_small->resize(240, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })->save($filePath . '/small/' . $filename, 90);
                    $img_thumbnail->resize(125, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })->save($filePath . '/thumb/' . $filename, 70);

                    $exif = $img->exif();

                    //dd($exif);

                    $lat = NULL;
                    $lng = NULL;

                    if(!is_null($exif)) {
                        if(array_key_exists('GPSLongitude', $exif)) {
                            $lat = $this->getGps($exif['GPSLatitude'], $exif['GPSLatitudeRef']);
                            $lng = $this->getGps($exif['GPSLongitude'], $exif['GPSLongitudeRef']);
                        }
                    }

                    $image_data = array(
                        'filename'      => $filename,
                        'extension'     => $extension,
                        'file_type'     => 0,
                        'rights'        => 0,
                        'size_kb'       => $exif['FileSize']/1000,
                        'height_px'     => $exif['COMPUTED']['Height'],
                        'width_px'      => $exif['COMPUTED']['Width'],
                        'image_date'    => isset($exif['DateTime']) ? $exif['DateTime'] : null,
                        'image_lat'     => $lat,
                        'image_lng'     => $lng,
                        'user_id'       => Auth::id(),
                        'flag'          => 1
                    );

                    //dd($image_data);

                    $record->update($image_data);

                }

            }
            //dd($update);

        }

        return "done";

    }

}
