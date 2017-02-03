<?php

namespace App\Http\Controllers\API;

use App\Models\Batting;
use Illuminate\Http\Request;

class BattingController extends ApiController
{
	// delete - Delete single endpoint
	public function destroy($playerID) {
		$data = Batting::where('playerID', $playerID)
			->where('yearID', $this->yearId)
			->first();
		return json_encode($data);
	}
}
