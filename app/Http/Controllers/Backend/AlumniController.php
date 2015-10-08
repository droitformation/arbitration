<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Saa\Alumni\Repo\AlumniInterface;
use App\Http\Requests\AlumniRequest;

class AlumniController extends Controller
{

    protected $alumni;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AlumniInterface $alumni)
    {
        $this->alumni = $alumni;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnis = $this->alumni->getAll();

        return view('backend.alumnis.index')->with(compact('alumnis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlumniRequest $request)
    {
        $alumni  = $this->alumni->create($request->all());

        return redirect('admin/alumni')->with(array('status' => 'success', 'message' => 'Alumni created' ));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AlumniRequest $request, $id)
    {

        $alumni  = $this->alumni->update($request->all());

        return redirect('admin/alumni')->with(array('status' => 'success', 'message' => 'Update ok!' ));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->alumni->delete($id);

        return redirect('admin/alumni')->with(array('status' => 'success' , 'message' => 'The alumni has been deleted' ));
    }
}
