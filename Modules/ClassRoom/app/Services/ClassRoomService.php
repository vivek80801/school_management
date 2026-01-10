<?php

namespace Modules\ClassRoom\Services;

use Illuminate\Support\Collection;
use Modules\ClassRoom\Dtos\ClassRoomDto;
use Modules\ClassRoom\Models\ClassRoom;
use Modules\ClassRoom\Repositories\Interfaces\ClassRoomRepositoryInterface;

class ClassRoomService
{
    public function __construct(
        private ClassRoomRepositoryInterface $classRoomRepository
    ) {}

    public function createClassRoom(ClassRoomDto $data): ClassRoom
    {
        return $this->classRoomRepository->createClassRoom($data);
    }

    public function getClassRoom(): Collection
    {
        return $this->classRoomRepository->getClassRoom();
    }

    public function editClassRoom(
        ClassRoomDto $data,
        ClassRoom $classRoom
    ): ClassRoom {
        return $this->classRoomRepository->updateClassRoom($data, $classRoom);
    }

    public function deleteClassRoom(ClassRoom $classRoom): void
    {
        $this->classRoomRepository->deleteClassRoom($classRoom);
    }
}
