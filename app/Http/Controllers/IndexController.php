<?php

namespace App\Http\Controllers;

use App\House;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class IndexController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('index');
	}

	/**
	 * Search
	 *
	 * @param Request $request
	 * @return \Illuminate\Http\JsonResponse|null
	 */
	public function getSearch(Request $request)
	{

		if ($request->ajax()) {

			$query = DB::table('houses');

			if ($request->get('priceFrom') && $request->get('priceTo')) {
				$query->whereBetween('price', [$request->get('priceFrom'), $request->get('priceTo')]);
			}

			if ($request->get('name')) {
				$query->where('name', 'like', '%' . $request->get('name') . '%');
			}

			if ($request->get('bedrooms')) {
				$query->where('bedrooms', $request->get('bedrooms'));
			}

			if ($request->get('bathrooms')) {
				$query->where('bathrooms', $request->get('bathrooms'));
			}

			if ($request->get('storeys')) {
				$query->where('storeys', $request->get('storeys'));
			}

			if ($request->get('garages')) {
				$query->where('garages', $request->get('garages'));
			}

			$houses = $query->get();

			if ($houses->isNotEmpty()) {
				return Response()->json(['results' => $houses]);
			} else {
				return Response()->json(['message' => 'No results']);

			}
		}

		return redirect()->route('/');
	}

}
