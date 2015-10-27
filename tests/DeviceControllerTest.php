<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DeviceControllerTest extends TestCase
{
    use DatabaseTransactions;

    /**
    * test listing all records for current user
    *
    * @return void
    */
    public function testIndex()
    {
        $this->actingAs($this->user1)
        ->get('/api/device', [])
        ->seeJson([
            'id' => 1,
        ]);
    }

    /**
    * test creating new record for current user
    *
    * @return void
    */
    public function testStore()
    {
        $this->actingAs($this->user1)
        ->post(
            '/api/device',
            [
                'name' => 'Test Device',
                'os' => 'Android',
            ]
        )
        ->seeJson([
            'name' => 'Test Device',
        ]);
    }

    /**
    * test updating record for current user
    *
    * @return void
    */
    public function testUpdate()
    {
        $this->actingAs($this->user1)
        ->put(
            '/api/device/1',
            [
                'name' => 'Mac Book update',
                'os' => 'OS 2'
            ]
        )
        ->seeJson([
            'name' => 'Mac Book update',
        ]);
    }

    /**
    * test displaying record for current user
    *
    * @return void
    */
    public function testShow()
    {
        $this->actingAs($this->user1)
        ->get('/api/device/1',[])
        ->seeJson([
            'id' => 1,
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
        ->delete('/api/device/2',[])
        ->assertResponseStatus(200);
    }
}
