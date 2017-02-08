<?php

namespace Tests;

/**
 * Class ApiTestCase
 * @package Tests
 */
abstract class ApiTestCase extends TestCase
{
	/**
	 * ApiTestCase constructor.
	 */
	public function __construct()
	{
	}

	/**
	 * @param $response
	 * @param $key
	 * @param $value
	 */
	protected function responseShouldHave($response, $key, $value) {
		$this->isJson($response->getContent());
		$data = json_decode($response->getContent())->data;
		$this->assertTrue($data[0]->$key === $value);
	}

	/**
	 * @param $response
	 * @return mixed
	 */
	protected function getResponseAsJson($response) {
		return json_decode($response->getContent());
	}

	/**
	 * @param $response
	 * @return mixed
	 */
	protected function getResponseAsArray($response) {
		return $response->getOriginalContent();
	}

	/**
	 * @param string $email
	 * @param string $password
	 * @return $this
	 */
	protected function login($email = '', $password = '')
	{
//		Auth::logout();  // logout just in case
//		Auth::attempt([ 'email' => $email, 'password' => $password]);
		return $this;
	}

	/**
	 * @return $this
	 */
	protected function logout()
	{
//		Auth::logout();
		return $this;
	}

	/**
	 * @param $testValue
	 * @param $actualValue
	 * @return bool
	 */
	protected function assertIsMatch($testValue, $actualValue)
	{
		$value = $actualValue;
		if(env('DB_CONNECTION') === 'sqlite') {
			$value = (string)$actualValue;
		}
		return $testValue === $value;
	}

}


