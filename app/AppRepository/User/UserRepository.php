<?php

namespace App\AppRepository\User;

use App\Http\Requests\ConfirmUserRequest;
use App\Http\Requests\LoginOrRegisterRequest;
use App\Http\Requests\MobileRequest;

interface UserRepository
{
    public function showLoginForm();

    public function showConfirmForm(MobileRequest $request);

    public function loginOrRegister(LoginOrRegisterRequest $request);

    public function confirmAndLogin(ConfirmUserRequest $request);
}
