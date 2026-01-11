<?php

namespace Modules\ClassSection\Actions;

use Illuminate\Support\Collection;
use Modules\ClassSection\Services\ClassSectionService;

class GetClassSection
{
    public function __construct(
        private ClassSectionService $classSectionService
    ) {}

    public function handle(): Collection
    {
        return $this->classSectionService->get();
    }
}
