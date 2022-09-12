<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Client;
use App\Models\Commande;
use Illuminate\Console\Command;
use App\Notifications\UserNotification;
use App\Notifications\ClientNotification;

class NotifyUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $commands = Commande::whereDate('end' , '>=', Carbon::now())->get();
        
        $commands->each(function ($command){
            $now = Carbon::now();
            $endDate = Carbon::parse($command->end);
            $dateDiff = $endDate->diffInDays($now);

            if($dateDiff <= 30 ){
                $client = $command->client;
                $user = $command->user;
                $client->notify(new ClientNotification($command));
                $user->notify(new UserNotification($command));
            };
        });
    }
}
