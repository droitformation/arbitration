<?php namespace App\Saa\Alumni\Repo;

use App\Saa\Alumni\Repo\AlumniInterface;
use App\Saa\Alumni\Entities\Alumni as M;

class AlumniEloquent implements AlumniInterface{

    protected $alumni;

    public function __construct(M $alumni)
    {
        $this->alumni = $alumni;
    }

    public function getAll(){

        return $this->alumni->all();
    }

    public function find($id){

        return $this->alumni->find($id);
    }

    public function findBySlug($slug){

        $alumni = $this->alumni->where('slug','=',$slug)->get();

        if(!$alumni->isEmpty())
        {
            return $alumni->first();
        }

        return false;
    }

    public function create(array $data){

        $alumni = $this->alumni->create(array(
            'title'    => $data['title'],
            'intro'    => $data['intro'],
            'content'  => $data['content'],
            'slug'     => $data['slug'],
            'editable' => $data['editable']
        ));

        if( ! $alumni )
        {
            return false;
        }

        return $alumni;

    }

    public function update(array $data){

        $alumni = $this->alumni->findOrFail($data['id']);

        if( ! $alumni )
        {
            return false;
        }

        $alumni->fill($data);

        $alumni->save();

        return $alumni;
    }

    public function delete($id){

        $alumni = $this->alumni->find($id);

        return $alumni->delete($id);

    }

}
