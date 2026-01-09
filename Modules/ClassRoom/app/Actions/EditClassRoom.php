<?php

namespace Modules\ClassRoom\Actions;

use Modules\ClassRoom\Dtos\ClassRoomDto;
use Modules\ClassRoom\Models\ClassRoom;
use Modules\ClassRoom\Services\ClassRoomService;

class EditClassRoom
{
    public function handle(
        ClassRoomDto $data,
        ClassRoom $class_room
    ): ClassRoom {
        $class_room_service = new ClassRoomService;

        return $class_room_service->edit_class_room($data, $class_room);
    }
}
