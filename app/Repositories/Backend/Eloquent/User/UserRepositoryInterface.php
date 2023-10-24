<?php 
namespace App\Repositories\Backend\Eloquent\User;


interface UserRepositoryInterface 
{
	public function where($col, $value);
	public function create(array $data);
	public function update($id, array $data);
}