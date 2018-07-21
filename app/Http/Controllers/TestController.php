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
        $calanders=$this->lead->getFollowup(Carbon::now()->setTime(0,0), Carbon::now()->setTime(23,59)->addMonth());
        $return_data=[];
        $i=0;
        foreach ($calanders as $calander){

            $return_data[$i]['title']=$calander->lead->name1;
            $return_data[$i]['start']=$calander->followup_time;
            $return_data[$i]['backgroundColor']="#0073b7";
            $return_data[$i]['url']=url('lead/edit/'.$calander->lead->id);
            $return_data[$i++]['borderColor']="#0073b7";
        }
        $data['calander']=$return_data;

        return view('admin.dashboard')->with($data);
    }
}
