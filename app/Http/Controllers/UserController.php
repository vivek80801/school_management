<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|JsonResponse
    {
        if(!auth()->user()->can("user.read"))
        {
            return abort(403);
        }

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
        if(!auth()->user()->can("user.create"))
        {
            return abort(403);
        }

        /** @var view-string $viewName */
        $viewName = 'users.create';

        return view($viewName);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!auth()->user()->can("user.create"))
        {
            return abort(403);
        }

        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        if(!auth()->user()->can("user.update"))
        {
            return abort(403);
        }
        return view('roles.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(!auth()->user()->can("user.update"))
        {
            return abort(403);
        }
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(!auth()->user()->can("user.delete"))
        {
            return abort(403);
        }
        //
    }

    public function roles(User $user): View
    {
        if(!auth()->user()->can("user.create"))
        {
            return abort(403);
        }
        /** @var view-string $viewName */
        $viewName = 'users.roles';

        return view($viewName, compact('user'));
    }

    public function assignRole(User $user): View
    {
        if(!auth()->user()->can("user.create"))
        {
            return abort(403);
        }

        $roles = Role::all();

        /** @var view-string $viewName */
        $viewName = 'users.assign_role';

        return view($viewName, compact('user', 'roles'));
    }

    public function roleAssign(Request $request): RedirectResponse
    {
        if(!auth()->user()->can("user.create"))
        {
            return abort(403);
        }
        $request->validate([
            'roles' => 'required',
        ]);

        if (strlen($request->user) <= 0) {
            return redirect()->back()->with('error', 'something went wrong');
        }

        $user = User::find($request->user);

        if (! $user) {
            return redirect()->back()->with('error', 'something went wrong');
        } else {
            $user->syncRoles($request->roles ?? []);
        }

        return redirect()->back()->with('success', 'Role is assigned successfully');
    }
}
