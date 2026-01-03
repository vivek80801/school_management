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
        $class_room = new ClassRoom;
        $class_room->name = $data->name;
        $class_room->save();

        return $class_room;
    }

    public function updateClassRoom($id): ClassRoom
    {
        throw new \Exception('Not implemented');
    }

    public function deleteClassRoom($id): ClassRoom
    {
        throw new \Exception('Not implemented');
    }
}
