<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Models\Website;
use App\Models\Subscription;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use App\Notifications\PostCreatedNotification;

class SendMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendmail:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        $websites = Website::all();

        foreach ($websites as $website) {
            $post = Post::where('website_id', $website->id)->first();
            $subscribers = DB::table('user_website')->where('website_id',  $post->id)->get();
            // dd($subscribers);
            foreach ($subscribers as $sub) {
                if ($sub) {
                    Notification::send($subscribers,  new PostCreatedNotification($post));
                }
                return "already Subscribed";
            }
        }
    }
}
