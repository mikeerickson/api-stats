<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApiTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('api_tokens', function (Blueprint $table) {
			$table->increments('id');
			$table->string('user_name');
			$table->string('email')->unique();
			$table->string('token');
			$table->boolean('active');
			$table->timestamp('expires');
			$table->timestamps();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::dropIfExists('api_tokens');
    }
}
