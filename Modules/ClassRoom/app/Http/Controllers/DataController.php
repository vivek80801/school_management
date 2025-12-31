<?php

namespace Modules\ClassRoom\Http\Controllers;

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
        $viewName = 'classroom::index';

        return view($viewName);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        /** @var view-string $viewName */
        $viewName = 'classroom::create';

        return view($viewName);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): void
    {
        dd($request);
    }

    /**
     * Show the specified resource.
     *
     * @param  string  $id
     */
    public function show($id): View
    {
        /** @var view-string $viewName */
        $viewName = 'classroom::show';

        return view($viewName, compact($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $id
     */
    public function edit($id): View
    {
        /** @var view-string $viewName */
        $viewName = 'classroom::edit';

        return view($viewName, compact($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  string  $id
     */
    public function update(Request $request, $id): void
    {
        dd($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $id
     */
    public function destroy($id): void
    {
        dd($id);
    }

    public function modify_menu(): void
    {
        MenuBuilderFacade::add('ClassRoom', route('classroom.index'));
    }
}
