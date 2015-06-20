<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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

        return view('pages.splash', compact('title', 'description'));

    }

    public function home() {

        $title = 'Home';
        $description = 'Lifecanvas, take a byte our of life';

        return view('pages.home', compact('title', 'description'));

    }

}
