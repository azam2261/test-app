<?php

namespace App\Http\Controllers;

use App\AppRepository\User\UserRepository;
use App\Http\Requests\ConfirmUserRequest;
use App\Http\Requests\LoginOrRegisterRequest;
use App\Http\Requests\MobileRequest;
use App\Repositories\Backend\Eloquent\User\UserRepositoryInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application as FoundationApplication;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller implements UserRepository
{
    private  $repositoryUser;

    public function __construct(UserRepositoryInterface $repositoryUser)
    {

        $this->repositoryUser = $repositoryUser;
    }
    public function showLoginForm(): View|FoundationApplication|Factory|Application
    {
        return view('login');
    }

    public function showConfirmForm(MobileRequest $request)
    {
        $user = $this->repositoryUser->where('mobile' , $request->mobile)->first();
        if(!$user){
            $otp = $this->register($request); 
        }else{

            $otp = $this->logins($user); 
        }
       $mobile = $request->mobile;
        return view('confirm',compact('mobile'))->with(['error','کد اشتباه میباشد']); 
    }

    public function loginOrRegister(LoginOrRegisterRequest $request)
    {
        // TODO: Implement loginOrRegister() method.
    }

    public function confirmAndLogin(ConfirmUserRequest $request)
    {
        $data = Cache::get('login'.$request->mobile);
        $user = $this->repositoryUser->where('mobile' , $request->mobile)->first();
        if($data != null && $request->code == $data['mobile_otp'] && $request->code == $user->mobile_otp){
            Auth::login($user);
            return view('dashboard');
        }
        $mobile = $user->mobile;
        return view('confirm',compact('mobile'))->with('error','test');
    }
     
    private function register( $request){
        $otp = rand(100000, 999999);
        $data = [
            'mobile' => $request->mobile,
            'mobile_otp' => $otp,
        ];
        $makeUser = $this->repositoryUser->create($data);
        Cache::put('login'.$request->mobile, $data, now()->addMinutes(2));
        return $data['mobile_otp'];
    }
    private function logins( $user){
        $otp = rand(100000, 999999);
        $data = [
            'mobile' => $user['mobile'],
            'mobile_otp' => $otp,
        ];
        $updateUser = $this->repositoryUser->update($user['id'],$data);
        Cache::put('login'.$user['mobile'], $data, now()->addMinutes(2));
        return $data['mobile_otp'];
    }
}
