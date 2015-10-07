<?php namespace App\Saa\Alumni\Repo;

interface AlumniInterface {

    public function getAll();
	public function find($data);
    public function findBySlug($slug);
	public function create(array $data);
	public function update(array $data);
	public function delete($id);

}

