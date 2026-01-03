<?php

namespace Modules\ClassRoom\Actions;

use Modules\ClassRoom\Dtos\ClassRoomDto;
use Modules\ClassRoom\Models\ClassRoom;
use Modules\ClassRoom\Services\ClassRoomService;

class CreateClassRoom
{
    public function handle(ClassRoomDto $data): ClassRoom
    {
        $class_room_service = new ClassRoomService;

        return $class_room_service->create_class_room($data);
    }
}
