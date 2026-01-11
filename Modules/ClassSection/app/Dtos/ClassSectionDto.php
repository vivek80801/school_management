<?php

namespace Modules\ClassSection\Dtos;

final readonly class ClassSectionDto
{
    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}
