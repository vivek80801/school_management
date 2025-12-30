<?php

namespace Modules\Student\Http\Controllers;

use App\Facades\MenuBuilderFacade;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        /** @var view-string $viewName */
        $viewName = 'student::index';

        return view($viewName);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        /** @var view-string $viewName */
        $viewName = 'student::create';

        return view($viewName);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): void {}

    /**
     * Show the specified resource.
     */
    public function show($id): View
    {
        /** @var view-string $viewName */
        $viewName = 'student::show';

        return view($viewName);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        /** @var view-string $viewName */
        $viewName = 'student::edit';

        return view($viewName, compact('id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): void
    {
        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): void
    {
        dd($id);
    }

    public function modify_menu(): void
    {
        MenuBuilderFacade::add('Student', route('student.index'));
    }
}
