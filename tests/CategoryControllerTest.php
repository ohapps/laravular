<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CategoryControllerTest extends TestCase
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
        ->get('/api/category', [])
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
            '/api/category',
            [
                'description' => 'Test Category',
            ]
        )
        ->seeJson([
            'description' => 'Test Category',
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
            '/api/category/1',
            [
                'description' => 'browsers update',
            ]
        )
        ->seeJson([
            'description' => 'browsers update',
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
        ->get('/api/category/1',[])
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
        ->delete('/api/category/2',[])
        ->assertResponseStatus(200);
    }
}
