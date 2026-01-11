<?php

namespace Modules\ClassSection\Services;

use Illuminate\Support\Collection;
use Modules\ClassSection\Dtos\ClassSectionDto;
use Modules\ClassSection\Models\ClassSection;
use Modules\ClassSection\Repositories\ClassSectionRepository;

class ClassSectionService
{
    public function __construct(
        private ClassSectionRepository $classSectionRepository
    ) {}

    public function get(): Collection
    {
        return $this->classSectionRepository->get();
    }

    public function create(ClassSectionDto $data): ClassSection
    {
        return $this->classSectionRepository->create($data);
    }

    public function edit(ClassSectionDto $data, ClassSection $classSection): ClassSection
    {
        return $this->classSectionRepository->update($data, $classSection);
    }

    public function delete(ClassSection $classSection): void
    {
        $this->classSectionRepository->delete($classSection);
    }
}
