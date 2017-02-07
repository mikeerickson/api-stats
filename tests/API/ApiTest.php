<?php

namespace Tests\API;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Tests\ApiTestCase;

class ApiTest extends ApiTestCase
{
	protected $validEndpoints;
	public function __construct($name = null, array $data = [], $dataName = '')
	{
		parent::__construct($name, $data, $dataName);

		$this->validEndpoints = [
			'Players',
			'Batting',
			'Pitching',
			'Fielding',
			'Managers',
			'Parks',
			'Teams'
		];
	}

	public function test_api_home_page()
	{
		$response = $this->get('/');
		$response->assertSee('API Stats');
		$response->assertSee('Endpoints');
	}

	public function test_api_info_page()
	{
		$response = $this->get('/info');

		$response->assertStatus(200);
		foreach ($this->validEndpoints as $endpoint) {
			$response->assertSee($endpoint);
		}
	}

	public function test_root_api_endpoint()
	{
		$response = $this->get('/api');

		$response->assertStatus(501);
		$response->assertSee('API Access Requires Endpoint');
	}

	public function test_api_version()
	{
		$response = $this->get('/api/v1');

		$response->assertStatus(501);
		$response->assertSee('API Access Requires Endpoint');
	}
}