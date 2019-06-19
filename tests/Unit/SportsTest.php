<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SportsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
    /**
    * @test
    */
    public function it_returns_sports_page()
    {
            $response = $this->get(route('sportstest'));
            $response->assertViewIs('sports.SportsTestIndex');
    }
    public function testCreateSportsTest(){
        $data = [
            'test_type_id'=>1,
            'test_date'=>'2019-07-18 00:00:00'
        ];
        $response = $this->json('POST', '/sports/create',$data);
        $response->assertStatus(405);
        $response->assertJson(['message' => "Unauthenticated."]);
        
    }
}
