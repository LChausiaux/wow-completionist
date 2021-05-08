<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * @package Repositories
 */
class Repository
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * @param $id
     * @return mixed
     */
    public
    function find($id): ?Model
    {
        return $this->model::find($id);
    }

    /**
     * @param array $filter
     * @return mixed
     */
    public
    function findBy(array $filter): ?Collection
    {
        $collection = $this->model::all();
        foreach($filter as $key => $item)
        {
            $collection = $collection->whereIn($key, (array)$item);
        }
        return $collection;
    }

    /**
     * @param array $filter
     * @return mixed
     */
    public
    function findOneBy(array $filter): ?Model
    {
        return $this->findBy($filter)->first();
    }

    /**
     * @return mixed
     */
    public
    function findAll(): ?Collection
    {
        return $this->model::all();
    }

    /**
     * @param array $fields
     * @return mixed
     */
    public
    function create(array $fields): Model
    {
        $model = $this->model::create($fields);
        $model->save();
        return $model;
    }

    /**
     * @param array $modifiers
     * @param array $filters
     */
    public
    function createOrUpdate(array $modifiers, array $filters)
    {
        if($model = $this->findOneBy($filters))
            $this->updateOne($model, $modifiers);
        else
            $this->create($modifiers);
    }

    /**
     * @param $id
     * @return mixed
     */
    public
    function destroy($id): bool
    {
        return $this->model::destroy($id);
    }

    /**
     * @param Collection $models
     * @param array $fields
     * @return mixed
     */
    public
    function update(Collection $models, array $fields): array
    {
        $updatedModels = [];
        foreach($models as $model)
        {
            array_push($updatedModels, updateOne($model, $fields));
        }

        return $updatedModels;
    }

    /**
     * @param Model $model
     * @param array $fields
     * @return mixed
     */
    public
    function updateOne(Model $model, array $fields): bool
    {
        return $model->update($fields);
    }

    /**
     * @return int
     */
    public
    function count(): int
    {
        return $this->model::count();
    }

    /**
     * @param array $filter
     * @return int
     */
    public
    function countBy(array $filter): int
    {
        return $this->findBy($filter)->count();
    }
}
