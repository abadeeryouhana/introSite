<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all($relations = [])
    {
        return $this->model->with($relations)->get();
    }

    public function count()
    {
        return $this->model->count();
    }

    public function getOrdered($column = 'order', $direction = 'asc', $take = null, $relations = [])
    {
        $query = $this->model->with($relations)->orderBy($column, $direction);
        if ($take) {
            $query->take($take);
        }
        return $query->get();
    }

    public function getLatest($take = null, $relations = [])
    {
        $query = $this->model->with($relations)->latest();
        if ($take) {
            $query->take($take);
        }
        return $query->get();
    }

    public function getHas($relation, $relationsToLoad = [])
    {
        return $this->model->with($relationsToLoad)->has($relation)->get();
    }

    public function find($id, $relations = [])
    {
        return $this->model->with($relations)->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $record = $this->find($id);
        $record->update($data);
        return $record;
    }

    public function delete($id)
    {
        $record = $this->find($id);
        return $record->delete();
    }
}
