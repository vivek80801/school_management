<?php

namespace Modules\ClassSection\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\ClassSection\Actions\CreateClassSection;
use Modules\ClassSection\Actions\GetClassSection;
use Modules\ClassSection\Dtos\ClassSectionDto;
use Modules\ClassSection\Http\Requests\ClassSectionRequest;
use Yajra\DataTables\Facades\DataTables;

class ClassSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(GetClassSection $getClassSection): View|JsonResponse
    {
        $classSections = $getClassSection->handle();

        if (request()->ajax()) {
            return DataTables::of($classSections)->make(true);
        }

        /** @var view-string $viewNew */
        $viewNew = 'classsection::index';

        return view($viewNew, compact('classSections'));
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
    public function store(
        ClassSectionRequest $request,
        CreateClassSection $createClassSection
    ): RedirectResponse {
        $classSectionDto = new ClassSectionDto(
            name: $request->validated()['name']
        );

        $createClassSection->handle($classSectionDto);

        return redirect()
            ->back()
            ->with(
                'success',
                'Class room Created Successfully'
            );
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
}
