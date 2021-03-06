<?php

namespace Tests\API;

use Tests\ApiTestCase;

class Heartbeat extends ApiTestCase
{
	protected $validEndpoints;

	public function __construct()
	{
		parent::__construct();

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
}