<?php
/**
 * Created by PhpStorm.
 * User: mikee
 * Date: 2/9/17
 * Time: 10:35 AM
 */

namespace Tests\API;

use Tests\ApiTestCase;
use Lijinma\Color as Color;

class ApiSetupTest extends ApiTestCase
{
	/** @test */
	function init()
	{
		$LINE    = "===========================================================================";
		$DB_NAME = env('DB_CONNECTION') === 'sqlite' ? env('DB_NAME') : env('DB_DATABASE');

		if(env('APP_DEBUG')) {
			echo "\n"; // do this so the initial test mark is not on same linke
			echo Color::CYAN . $LINE . Color::LIGHT_GRAY. PHP_EOL;
			echo Color::CYAN ."Environment:   " .env("APP_ENV") .Color::LIGHT_GRAY. PHP_EOL;
			echo Color::CYAN ."Log Level:     " .env("APP_LOG_LEVEL") .Color::LIGHT_GRAY. PHP_EOL;
			echo Color::CYAN ."DB Connection: " .env("DB_CONNECTION") .Color::LIGHT_GRAY. PHP_EOL;
			echo Color::CYAN ."DB Database:   " .$DB_NAME .Color::LIGHT_GRAY. PHP_EOL;
			echo Color::CYAN . $LINE . Color::LIGHT_GRAY. PHP_EOL;
			echo "\n";
		}
	}
}