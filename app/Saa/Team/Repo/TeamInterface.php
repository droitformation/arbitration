<?php namespace App\Saa\Team\Repo;

interface TeamInterface {

    public function getAll();
	public function find($data);
    public function findByType($type);
	public function create(array $data);
	public function update(array $data);
	public function delete($id);

}

