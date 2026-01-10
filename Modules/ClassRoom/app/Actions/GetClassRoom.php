<?php

namespace Modules\ClassRoom\Actions;

use Illuminate\Support\Collection;
use Modules\ClassRoom\Services\ClassRoomService;

class GetClassRoom
{
    public function __construct(
        private ClassRoomService $classRoomService
    ) {}

    public function handle(): Collection
    {

        return $this->classRoomService->getClassRoom();
    }
}
