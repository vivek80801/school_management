<?php

namespace App\Http\Controllers;

use App\Actions\User\CreateUser;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index(): View|JsonResponse
    {
        $this->authorize('viewAny', User::class);

        $users = User::all();

        if (request()->ajax()) {
            return DataTables::of($users)->make(true);
        }

        /** @var view-string $viewName */
        $viewName = 'users.index';

        return view($viewName, compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $this->authorize('create', User::class);

        /** @var view-string $viewName */
        $viewName = 'users.create';

        return view($viewName);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterRequest $request, CreateUser $createUser): RedirectResponse
    {
        $this->authorize('create', User::class);

        $createUser->handle((object) $request->validated());

        return redirect()->route('login')->with('success', 'User Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): void
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        $this->authorize('update', $user);

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $this->authorize('update', $user);

        $request->validate([
            'name' => 'required|min:5|max:50',
            'email' => 'required|email|unique:users,email'.$user->id.'|min:5|max:250',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->back()->with('success', 'user is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        $this->authorize('delete', $user);
        $user->delete();

        return redirect()->back()->with('success', 'user is successfully deleted');
    }

    public function roles(User $user): View
    {
        $this->authorize('update', $user);
        /** @var view-string $viewName */
        $viewName = 'users.roles';

        return view($viewName, compact('user'));
    }

    public function assignRole(User $user): View
    {
        $this->authorize('update', $user);

        $roles = Role::all();

        /** @var view-string $viewName */
        $viewName = 'users.assign_role';

        return view($viewName, compact('user', 'roles'));
    }

    public function roleAssign(Request $request, User $user): RedirectResponse
    {
        $this->authorize('update', $user);

        $request->validate([
            'roles' => 'required',
        ]);

        $user->syncRoles($request->roles ?? []);

        return redirect()->back()->with('success', 'Role is assigned successfully');
    }
}
