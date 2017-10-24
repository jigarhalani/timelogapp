<?php

namespace App\Http\Controllers;

use App\Repositories\Lead\LeadInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Mockery\Exception;

class LeadController extends Controller
{
    private $lead;

    public function __construct(LeadInterface $lead){

        $this->middleware('auth');
        $this->lead=$lead;

    }

    public function index()
    {
            return view('admin.lead.add');
    }


    public function save(Request $r){
        try{

            $rules = array(
                'company_url' => 'required|url|unique:leads',
                'country' => 'required',
            );
            $validator = Validator::make($r->all(),$rules);
            if ($validator->fails()){
                return Redirect::back()->withErrors($validator);
            }
            else{
                $this->lead->save($r->all());
                Session::flash('message',[
                    'msg' => 'Added successfully.Thank you!!',
                    'type' =>"alert-success"
                ]);
            }

        }Catch(\Exception $e){
            Session::flash('message',[
                'msg'=>$e->getMessage(),
                'type'=>'alert-danger',
            ]);
        }
        return Redirect::to('lead/add');
    }


    public function view(){
        $leads=$this->lead->getAll();
        return view('admin.lead.view',['leads'=>$leads]);
    }

    public function blocked(){
        $leads=$this->lead->getAll(['is_active'=>'0']);
        return view('admin.lead.view',['leads'=>$leads]);
    }

    public function delete($id){
        try{
            $this->lead->updateStatus($id);
            Session::flash('message',[
                'msg' => 'Deleted successfully.Thank you!!',
                'type' =>"alert-success"
            ]);
        }catch (\Exception $e){

            Session::flash('message',[
                'msg'=>$e->getMessage(),
                'type'=>'alert-danger',
            ]);

        }

        return Redirect::back();

    }


    public function edit($id){

        try{
            $lead=$this->lead->getById($id);
            if($lead==null)
                throw  new \Exception("Lead Not Found");
                return view('admin.lead.edit',['lead'=>$lead]);
        }catch (\Exception $e){

            Session::flash('message',[
                'msg'=>$e->getMessage(),
                'type'=>'alert-danger',
            ]);
            return Redirect::back();
        }

    }

    public function update($id,Request $r){


        try{

            $rules = array(
                'company_url' => 'required|url|unique:leads,company_url,'.$id,
                'country' => 'required',
            );
            $validator = Validator::make($r->all(),$rules);
            if ($validator->fails()){
                return Redirect::back()->withErrors($validator);
            }
            else{
                $this->lead->update($id,$r->except(['_token']));
                Session::flash('message',[
                    'msg' => 'Updated successfully.Thank you!!',
                    'type' =>"alert-success"
                ]);
            }

        }Catch(\Exception $e){
            Session::flash('message',[
                'msg'=>$e->getMessage(),
                'type'=>'alert-danger',
            ]);
        }
        return Redirect::back();

    }


    public function activate($id){

        try{
            $this->lead->updateStatus($id,['is_active'=>1]);
            Session::flash('message',[
                'msg' => 'Activated successfully.Thank you!!',
                'type' =>"alert-success"
            ]);
        }catch (\Exception $e){

            Session::flash('message',[
                'msg'=>$e->getMessage(),
                'type'=>'alert-danger',
            ]);

        }

        return Redirect::back();
    }

    public function setfollowup(Request $request){
        $requestData = $request->all();
        $requestData['followup_time'] = Carbon::parse($requestData['followup_time'])->toDateTimeString();
        Session::flash('message',[
            'msg' => 'Follow up set successfully .Thank you!!',
            'type' =>"alert-success"
        ]);
        return $this->lead->setfollowup($requestData);
    }

}
