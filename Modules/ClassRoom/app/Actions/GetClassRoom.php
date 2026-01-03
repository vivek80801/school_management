<?php

namespace Modules\ClassRoom\Actions;

use Illuminate\Support\Collection;
use Modules\ClassRoom\Services\ClassRoomService;

class GetClassRoom
{
    public function handle(): Collection
    {
        $class_room_service = new ClassRoomService;

        return $class_room_service->get_class_room();
    }
}
