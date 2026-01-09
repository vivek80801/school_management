<?php

namespace Modules\ClassRoom\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Modules\ClassRoom\Actions\CreateClassRoom;
use Modules\ClassRoom\Actions\EditClassRoom;
use Modules\ClassRoom\Actions\GetClassRoom;
use Modules\ClassRoom\Dtos\ClassRoomDto;
use Modules\ClassRoom\Http\Requests\ClassRoomRequest;
use Modules\ClassRoom\Models\ClassRoom;
use Yajra\DataTables\Facades\DataTables;


class ClassRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(GetClassRoom $getClassRoom): View
    {
        $class_rooms = $getClassRoom->handle();
        $data_table_class_room = DataTables::of($class_rooms)->make(true);

        /** @var view-string $viewName */
        $viewName = 'classroom::index';

        return view($viewName, compact('class_rooms', 'class_rooms'));
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
    public function store(
        ClassRoomRequest $request,
        CreateClassRoom $createClassRoom
    ):
    RedirectResponse
    {
        $class_room_dto = new ClassRoomDto(
            name: $request->validated()['class_name'],
        );

        $createClassRoom->handle($class_room_dto);

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
        /** @var view-string $viewName */
        $viewName = 'classroom::show';

        return view($viewName, compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClassRoom $classroom): View
    {
        /** @var view-string $viewName */
        $viewName = 'classroom::edit';

        return view($viewName, compact('classroom'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        ClassRoomRequest $request,
        ClassRoom $classroom,
        EditClassRoom $edit_class_room
    ):
    RedirectResponse
    {
        $class_room_dto = new ClassRoomDto(
            name: $request->validated()['class_name'],
        );

        $edit_class_room->handle($class_room_dto, $classroom);

        return redirect()
            ->back()
            ->with(
                'success',
                'Class room Updated Successfully'
            );
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
