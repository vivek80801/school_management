<?php

namespace Modules\ClassRoom\Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\ClassRoom\Models\ClassRoom;
use Tests\TestCase;

class ClassRoomTest extends TestCase
{
    use RefreshDatabase;

    private $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function test_add_class_room(): void
    {
        $this->actingAs($this->user)
            ->post(route('classroom.store'), [
                'class_name' => 'V',
            ]);
        $this->assertDatabaseHas('class_rooms', [
            'name' => 'V',
        ]);
    }

    public function test_validation_check_for_class_room_addition(): void
    {
        $response = $this->actingAs($this->user)
            ->post(route('classroom.store'), [
                'class_name' => '',
            ]);
        $response->assertSessionHasErrors('class_name');
    }

    public function test_update_class_room(): void
    {
        $classRoom = ClassRoom::factory()->create();
        $this->actingAs($this->user)
            ->put(route('classroom.update', $classRoom->id), [
                'class_name' => 'V',
            ]);
        $this->assertDatabaseHas('class_rooms', [
            'id' => $classRoom->id,
            'name' => 'V',
        ]);
    }

    public function test_delete_class_room(): void
    {
        $classRoom = ClassRoom::factory()->create();
        $response = $this->actingAs($this->user)
            ->delete(route('classroom.destroy', $classRoom->id));
        $response->assertRedirect();
        $this->assertDatabaseMissing('class_rooms', [
            'id' => $classRoom->id,
        ]);
    }

    public function test_guest_cannot_add_class_room(): void
    {
        $this->post(route('classroom.store'), ['class_name' => 'V'])
            ->assertRedirect(route('login'));
    }
}
