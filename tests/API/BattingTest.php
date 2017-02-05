<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class BattersTest extends TestCase
{

	protected $token;

	public function __construct($name = null, array $data = [], $dataName = '')
	{
		parent::__construct($name, $data, $dataName);
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
			->get('/api/v1/batting?token=' .$this->token);
		$this->resultShouldHave($response, 'playerID', 'aardsda01');
		return $this;
	}


	/** @test */
	public function it_should_show_specific_team()
	{
		$response = $this->login()
			->get('api/v1/batting?q=teamID:LAA&token=' .$this->token);

		$response->assertStatus(200);
		$data = $this->getResponseAsJson($response);
		$this->assertTrue($data[0]->playerID === 'alvarjo02');
	}

	/** @test  */
	public function it_should_see_dodgers_batters()
	{
		$response = $this->login()
			->get('api/v1/batting/72266?q=teamID:LAN&token=' .$this->token);

		$data = $this->getResponseAsJson($response);
		$this->assertTrue($data[0]->G === 79);
		$this->assertTrue($data[0]->RBI === 38);

		$arrData = (array)$data[0];
		$this->assertTrue($arrData['2B'] === 12);
		$this->assertTrue($arrData['G'] === 79);
		$this->assertTrue($arrData['RBI'] === 38);

	}


	/** @test  */
	public function it_should_create_batter()
	{
		$data = $this->createMockBatter();

		$response = $this->login()
			->post('api/v1/batting?token=' .$this->token, $data);

		$this->assertArrayHasKey("key",$response->getOriginalContent());

		return $response->getOriginalContent()["key"];
	}

	/** @test  */
	public function it_should_delete_batter()
	{
		$id = $this->it_should_create_batter();
		$response = $this->login()
			->delete('api/v1/batting/' .$id .'?token=mkjbbtrsh10');
		$response->assertStatus(200);

		$this->assertArrayHasKey("key",$response->getOriginalContent());

	}

	/** @test  */
	public function it_should_update_batter_info()
	{
		$id = $this->it_should_create_batter();

		$updateData = ['2B' => '22'];
		$response = $this->login()
			->put('api/v1/batting/'.$id.'?token='.$this->token, $updateData);

		$data = json_decode($response->getContent());
		$response->status(201);
		$this->assertTrue($data->id === (string)$id);

		// cleanup after ourselves
		$this->delete('api/v1/batting/' .$id .'?token=mkjbbtrsh10');

	}

	protected function createMockBatter() {
		return [
			"playerID" => "erickmi01",
			"yearID" => 2015
		];
	}

}