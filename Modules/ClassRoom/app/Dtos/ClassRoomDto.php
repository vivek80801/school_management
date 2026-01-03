<?php

namespace Modules\ClassRoom\Dtos;

final readonly class ClassRoomDto
{
    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}
