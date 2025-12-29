<?php

namespace App\Utilities;

class MenuItem {
    public string $id;
    public string $name;
    public ?string $parent;
    public string $url;

    public function __construct(string $name, string $url, ?string $parent = null)
    {
        $this->name = $name;
        $this->url = $url;
        $this->parent = $parent;
        $this->id = $this->generateId($name);
    }

    private function generateId(string $name): string
    {
        return strtolower(str_replace(' ', '_', trim($name)));
    }
}
