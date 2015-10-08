<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Saa\Page\Repo\PageInterface;

class PageController extends Controller
{

    protected $page;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PageInterface $page)
    {
        $this->page = $page;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = $this->page->getAll()->where('editable',1);

        return view('backend.pages.index')->with(compact('pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$page  = $this->page->create($request->all());

        //return redirect('admin/page')->with(array('status' => 'success', 'message' => 'Page created' ));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $page  = $this->page->update($request->all());

        return redirect('admin/page')->with(array('status' => 'success', 'message' => 'Update ok!' ));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$this->page->delete($id);

        //return redirect('admin/page')->with(array('status' => 'success' , 'message' => 'Le page a été supprimé' ));
    }
}
