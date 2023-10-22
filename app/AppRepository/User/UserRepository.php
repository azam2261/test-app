<?php

namespace App\AppRepository\User;

use App\Http\Requests\ConfirmUserRequest;
use App\Http\Requests\LoginOrRegisterRequest;

interface UserRepository
{
    public function showLoginForm();

    public function showConfirmForm();

    public function loginOrRegister(LoginOrRegisterRequest $request);

    public function confirmAndLogin(ConfirmUserRequest $request);
}
