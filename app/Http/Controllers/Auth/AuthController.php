<?php

namespace App\Http\Controllers\Auth;

use App\Actions\User\CreateUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

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
        if (Auth::attempt($request->validated())) {
            $request->session()->regenerate();

            return redirect()->route('dashboard')->with('success', 'You are successfully logged in');
        } else {
            return redirect()->route('login')->with('error', 'Credentails are wrong');
        }
    }

    public function registerStore(RegisterRequest $request, CreateUser $createUser): RedirectResponse
    {
        $createUser->handle((object) $request->validated());

        return redirect()->route('login')->with('success', 'User Created Successfully');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'You are logged out Successfully');
    }

    public function forget_password_get(): View
    {
        return view('auth.forget_password');
    }

    public function forget_password_post(
        Request $request
    ): RedirectResponse {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::ResetLinkSent
                ? back()->with(['status' => $status])
                : back()->withErrors(['status' => $status]);
    }

    public function forget_password_reset(string $token): View
    {
        $email = request()->query('email');

        return view('auth.reset_password', compact('token', 'email'));
    }

    public function reset_password(Request $request): RedirectResponse
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->password = Hash::make($password);
                $user->save();
            }
        );

        return $status === Password::PasswordReset
                    ? redirect()->route('login')->with('status', $status)
                    : back()->withErrors(['email' => [$status]]);
    }
}
