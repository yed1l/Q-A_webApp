<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{

    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee("Question&amp;Answers");

    }

    public function testRouteCreate(){

        $user = User::find(1);

        //user not logged
        $response = $this->get('/questions/create');
        $response->assertStatus(302);

        //user logged
        $response = $this->actingAs($user)->get('/questions/create');
        $response->assertStatus(200);

    }

    public function testViewHome(){
        $user = User::find(1);

        //user not logged
        $response = $this->get('/');
        $response->assertStatus(200);

        //user logged
        $response = $this->actingAs($user)->get('/');
        $response->assertStatus(200);
    }

    public function testViewProfile(){
        $user = User::find(1);

        //user not logged
        $response = $this->get('/user/'.$user->slug);
        $response->assertStatus(302);

        //user logged
        $response = $this->actingAs($user)->get('/user/'.$user->slug);
        $response->assertStatus(200);

    }

    public function testDeleteElement(){
        $user = User::find(1);

        //user logged
        $response = $this->get('/questions/destroy/{id}');
        $response->assertStatus(200);


    }

}
