<?php namespace App\Saa\Module\Repo;

interface ModuleInterface {

    public function getAll();
	public function find($data);
	public function create(array $data);
	public function update(array $data);
	public function delete($id);

}

