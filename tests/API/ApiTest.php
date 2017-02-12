<?php

namespace Tests\API;

use App\Models\APIToken;
use Tests\ApiTestCase;

class ApiTest extends ApiTestCase
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

	public function test_api_info_page()
	{
		$response = $this->get('/info');

		$response->assertStatus(200);
		foreach ($this->validEndpoints as $endpoint) {
			$response->assertSee($endpoint);
		}
	}

	public function test_api_root_endpoint()
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

	public function test_api_has_debug()
	{
		$response = $this->get('/api/v1/batting?debug=true&limit=1&token=mkjbbtrsh10');
		$this->assertArrayHasKey('debug',$response->getOriginalContent());
	}

	public function test_api_does_not_have_debug()
	{
		$response = $this->get('/api/v1/batting_limit=1');
		$this->assertArrayNotHasKey('debug',$response->getOriginalContent());
	}

	public function test_has_valid_token()
	{
		$response = $this->get('api/v1/batting?token=mkjbbtrsh10&_limit=1&debug=true');
		$data     = $response->getOriginalContent();
		$token    = $data['debug']['api_token'];
		$result   = APIToken::where('token', '=', $token)->first();

		$this->assertTrue($result->token === $token);
	}

	/** @test */
	public function it_should_test_rate_limit()
	{
		$request_limit = 60;
		for ($x = 1; $x <= $request_limit + 1; $x++) {
			$response = $this->get('/api/v1/batting?token=mkjbbtrsh10&limit=1');
			if($response) {
				$data = $response->getOriginalContent();
				if(gettype($data) === 'string') {
					$this->assertTrue($data === 'Too Many Attempts.');
				}
			}
		}
	}
	
}