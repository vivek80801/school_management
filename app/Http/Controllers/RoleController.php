<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|JsonResponse
    {
        if (! auth()->user()->can('role.read')) {
            return abort(403);
        }
        $roles = Role::all();
        if (request()->ajax()) {
            return DataTables::of($roles)->make(true);
        }

        /** @var view-string $viewName */
        $viewName = 'roles.index';

        return view($viewName, compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        if (! auth()->user()->can('role.create')) {
            return abort(403);
        }
        /** @var view-string $viewName */
        $viewName = 'roles.create';

        return view($viewName);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        if (! auth()->user()->can('role.create')) {
            return abort(403);
        }
        $request->validate([
            'name' => 'required|min:3|max:20',
        ]);

        $role = new Role;
        $role->name = $request->name;
        $role->save();

        return redirect()->back()->with('success', 'Role created successfully');
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
    public function edit(Role $role): View
    {
        if (! auth()->user()->can('role.update')) {
            return abort(403);
        }

        return view('roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role): RedirectResponse
    {
        if (! auth()->user()->can('role.update')) {
            return abort(403);
        }

        $request->validate([
            'name' => 'required|min:3|max:20',
        ]);

        $role->name = $request->name;
        $role->save();

        return redirect()->back()->with('success', 'Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role): RedirectResponse
    {
        if (! auth()->user()->can('role.destroy')) {
            return abort(403);
        }

        $role->delete();

        return redirect()->back()->with('success', 'Role delete successfully');
    }

    public function permissions(Role $role): View
    {
        if (! auth()->user()->can('role.create')) {
            return abort(403);
        }

        $permissions = Permission::all();
        /** @var view-string $viewName */
        $viewName = 'roles.permissions';

        return view($viewName, compact('role', 'permissions'));
    }

    public function assignPermissions(Request $request)
    {
        if (! auth()->user()->can('role.create')) {
            return abort(403);
        }

        $request->validate([
            'permissions' => 'required',
        ]);

        if (strlen($request->role) <= 0) {
            return redirect()->back()->with('error', 'Something went wrong');
        }

        $role = Role::find($request->role);

        if (! $role) {
            return redirect()->back()->with('error', 'Something went wrong');
        }

        $role->syncPermissions($request->permissions);

        return redirect()->back()->with('success', 'Permissions are assigned successfully');
    }
}
