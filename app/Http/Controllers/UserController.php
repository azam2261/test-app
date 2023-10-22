<?php

namespace App\Http\Controllers;

use App\AppRepository\User\UserRepository;
use App\Http\Requests\ConfirmUserRequest;
use App\Http\Requests\LoginOrRegisterRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application as FoundationApplication;

class UserController extends Controller implements UserRepository
{

    public function showLoginForm(): View|FoundationApplication|Factory|Application
    {
        return view('login');
    }

    public function showConfirmForm()
    {
        // TODO: Implement showConfirmForm() method.
    }

    public function loginOrRegister(LoginOrRegisterRequest $request)
    {
        // TODO: Implement loginOrRegister() method.
    }

    public function confirmAndLogin(ConfirmUserRequest $request)
    {
        // TODO: Implement confirmAndLogin() method.
    }
}
