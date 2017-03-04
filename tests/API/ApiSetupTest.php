<?php

namespace Tests\API;

use Tests\ApiTestCase;
use Lijinma\Color as Color;

class ApiSetupTest extends ApiTestCase
{
    /** @test */
    public function init()
    {
        $repeat     = in_array('--repeat', $_SERVER['argv']);
        $test_suite = in_array('--testsuite', $_SERVER['argv']) ? $_SERVER['argv'][2] : '';

        $LINE    = str_repeat('=', (int)exec('tput cols'));
        $DB_NAME = env('DB_CONNECTION') === 'sqlite' ? env('DB_NAME') : env('DB_DATABASE');

        if (env('APP_DEBUG') && !$repeat) {
            echo "\n"; // do this so the initial test mark is not on same link
            echo Color::CYAN . $LINE . Color::LIGHT_GRAY. PHP_EOL;
            if ($test_suite !== "") {
                echo Color::CYAN ."Test Suite:      " .Color::LIGHT_GREEN .$test_suite       .Color::LIGHT_GRAY. PHP_EOL;
            }
            echo Color::CYAN ."Environment:     " .Color::LIGHT_GREEN .env("APP_ENV")       .Color::LIGHT_GRAY. PHP_EOL;
            echo Color::CYAN ."Log Level:       " .Color::LIGHT_GREEN .env("APP_LOG_LEVEL") .Color::LIGHT_GRAY. PHP_EOL;
            echo Color::CYAN ."DB Connection:   " .Color::LIGHT_GREEN .env("DB_CONNECTION") .Color::LIGHT_GRAY. PHP_EOL;
            echo Color::CYAN ."DB Database:     " .Color::LIGHT_GREEN .$DB_NAME .Color::LIGHT_GRAY. PHP_EOL;
            echo Color::CYAN . $LINE . Color::LIGHT_GRAY. PHP_EOL;
            echo "\n";
        }
    }
}
