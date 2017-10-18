<?php

namespace App\Http\Controllers;

use App\Repositories\Lead\LeadInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

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


    public function delete($id){
        try{
            $this->lead->delete($id);
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

        return Redirect::to('lead/view');

    }


    public function edit($id){

        try{
            $lead=$this->lead->getById($id);
            return view('admin.lead.edit',['lead'=>$lead]);
        }catch (\Exception $e){

            Session::flash('message',[
                'msg'=>$e->getMessage(),
                'type'=>'alert-danger',
            ]);
            return Redirect::to('lead/view');
        }

    }

    public function update(){

    }


}
