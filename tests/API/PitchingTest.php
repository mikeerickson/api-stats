<?php

namespace Tests\API;

use Illuminate\Support\Facades\DB;
use Tests\ApiTestCase;

class PitchingTest extends ApiTestCase
{
    protected $token;

    protected $endpoint;

    public function __construct()
    {
        parent::__construct();
        $this->token = "mkjbbtrsh10";
        $this->endpoint = 'pitching';
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
    public function it_should_show_pitchers()
    {
        $response = $this->login()
            ->get('/api/v1/' .$this->endpoint .'?token=' .$this->token);
        $this->responseShouldHave($response, 'playerID', 'aardsda01');
        return $this;
    }

    /** @test */
    public function it_should_show_specific_team()
    {
        $response = $this->login()
            ->get('api/v1/' .$this->endpoint .'?q=teamID:LAA&token=' .$this->token);

        $response->assertStatus(200);
        $data = $this->getResponseAsJson($response)->data;
        $this->assertTrue($data[0]->playerID === 'alvarjo02');
    }

    /** @test */
    public function it_should_show_player_data()
    {
        $response = $this->login()
            ->get('api/v1/pitching?q=teamID:LAA&token=' .$this->token);

        $response->assertStatus(200);
        $data = $this->getResponseAsJson($response)->data;
        $this->assertTrue($data[0]->player->nameLast === 'Alvarez');
    }


    /** @test  */
    public function it_should_see_dodgers_pitchers()
    {
        $response = $this->login()
            ->get('api/v1/' .$this->endpoint .'/?q=teamID:LAN&token=' .$this->token);

        $data = $this->getResponseAsJson($response)->data;
        $this->assertIsMatch($data[0]->G, '31');
        $this->assertIsMatch($data[0]->W, '10');

        $arrData = (array)$data[0];
        $this->assertIsMatch($arrData['ERA'], '3.69');
        $this->assertIsMatch($arrData['SH'], '3');
        $this->assertIsMatch($arrData['BB'], '46');
        $this->assertIsMatch($arrData['R'], '82');
    }

    /** @test  */
    public function it_should_create_pitcher()
    {
        $data = $this->createMockPitcher();

        $response = $this->login()
            ->post('api/v1/' .$this->endpoint .'?token=' .$this->token, $data);

        $this->assertArrayHasKey("id", $response->getOriginalContent());

        return $response->getOriginalContent()["id"];
    }

    /** @test  */
    public function it_should_delete_pitcher()
    {
        $id = $this->it_should_create_pitcher();
        $response = $this->login()
            ->delete('api/v1/' .$this->endpoint .'/' .$id .'?token=mkjbbtrsh10');
        $response->assertStatus(200);

        $this->assertArrayHasKey("id", $response->getOriginalContent());
    }

    /** @test  */
    public function it_should_update_pitcher_info()
    {
        $id = $this->it_should_create_pitcher();

        $updateData = ['HR' => '23'];
        $response = $this->login()
            ->put('api/v1/batting/'.$id.'?token='.$this->token, $updateData);

        $data = json_decode($response->getContent());
        $response->assertStatus(201);
        $this->assertIsMatch($data->id, $id);

        // cleanup after ourselves
        $this->delete('api/v1/batting/' .$id .'?token=mkjbbtrsh10');
    }

    protected function createMockPitcher()
    {
        return [
            "playerID" => "erickmi01",
            "yearID" => 2015,
            "W" => 22,
            "L" => 5
        ];
    }
}
