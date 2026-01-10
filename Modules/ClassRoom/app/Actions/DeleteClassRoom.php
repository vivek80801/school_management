<?php

namespace Modules\ClassRoom\Actions;

use Modules\ClassRoom\Models\ClassRoom;
use Modules\ClassRoom\Services\ClassRoomService;

class DeleteClassRoom
{
    public function __construct(
        private ClassRoomService $classRoomService
    ) {}

    public function handle(ClassRoom $classRoom): void
    {
        $this->classRoomService->deleteClassRoom($classRoom);
    }
}
