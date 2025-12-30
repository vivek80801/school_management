<?php

namespace Tests\Unit;

use App\Utilities\MenuBuilder;
use PHPUnit\Framework\TestCase;

class MenuBuilderTest extends TestCase
{
    private MenuBuilder $menu_builder;

    protected function setUp(): void
    {
        parent::setUp();
        $this->menu_builder = $this->create_menu_builder();
    }

    private function create_menu_builder(): MenuBuilder
    {
        return new MenuBuilder;
    }

    /**
     * MenuBuilder should be empty in starting
     */
    public function test_menu_builder_should_start_with_empty_array(): void
    {
        $this->assertIsArray($this->menu_builder->getMenu());
    }

    /**
     * MenuBuilder with only one level menu
     */
    public function test_menu_builder_with_only_menu(): void
    {
        $this->menu_builder->add('Home', '/home');
        $menu = $this->menu_builder->getMenu()[0];
        $this->assertEquals($menu->id, 'home');
        $this->assertEquals($menu->url, '/home');
        $this->assertEquals($menu->name, 'Home');
        $this->assertEquals($menu->parent, null);
        $this->assertEquals($menu->children, []);
    }

    /**
     * MenuBuilder with only two level
     */
    public function test_menu_builder_with_sub_menu(): void
    {
        $this->menu_builder->add('Home', '/home')
            ->add('Dashboard', '/dashboard', 'Home');
        $menu = $this->menu_builder->getMenu()[0]->children[0];
        $this->assertEquals($menu->id, 'dashboard');
        $this->assertEquals($menu->url, '/dashboard');
        $this->assertEquals($menu->name, 'Dashboard');
        $this->assertEquals($menu->parent, 'home');
    }
}
