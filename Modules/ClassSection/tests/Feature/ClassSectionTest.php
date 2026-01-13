<?php

namespace Modules\ClassSection\Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\ClassSection\Models\ClassSection;
use Tests\TestCase;

class ClassSectionTest extends TestCase
{
    use RefreshDatabase;

    private $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function test_add_class_section(): void
    {
        $classSection = [
            'name' => 'A',
        ];
        $this->actingAs($this->user)
            ->post(route('classsection.store'), $classSection);
        $this->assertDatabaseHas('class_sections', $classSection);
    }

    public function test_validation_check_for_class_sections_addition(): void
    {
        $response = $this->actingAs($this->user)
            ->post(route('classsection.store'), [
                'name' => '',
            ]);
        $response->assertSessionHasErrors('name');
    }

    public function test_update_class_sections(): void
    {
        $classSection = [
            'name' => 'B'
        ];
        $classRoom = ClassSection::factory()->create();
        $this->actingAs($this->user)
            ->put(route('classsection.update', $classRoom->id), $classSection);
        $this->assertDatabaseHas('class_sections', [
            'id' => $classRoom->id,
            'name' => 'B',
        ]);
    }

    public function test_delete_class_sections(): void
    {
        $classRoom = ClassSection::factory()->create();
        $response = $this->actingAs($this->user)
            ->delete(route('classsection.destroy', $classRoom->id));
        $response->assertRedirect();
        $this->assertDatabaseMissing('class_sections', [
            'id' => $classRoom->id,
        ]);
    }

    public function test_guest_cannot_add_class_section(): void
    {
        $this->post(route('classsection.store'), ['name' => 'D'])
            ->assertRedirect(route('login'));
    }
}
