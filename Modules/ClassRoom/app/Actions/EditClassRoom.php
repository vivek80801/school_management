<?php

namespace Modules\ClassRoom\Actions;

use Modules\ClassRoom\Dtos\ClassRoomDto;
use Modules\ClassRoom\Models\ClassRoom;
use Modules\ClassRoom\Services\ClassRoomService;

class EditClassRoom
{
    public function __construct(
        private ClassRoomService $classRoomService
    ) {}

    public function handle(
        ClassRoomDto $data,
        ClassRoom $classRoom
    ): ClassRoom {

        return $this->classRoomService->editClassRoom($data, $classRoom);
    }
}
