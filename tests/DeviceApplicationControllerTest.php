<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DeviceApplicationControllerTest extends TestCase
{
    use DatabaseTransactions;

    /**
    * test creating new record for current user
    *
    * @return void
    */
    public function testStore()
    {
        $this->actingAs($this->user1)
        ->post(
            '/api/device-application',
            [
                'application_id' => 1,
                'device_id' => 1,
            ]
        )
        ->seeJson([
            'application_id' => 1,
            'device_id' => 1,
        ]);
    }

    /**
    * test displaying record for current user
    *
    * @return void
    */
    public function testDestroy()
    {
        $this->actingAs($this->user1)
        ->delete(
            '/api/device-application',
            [
                'application_id' => 1,
                'device_id' => 1,
            ]
        )
        ->assertResponseStatus(200);
    }
}
