<?php

namespace Tests\API;

use Illuminate\Support\Facades\DB;
use Tests\ApiTestCase;

class BattersTest extends ApiTestCase
{
    protected $token;

    public function __construct()
    {
        parent::__construct();
        $this->token = "mkjbbtrsh10";
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
    public function it_should_visit_home()
    {
        $this->login()
            ->get('/');
    }

    /** @test */
    public function it_should_show_batters()
    {
        $response = $this->login()
            ->get('/api/v1/batting?_limit=3&token=' .$this->token);

        $this->responseShouldHave($response, 'playerID', 'aardsda01');
        return $this;
    }

    public function it_should_return_sql_error_on_bad_query()
    {
        $response = $this->login()
            ->get('/api/v1/batting?_limit=3&token=' .$this->token);

        $this->responseShouldHave($response, 'playerID', 'aardsda01');
        return $this;
    }

    /** @test */
    public function it_should_show_specific_team()
    {
        $response = $this->login()
            ->get('api/v1/batting?q=teamID:LAA&token=' .$this->token);

        $response->assertStatus(200);
        $data = $this->getResponseAsJson($response)->data;
        $this->assertTrue($data[0]->playerID === 'alvarjo02');
    }

    /** @test  */
    public function it_should_see_dodgers_batters()
    {
        $response = $this->login()
            ->get('api/v1/batting/puigya01?q=teamID:2015&token=' .$this->token);
        $data = $this->getResponseAsJson($response)->data[0];
        $this->assertIsMatch($data->G, 79);
        $this->assertIsMatch($data->RBI, 38);

        $arrData = (array)$data;
        $this->assertIsMatch($arrData['2B'], 12);
        $this->assertIsMatch($arrData['G'], 79);
        $this->assertIsMatch($arrData['RBI'], 38);
    }

    /** @test  */
    public function it_should_create_batter()
    {
        $data = $this->createMockBatter();
        $response = $this->login()
            ->post('api/v1/batting?token=' .$this->token, $data);

        $this->assertArrayHasKey("id", $response->getOriginalContent());

        return $response->getOriginalContent()["id"];
    }

    /** @test  */
    public function it_should_delete_batter()
    {
        $id = $this->it_should_create_batter();

        $response = $this->login()
            ->delete('api/v1/batting/' .$id .'?token=mkjbbtrsh10');

        $response->assertStatus(200);

        $this->assertArrayHasKey("id", $response->getOriginalContent());
    }

    /** @test  */
    public function it_should_update_batter_info()
    {
        // create temporary batter (it will be deleted at end of test
        $id = $this->it_should_create_batter();

        // data we are updating
        $updateData = ['2B' => '22'];

        $response = $this->login()
            ->put('api/v1/batting/'.$id.'?token='.$this->token, $updateData);

        $data = json_decode($response->getContent());

        $response->assertStatus(201);
        $this->assertIsMatch($data->id, $id);

        // cleanup after ourselves
        $this->delete('api/v1/batting/' .$id .'?token=mkjbbtrsh10');
    }

    protected function createMockBatter()
    {
        return [
            "playerID" => "erickmi01",
            "yearID"   => 2015,
            "lgID"     => 'AL',
        ];
    }
}
