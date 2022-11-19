<?php namespace App\Http\Repositories;


interface CrudRepository {

    public function index();
    public function find($id);
    public function store();
    public function update($id);
    public function delete($id);
    
}