<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class TeamsFranchisesTest extends TestCase
{

	protected $token;
	protected $endpoint;

	public function __construct($name = null, array $data = [], $dataName = '')
	{
		parent::__construct($name, $data, $dataName);
		$this->token    = "mkjbbtrsh10";
		$this->endpoint = 'teamsfranchises';
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
	public function it_should_show_teamfranchises()
	{
		$response = $this->login()
			->get('/api/v1/' .$this->endpoint .'?token=' .$this->token);
		$this->resultShouldHave($response, 'franchID', 'ALT');
		return $this;
	}

	/** @test  */
	public function it_should_create_teamsfranchises()
	{
		$data = $this->createMockTeamFranchies();

		$response = $this->login()
			->post('api/v1/' .$this->endpoint .'?token=' .$this->token, $data);

		$this->assertArrayHasKey("key",$response->getOriginalContent());

		return $response->getOriginalContent()["key"];
	}

	/** @test  */
	public function it_should_delete_teamsfranchises()
	{
		$id = $this->it_should_create_teamsfranchises();
		$response = $this->login()
			->delete('api/v1/' .$this->endpoint .'/' .$id .'?token=mkjbbtrsh10');
		$response->assertStatus(200);

		$this->assertArrayHasKey("key",$response->getOriginalContent());
	}

	/** @test  */
	public function it_should_update_teamfranchise_info()
	{
		$id = $this->it_should_create_teamsfranchises();

		$updateData = ['active' => true];
		$response = $this->login()
			->put('api/v1/'. $this->endpoint .'/'.$id.'?token='.$this->token, $updateData);

		$data = json_decode($response->getContent());
		$response->status(201);
		$this->assertTrue($data->id === (string)$id);

		// cleanup after ourselves
		$this->delete('api/v1/'. $this->endpoint .'/' .$id .'?token=mkjbbtrsh10');

	}

	protected function createMockTeamFranchies() {
		return [
			"franchID" => "OCA",
			"franchName" => "OC Angels",
			"active" => false
		];
	}

}