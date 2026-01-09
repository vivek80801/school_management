<?php

namespace Modules\ClassRoom\Repositories\Interfaces;

use Illuminate\Support\Collection;
use Modules\ClassRoom\Dtos\ClassRoomDto;
use Modules\ClassRoom\Models\ClassRoom;

interface ClassRoomRepositoryInterface
{
    public function getClassRoom(): Collection;

    public function createClassRoom(ClassRoomDto $data): ClassRoom;

    public function updateClassRoom(ClassRoomDto $class_room_dto, ClassRoom $class_room): ClassRoom;

    /** @param string $id */
    public function deleteClassRoom($id): ClassRoom;
}
