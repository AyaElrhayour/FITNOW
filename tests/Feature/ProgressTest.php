<?php

namespace Tests\Feature;

use App\Models\Progress;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProgressTest extends TestCase
{
    use RefreshDatabase;

    public function testStoreProgress()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $data = [
            'weight' => 70,
            'measurements' => '30-28-32',
            'performance' => 'good',
            'height' => 170,
        ];

        $response = $this->postJson(route('progress.store'), $data);

        $response->assertCreated();
        $this->assertDatabaseHas('progress', [
            'user_id' => $user->id,
            'weight' => 70,
            'measurements' => '30-28-32',
            'performance' => 'good',
            'height' => 170,
        ]);
    }

    public function testShowProgress()
    {
        $user = User::factory()->create();
        $progress = Progress::factory()->create(['user_id' => $user->id]);
        $this->actingAs($user);

        $response = $this->getJson(route('progress.show', $progress));

        $response->assertOk();
        $response->assertJson([
            'data' => [
                'weight' => $progress->weight,
                'measurements' => $progress->measurements,
                'performance' => $progress->performance,
                'height' => $progress->height,
            ]
        ]);
    }

    public function testUpdateProgress()
    {
        $user = User::factory()->create();
        $progress = Progress::factory()->create(['user_id' => $user->id]);
        $this->actingAs($user);

        $data = [
            'weight' => 75,
            'measurements' => '32-30-34',
            'performance' => 'excellent',
            'height' => 172,
            'status' => true,
        ];

        $response = $this->putJson(route('progress.update', $progress), $data);

        $response->assertOk();
        $this->assertDatabaseHas('progress', [
            'id' => $progress->id,
            'user_id' => $user->id,
            'weight' => 75,
            'measurements' => '32-30-34',
            'performance' => 'excellent',
            'height' => 172,
            'status' => true,
        ]);
    }

    public function testDestroyProgress()
    {
        $user = User::factory()->create();
        $progress = Progress::factory()->create(['user_id' => $user->id]);
        $this->actingAs($user);

        $response = $this->deleteJson(route('progress.destroy', $progress));

        $response->assertNoContent();
        $this->assertDatabaseMissing('progress', [
            'id' => $progress->id,
        ]);
    }
}