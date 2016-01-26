<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthTest extends TestCase
{
    /**
     * test successful login
     *
     * @return void
     */
    public function testSuccessfulLogin()
    {
        $this->actingAs($this->user1)
             ->visit('/')
             ->see('Laravular');
    }

    /**
    * test redirect login page
    *
    * @return void
    */
    public function testRedirectToLogin()
    {
        $this->visit('/')
             ->see('Email');
    }
}
