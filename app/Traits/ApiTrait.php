<?php namespace App\Traits;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

trait ApiTrait
{
    private $teams = ['LAA','LAN'];

    public function getTeams()
    {
        $data = null;
        if (Cache::has('team_ids')) {
            $data = Cache::get('team_ids');
        }
        if (!$data) {
            $data = DB::table('teams')
                ->select('teamID')
                ->where('yearID', 2015)
                ->orderBy('teamID')
                ->pluck('teamID');

            $data = implode(',', $data->toArray());
            Cache::add('team_ids', $data, 60);
        }

        return $data;
    }

    public function getBaseRules()
    {
        return [
            'playerID' => 'required',
            'yearID'   => 'required|in:2015',
            'lgID'     => 'required|in:AL,NL',
            'teamID'   => 'required|in:' . $this->getTeams()
        ];
    }

    public function getBaseMessages()
    {
        return [
            'yearID.in' => 'The yearID must be 2015',
            'lgID.in'   => 'The lgID must be `AL` or `NL`',
        ];
    }
}
