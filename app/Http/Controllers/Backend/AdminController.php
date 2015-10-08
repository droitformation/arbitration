<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller {

    public function __construct()
    {
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return view('backend.index')->with(['title' => 'Files', 'root' => 'files']);
	}

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function acc()
    {
        return view('backend.index')->with(['title' => 'ACC', 'root' => 'acc']);
    }


}
