<?php namespace App\Saa\Page\Repo;

use App\Saa\Page\Repo\PageInterface;
use App\Saa\Page\Entities\Page as M;

class PageEloquent implements PageInterface{

    protected $page;

    public function __construct(M $page)
    {
        $this->page = $page;
    }

    public function getAll(){

        return $this->page->all();
    }

    public function getTree($key = null, $seperator = '  '){

        return $this->page->getNestedList('title', $key, $seperator);
    }

    public function getMenu()
    {
        return $this->page->whereNull('parent_id')->where('rang','>',0)->orderBy('rang','asc')->get();
    }

    public function find($id){

        return $this->page->find($id);
    }

    public function findBySlug($slug){

        $page = $this->page->with(['blocs'])->where('slug','=',$slug)->get();

        if(!$page->isEmpty())
        {
            return $page->first();
        }

        return false;
    }

    public function create(array $data){

        $page = $this->page->create(array(
            'title'    => $data['title'],
            'intro'    => $data['intro'],
            'content'  => $data['content'],
            'slug'     => $data['slug'],
            'editable' => $data['editable']
        ));

        if( ! $page )
        {
            return false;
        }

        return $page;

    }

    public function update(array $data){

        $page = $this->page->findOrFail($data['id']);

        if( ! $page )
        {
            return false;
        }

        $page->fill($data);

        $page->save();

        return $page;
    }

    public function delete($id){

        $page = $this->page->find($id);

        return $page->delete($id);

    }

}
