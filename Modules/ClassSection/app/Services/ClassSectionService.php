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

    public function create(ClassSectionDto $data): ClassSection
    {
        return $this->classSectionRepository->create($data);
    }

    public function get(): Collection
    {
        return $this->classSectionRepository->get();
    }
}
