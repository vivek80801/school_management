<?php

namespace Modules\ClassSection\Http\Controllers;

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
        /** @var view-string $viewNew */
        $viewNew = 'classsection::index';

        return view($viewNew);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        /** @var view-string $viewNew */
        $viewNew = 'classsection::create';

        return view($viewNew);
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
        /** @var view-string $viewNew */
        $viewNew = 'classsection::show';

        return view($viewNew, compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $id
     */
    public function edit($id): View
    {
        /** @var view-string $viewNew */
        $viewNew = 'classsection::edit';

        return view($viewNew, compact('id'));
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
        MenuBuilderFacade::add(
            'Section', route('classsection.index')
        );
    }
}
