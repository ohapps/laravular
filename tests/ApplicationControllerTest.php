<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ApplicationControllerTest extends TestCase
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
             ->get('/api/application', [])
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
            '/api/application',
            [
                'name' => 'Test App',
                'portable' => 0,
                'category_id' => 1,
            ]
        )
        ->seeJson([
            'name' => 'Test App',
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
            '/api/application/1',
            [
                'name' => 'Chrome update',
                'portable' => 0,
                'category_id' => 1,
            ]
        )
        ->seeJson([
            'name' => 'Chrome update',
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
        ->get('/api/application/1',[])
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
        ->delete('/api/application/3',[])
        ->assertResponseStatus(200);
    }
}
