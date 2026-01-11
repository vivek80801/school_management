<?php

namespace Modules\ClassSection\Actions;

use Modules\ClassSection\Dtos\ClassSectionDto;
use Modules\ClassSection\Models\ClassSection;
use Modules\ClassSection\Services\ClassSectionService;

class CreateClassSection
{
    public function __construct(
        private ClassSectionService $classSectionService
    ) {}

    public function handle(ClassSectionDto $data): ClassSection
    {
        return $this->classSectionService->create($data);
    }
}
