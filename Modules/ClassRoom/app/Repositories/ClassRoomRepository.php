<?php

namespace Modules\ClassRoom\Repositories;

use Illuminate\Support\Collection;
use Modules\ClassRoom\Dtos\ClassRoomDto;
use Modules\ClassRoom\Models\ClassRoom;
use Modules\ClassRoom\Repositories\Interfaces\ClassRoomRepositoryInterface;

class ClassRoomRepository implements ClassRoomRepositoryInterface
{
    public function getClassRoom(): Collection
    {
        return ClassRoom::all();
    }

    public function createClassRoom(ClassRoomDto $data): ClassRoom
    {
        $classRoom = new ClassRoom;
        $classRoom->name = $data->name;
        $classRoom->save();

        return $classRoom;
    }

    public function updateClassRoom(
        ClassRoomDto $data,
        ClassRoom $classRoom
    ): ClassRoom {
        $classRoom->name = $data->name;
        $classRoom->save();

        return $classRoom;
    }

    public function deleteClassRoom(ClassRoom $classRoom): void
    {
        $classRoom->delete();
    }
}
