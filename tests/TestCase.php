<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

	protected function responseShouldHave($response, $key, $value) {
		$this->isJson($response->getContent());
		$data = json_decode($response->getContent())->data;
		$this->assertTrue($data[0]->$key === $value);
	}

	protected function getResponseAsJson($response) {
		return json_decode($response->getContent());
	}

	protected function getResponseAsArray($response) {
		return $response->getOriginalContent();
	}

	protected function login($email = 'mike.erickson@mac.com', $password = 'password')
	{
//		Auth::logout();  // logout just in case
//		Auth::attempt([ 'email' => $email, 'password' => $password]);
		return $this;
	}

	protected function logout()
	{
//		Auth::logout();
		return $this;
	}

}
