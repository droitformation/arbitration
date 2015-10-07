<?php namespace App\Saa\Page\Repo;

interface PageInterface {

    public function getAll();
	public function find($data);
    public function findBySlug($slug);
	public function create(array $data);
	public function update(array $data);
	public function delete($id);

}

