<?php namespace App\Http\Controllers;

use App\Byte;
use App\Http\Requests;
use App\Http\Controllers\Controller;
//use Illuminate\Http\Request; removed this for the use of Request Facade below
use App\Http\Requests\ByteRequest;
use App\Lifecanvas\FuzzyDate;
use Auth;
use Carbon\Carbon;

/**
 * Class BytesController
 * @package App\Http\Controllers
 */
class BytesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

        $title = 'Lifebyte List';
        $description = 'Lifecanvas, take a byte our of life';

        $bytes = Byte::latest('byte_date')->get();
        $count = $bytes->count();

        return view('bytes.index', compact('bytes','title','description','count'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

        $title = 'Add a Lifebyte';

		return view('bytes.create', compact('title'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ByteRequest $request)
	{

        $fuzzy_date = new FuzzyDate();

        $byte_date = $fuzzy_date->makeByteDate(
            $request->year,
            $request->month,
            $request->day,
            $request->hour,
            $request->minute,
            $request->seconds
        );

        //$user_id = Auth::user()->id;

        $input = array_add($request->all(), 'user_id', Auth::id());

        $input = array_add($input, 'byte_date', $byte_date["datetime"]);

        $input = array_add($input, 'accuracy', $byte_date["accuracy"]);

        //dd($input);

        Byte::create($input);

        return redirect('bytes');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $byte = Byte::findOrFail($id);

        $title = "$byte->name";

        return view('bytes.show', compact('byte','title'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$byte = Byte::findOrFail($id);

        //dd($byte);

        $title = "Edit: $byte->name";

        return view('bytes.edit', compact('byte','title'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, ByteRequest $request)
	{
        $byte = Byte::findOrFail($id);

        $byte->update($request->all());

        $title = "$byte->name";

        return view('bytes.show', compact('byte','title'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		return "delete " . $id;
	}

}
