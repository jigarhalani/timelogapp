<?php

namespace App\Http\Controllers;

use App\Repositories\Lead\LeadInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TestController extends Controller
{
    private $lead;

    public function __construct(LeadInterface $lead){
        $this->lead=$lead;
    }
    public function index() {
        $data['today']=$this->lead->getFollowup(Carbon::now()->setTime(0,0), Carbon::now()->setTime(23,59));
        $data['nextweek']=$this->lead->getFollowup(Carbon::now()->setTime(0,0)->addDay(1), Carbon::now()->setTime(23,59)->addDay(1)->addWeek());
        return view('admin.dashboard')->with($data);
    }
}
