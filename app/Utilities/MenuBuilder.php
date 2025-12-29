<?php

namespace App\Utilities;

use InvalidArgumentException;
use App\Utilities\MenuItem;

class MenuBuilder {
    /** @var MenuItem[] */
    private array $menu = [];

    /**
    * @param $menu MenuItem[]
    */
    public function __construct(array $menu = [])
    {
        $this->menu = $menu;
    }

    private function exists(string $id): bool
    {
        foreach ($this->menu as $item) {
            if ($item->id === $id) {
                return true;
            }
        }
        return false;
    }

    public function add(string $name, string $url, ?string $parent = null): self
    {
        $menuItem = new MenuItem($name, $url, $parent ? $this->generateId($parent) : null);

        if ($menuItem->parent && !$this->exists($menuItem->parent)) {
            throw new InvalidArgumentException("Parent menu '{$menuItem->parent}' does not exist.");
        }

        if (!$this->exists($menuItem->id)) {
            $this->menu[] = $menuItem;
        }

        return $this;
    }

    /**
    * @return MenuItem[]
    */
    public function getMenu(): array
    {
        $new_menu = [];
        foreach($this->menu as $menu)
        {
            $children = [];
            foreach($this->menu as $check_menu)
            {
                if($check_menu->parent && $menu->id == $check_menu->parent)
                {
                    array_push($children, $check_menu);
                }
            }
            $menu->children = $children;
            if(!$menu->parent)
            {
                array_push($new_menu, $menu);
            }
        }
        return $new_menu;
    }

    private function generateId(string $name): string
    {
        return strtolower(str_replace(' ', '_', trim($name)));
    }
}
