<?php namespace App\Saa\Bloc\Repo;

use App\Saa\Bloc\Repo\BlocInterface;
use App\Saa\Bloc\Entities\Bloc as M;

class BlocEloquent implements BlocInterface{

    protected $bloc;

    public function __construct(M $bloc)
    {
        $this->bloc = $bloc;
    }

    public function getAll(){

        return $this->bloc->all();
    }

    public function find($id){

        return $this->bloc->find($id);
    }

    public function findBySlug($slug){

        $bloc = $this->bloc->where('slug','=',$slug)->get();

        if(!$bloc->isEmpty())
        {
            return $bloc->first();
        }

        return false;
    }

    public function create(array $data){

        $bloc = $this->bloc->create(array(
            'title'    => $data['title'],
            'intro'    => $data['intro'],
            'content'  => $data['content'],
            'slug'     => $data['slug'],
            'editable' => $data['editable']
        ));

        if( ! $bloc )
        {
            return false;
        }

        return $bloc;

    }

    public function update(array $data){

        $bloc = $this->bloc->findOrFail($data['id']);

        if( ! $bloc )
        {
            return false;
        }

        $bloc->fill($data);

        $bloc->save();

        return $bloc;
    }

    public function delete($id){

        $bloc = $this->bloc->find($id);

        return $bloc->delete($id);

    }

}
