<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Cache;

class CacheViewer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cd:cache-viewer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cache Viewer';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $headers = ['Key','Value','Expiration'];
        $cache   = Cache::all()->toArray();
        foreach ($cache as &$item) {
            $item['key']        = substr($item['key'], 0, 25);
            $item['key']        = str_replace('laravel', '', $item['key']);
            $item['value']      = substr(decrypt($item['value']), 0, 125);
            $item['expiration'] = date("Y-m-d g:i A", $item['expiration']);
        }
        $this->info('');
        $this->table($headers, $cache);
    }
}
