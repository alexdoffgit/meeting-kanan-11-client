<?php

namespace Tests\Feature;

use Database\Seeders\RoomSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Repositories\RoomRepository;
use Tests\TestCase;
use Illuminate\Support\Collection;

class RoomsTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed([
            UserSeeder::class,
            RoomSeeder::class
        ]);
    }

    public function test_view_rooms_data_with_no_login(): void
    {
        $expectedKeys = [
            'id',
            'room_name',
            'price',
            'image',
            'wislisted',
            'wishlistId',
            'createdAt',
            'updatedAt',
            'rating',
            'description',
            'ratingCount'
        ];
        
        $roomRepo = new RoomRepository();
        $roomData = $roomRepo->roomListWithAverageRating(1, "all");
        $this->assertIsArray($roomData);
        

        foreach ($roomData as $item) {
            foreach ($expectedKeys as $key) {
                $this->assertArrayHasKey($key, $item);
            }

            $this->assertEquals(false, $item['wislisted']);
            $this->assertEquals(0, $item['wishlistId']);
        }
    }
}
