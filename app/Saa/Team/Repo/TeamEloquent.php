<?php namespace App\Saa\Team\Repo;

use App\Saa\Team\Repo\TeamInterface;
use App\Saa\Team\Entities\Team as M;

class TeamEloquent implements TeamInterface{

    protected $team;

    public function __construct(M $team)
    {
        $this->team = $team;
    }

    public function getAll(){

        return $this->team->all();
    }

    public function find($id){

        return $this->team->find($id);
    }

    public function findByType($type){

        return $this->team->where('type','=',$type)->orderBy('rang', 'desc')->get();
    }

    public function create(array $data){

        $team = $this->team->create(array(
            'name'  => $data['name'],
            'link'  => $data['link'],
            'photo' => (isset($data['photo']) ? $data['photo'] : ''),
            'type'  => $data['type'],
            'rang'  => $data['rang']
        ));

        if( ! $team )
        {
            return false;
        }

        return $team;

    }

    public function update(array $data){

        $team = $this->team->findOrFail($data['id']);

        if( ! $team )
        {
            return false;
        }

        $team->fill($data);

        $team->save();

        return $team;
    }

    public function delete($id){

        $team = $this->team->find($id);

        return $team->delete($id);

    }

}
