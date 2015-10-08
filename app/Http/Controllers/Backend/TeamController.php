<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Saa\Team\Repo\TeamInterface;
use App\Http\Requests\TeamRequest;

class TeamController extends Controller
{

    protected $team;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TeamInterface $team)
    {
        $this->team = $team;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = $this->team->getAll();

        return view('backend.teams.index')->with(compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamRequest $request)
    {
        $team  = $this->team->create($request->all());

        return redirect('admin/team')->with(array('status' => 'success', 'message' => 'Team member created' ));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeamRequest $request, $id)
    {

        $team  = $this->team->update($request->all());

        return redirect('admin/team')->with(array('status' => 'success', 'message' => 'Update ok!' ));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->team->delete($id);

        return redirect('admin/team')->with(array('status' => 'success' , 'message' => 'The team member has been deleted' ));
    }
}
