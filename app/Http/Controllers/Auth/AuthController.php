<?php

namespace App\Http\Controllers\Auth;

use App\Actions\User\createUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(): View
    {
        return view('auth.login');
    }

    public function register(): View
    {
        return view('auth.register');
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        if(Auth::attempt( $request->validated()))
        {
            return redirect()->route("dashboard")->with("success", "You are successfully logged in");
        }else{
            return redirect()->route("login")->with("error", "Ops! you are not logged in");
        }
    }

    public function register_store(RegisterRequest $request, createUser $createUser): RedirectResponse
    {
        $createUser->handle((Object) $request->validated());
        return redirect()->route("login")->with("success", "User Created Successfully");
    }

    public function logout(): RedirectResponse
    {
        return redirect()->route("home")->with("success", "You are logged out Successfully");
    }
}
