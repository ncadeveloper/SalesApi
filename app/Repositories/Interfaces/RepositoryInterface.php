<?php

namespace App\Repositories\Interfaces;

interface RepositoryInterface
{
    public function all();
    public function find($id);
    public function create(array $data);
    public function update($id, $data);
    public function delete($id);
}
