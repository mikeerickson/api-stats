<?php

namespace Tests\API;

use Tests\ApiTestCase;
use Lijinma\Color as Color;

class ApiSetupTest extends ApiTestCase
{
	/** @test */
	function init()
	{
		$test_suite = "";
		if ($ret = in_array('--testsuite', $_SERVER['argv'])) {
			$test_suite = $_SERVER['argv'][2];
		}

		$LINE    = "===========================================================================";
		$DB_NAME = env('DB_CONNECTION') === 'sqlite' ? env('DB_NAME') : env('DB_DATABASE');

		if(env('APP_DEBUG')) {
			echo "\n"; // do this so the initial test mark is not on same linke
			echo Color::CYAN . $LINE . Color::LIGHT_GRAY. PHP_EOL;
			if($test_suite !== "") {
				echo Color::CYAN ."Test Suite:      " .Color::WHITE .$test_suite       .Color::LIGHT_GRAY. PHP_EOL;
			}
			echo Color::CYAN ."Environment:     " .Color::WHITE .env("APP_ENV")       .Color::LIGHT_GRAY. PHP_EOL;
			echo Color::CYAN ."Log Level:       " .Color::WHITE .env("APP_LOG_LEVEL") .Color::LIGHT_GRAY. PHP_EOL;
			echo Color::CYAN ."DB Connection:   " .Color::WHITE .env("DB_CONNECTION") .Color::LIGHT_GRAY. PHP_EOL;
			echo Color::CYAN ."DB Database:     " .Color::WHITE .$DB_NAME .Color::LIGHT_GRAY. PHP_EOL;
			echo Color::CYAN . $LINE . Color::LIGHT_GRAY. PHP_EOL;
			echo "\n";

		}
	}
}