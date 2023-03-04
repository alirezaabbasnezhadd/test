<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;

class SendCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:request';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'script for send 100 request for get turn';


    public function handle()
    {
        $i = 1;
        while ($i <= 100){
            $data = [
                'userid'   => $i,
                'doctorid' => $i,
            ];
            try {
                $response = Http::asJson()->post(URL::to('/').'/send', $data);
                $this->info($response->status());
            }catch (\Exception $e){
                $this->error($e->getMessage());
            };
            $i++;
        }
    }
}
