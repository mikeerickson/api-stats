<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ApiTest extends TestCase
{
	public function __construct($name = null, array $data = [], $dataName = '')
	{
		parent::__construct($name, $data, $dataName);
	}

	public function test_root_api_endpoint()
	{
		$response = $this->get('/api');

		$response->assertStatus(501);
	}

	public function test_api_version()
	{
		$response = $this->get('/api/v1');

		$response->assertStatus(501);
		$response->assertSee('API Access Requires Endpoint');
	}

	public function test_api_players()
	{
		$response = $this->get('/api/v1/players?token=mkjbbtrsh10');
		$data = json_decode($response->getContent());
		$this->isJson($response->getContent());
		$this->assertTrue($data[0]->nameFirst === "David");
	}
}