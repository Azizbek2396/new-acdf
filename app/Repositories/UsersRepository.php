<?php

namespace App\Repositories;

use App\Models\Role;
use App\Models\User;
use phpDocumentor\Reflection\Types\False_;

class UsersRepository
{
    protected $model;
    public function __construct()
    {
        $this->model = new User();
    }

    public function getAll($limit = 10)
    {
        $data = User::with('roles')->orderBy('id', 'desc')->paginate($limit);
        return $data;
    }

    public function getFindById($id)
    {
        $data = $this->model->where('id', '=', $id)->with('roles')->first();
        if (!$data) {
            abort(404);
        }
        return $data;
    }

    public function create($request)
    {
        $data = $request->except('_token');
        $role = $data['role'];
        $data = $request->except('role');
        $model = new User;
        if ($model->fill($data)->save()) {
            $model->roles()->attach($role);
            return $model;
        }
        return false;
    }

    public function update($request, $model)
    {
        $data = $request->except('_token');
        if ($data['password'] == null) {
            unset($data['password']);
        } else {
            $data['password'] = bcrypt($data['password']);
        }
        if ($model->fill($data)->update()) {
            $model->roles()->sync([$data['role']]);
            return $model;
        }
        return false;
    }

    public function getRolesList()
    {
        $data = Role::all();
        $arr = [];
        if ($data) {
            foreach ($data as $item) {
                $name = $item->guard_name;
                if (!$name) {
                    $name = $item->name;
                }
                $arr[$item->id] = $name;
            }
        }
        return $arr;
    }

    public function delete($user)
    {
        $user = $this->getFindById($user);
        return $user->delete();
    }

}
