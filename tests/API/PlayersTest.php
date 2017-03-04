<?php

namespace Tests\API;

use Illuminate\Support\Facades\DB;
use Tests\ApiTestCase;

class PlayersTest extends ApiTestCase
{
    protected $token;

    protected $endpoint;

    public function __construct()
    {
        parent::__construct();
        $this->token    = "mkjbbtrsh10";
        $this->endpoint = 'players';
    }

    public function setUp()
    {
        parent::setUp();
        DB::beginTransaction();
    }

    public function tearDown()
    {
        DB::rollBack();
        parent::tearDown();
    }

    /** @test */
    public function it_should_not_have_hidden_field_in_schema()
    {
        $response = $this->get("/api/v1/{$this->endpoint}?q=schema&token=mkjbbtrsh10");
        $data = $this->getResponseAsJson($response)->data;
        $response->assertStatus(200);
        $this->assertNotContains('deathYear', $data);
    }
    
    /** @test */
    public function it_should_show_players()
    {
        $response = $this->login()
            ->get('/api/v1/' .$this->endpoint .'?token=' .$this->token);
        $this->responseShouldHave($response, 'nameFirst', 'David');
        return $this;
    }

    /** @test  */
    public function it_should_create_player()
    {
        $data = $this->createMockPlayer();

        $response = $this->login()
            ->post('api/v1/' .$this->endpoint .'?token=' .$this->token, $data);

        $this->assertArrayHasKey("id", $response->getOriginalContent());

        return $response->getOriginalContent()["id"];
    }

    /** @test  */
    public function it_should_delete_player()
    {
        $id = $this->it_should_create_player();
        $response = $this->login()
            ->delete('api/v1/' .$this->endpoint . '/' .$id .'?token=mkjbbtrsh10');
        $response->assertStatus(200);

        $this->assertArrayHasKey("id", $response->getOriginalContent());
    }

    /** @test  */
    public function it_should_update_player_info()
    {
        $id = $this->it_should_create_player();

        $updateData = ['weight' => 175];
        $response = $this->login()
            ->put('api/v1/'. $this->endpoint .'/'.$id.'?token='.$this->token, $updateData);

        $data = json_decode($response->getContent());
        $response->assertStatus(201);
        $this->assertIsMatch($data->id, $id);

        // cleanup after ourselves
        $this->delete('api/v1/'. $this->endpoint .'/' .$id .'?token=mkjbbtrsh10');
    }

    protected function createMockPlayer()
    {
        return [
            "nameFirst" => "Michael",
            "nameLast" => "Erickson",
            "nameGiven" => "Michael S Erickson"
        ];
    }
}
