<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function testOnlyLoggedinUserCanSeeHomePage()
    {
        // $response = $this->get('/login');

        $this->actingAs(factory(User::class)->create());
        $response = $this->get('/home',)->assertOk();
        // $response = $this->get('/home', )->assertRedirect('/login');

        // $response->assertStatus(200);
    }

    public function testLogin()
    {
        $response = $this->post('/login', factory(User::class)->create())->assertOk();

        // $this->actingAs();
        // $response = $this->get('/home',)->assertOk();
        // $response = $this->get('/home', )->assertRedirect('/login');

        // $response->assertStatus(200);
    }
}
