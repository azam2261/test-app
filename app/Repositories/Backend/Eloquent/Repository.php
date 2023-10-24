<?php

namespace App\Repositories\Backend\Eloquent;

abstract class Repository 
{
    protected $model;

    
    public function __construct()
    {
        $this->model = app($this->model());
    }
    abstract public function model();

    public function where($col, $value)
    {
        return $this->model->where($col, $value);
    }
    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }
    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data)
    {
        return $this->model->find($id)->update($data);
    }

}