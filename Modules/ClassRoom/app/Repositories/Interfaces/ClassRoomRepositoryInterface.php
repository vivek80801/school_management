<?php

namespace Modules\ClassRoom\Repositories\Interfaces;

use Illuminate\Support\Collection;
use Modules\ClassRoom\Dtos\ClassRoomDto;
use Modules\ClassRoom\Models\ClassRoom;

interface ClassRoomRepositoryInterface
{
    public function getClassRoom(): Collection;

    public function createClassRoom(ClassRoomDto $data): ClassRoom;

    public function updateClassRoom(ClassRoomDto $classRoomDto, ClassRoom $classRoom): ClassRoom;

    public function deleteClassRoom(ClassRoom $classRoom): void;
}
