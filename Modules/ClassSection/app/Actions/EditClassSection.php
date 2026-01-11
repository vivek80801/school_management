<?php

namespace Modules\ClassSection\Actions;

use Modules\ClassSection\Dtos\ClassSectionDto;
use Modules\ClassSection\Models\ClassSection;
use Modules\ClassSection\Services\ClassSectionService;

class EditClassSection
{
    public function __construct(
        private ClassSectionService $classSectionService
    ) {}

    public function handle(
        ClassSectionDto $data,
        ClassSection $classSection
    ): ClassSection {
        return $this->classSectionService->edit($data, $classSection);
    }
}
