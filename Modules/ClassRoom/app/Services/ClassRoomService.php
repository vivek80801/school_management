<?php

namespace Modules\ClassRoom\Services;

use Illuminate\Support\Collection;
use Modules\ClassRoom\Dtos\ClassRoomDto;
use Modules\ClassRoom\Models\ClassRoom;
use Modules\ClassRoom\Repositories\ClassRoomRepository;

class ClassRoomService
{
    public function create_class_room(ClassRoomDto $data): ClassRoom
    {
        $class_room_repository = new ClassRoomRepository;

        return $class_room_repository->createClassRoom($data);
    }

    public function get_class_room(): Collection
    {
        $class_room_repository = new ClassRoomRepository;

        return $class_room_repository->getClassRoom();
    }

    public function edit_class_room(
        ClassRoomDto $data,
        ClassRoom $class_room
    ): ClassRoom {
        $class_room_repository = new ClassRoomRepository;

        return $class_room_repository->updateClassRoom($data, $class_room);
    }
}
