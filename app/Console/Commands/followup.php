<?php

namespace App\Console\Commands;

use App\Mail\Followupnotification;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Repositories\Lead\LeadInterface;
class followup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'followup:notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send notification to user for meeting';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Mail $mail,LeadInterface $lead)
    {
        parent::__construct();
        $this->mail=$mail;
        $this->lead=$lead;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $data['today']=$this->lead->getFollowup(Carbon::now()->setTime(0,0), Carbon ::now()->setTime(23,59));
        if(count($data['today'])>0)
                 Mail::to("jaimin.abhicenation@gmail.com")->send(new Followupnotification($data));
    }
}
