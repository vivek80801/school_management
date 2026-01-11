<?php

namespace Modules\ClassSection\Actions;

use Modules\ClassSection\Models\ClassSection;
use Modules\ClassSection\Services\ClassSectionService;

class DeleteClassSection
{
    public function __construct(
        private ClassSectionService $classSectionService
    ) {}

    public function handle(ClassSection $classSection): void
    {
        $this->classSectionService->delete($classSection);
    }
}
