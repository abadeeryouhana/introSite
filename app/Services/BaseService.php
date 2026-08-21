<?php

namespace App\Services;

abstract class BaseService
{
    protected $repository;

    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    public function getAll($relations = [])
    {
        return $this->repository->all($relations);
    }

    public function count()
    {
        return $this->repository->count();
    }

    public function getOrdered($column = 'order', $direction = 'asc', $take = null, $relations = [])
    {
        return $this->repository->getOrdered($column, $direction, $take, $relations);
    }

    public function getLatest($take = null, $relations = [])
    {
        return $this->repository->getLatest($take, $relations);
    }

    public function getHas($relation, $relationsToLoad = [])
    {
        return $this->repository->getHas($relation, $relationsToLoad);
    }

    public function getById($id, $relations = [])
    {
        return $this->repository->find($id, $relations);
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}
