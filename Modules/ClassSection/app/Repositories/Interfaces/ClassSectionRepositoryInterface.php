<?php

namespace Modules\ClassSection\Repositories\Interfaces;

use Illuminate\Support\Collection;
use Modules\ClassSection\Dtos\ClassSectionDto;
use Modules\ClassSection\Models\ClassSection;

interface ClassSectionRepositoryInterface
{
    public function get(): Collection;

    public function create(ClassSectionDto $data): ClassSection;

    public function update(ClassSectionDto $data, ClassSection $classSection): ClassSection;
}
