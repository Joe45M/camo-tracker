<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Notifications\JoinDiscordNotification;
use Illuminate\Console\Command;

class SendDiscordNotificationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-discord-notification-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        foreach (User::all() as $user) {
            $user->notify(new JoinDiscordNotification('Hi! Thanks for using Camo Tracker. It would mean the world to me if you could join the Discord Server.'));
        }
    }
}
