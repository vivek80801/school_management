<?php

namespace Modules\ClassSection\Repositories;

use Illuminate\Support\Collection;
use Modules\ClassSection\Dtos\ClassSectionDto;
use Modules\ClassSection\Models\ClassSection;
use Modules\ClassSection\Repositories\Interfaces\ClassSectionRepositoryInterface;

class ClassSectionRepository implements ClassSectionRepositoryInterface
{
    public function create(ClassSectionDto $data): ClassSection
    {
        $classSection = new ClassSection;
        $classSection->name = $data->name;
        $classSection->save();

        return $classSection;
    }

    public function get(): Collection
    {
        return ClassSection::all();
    }
}
