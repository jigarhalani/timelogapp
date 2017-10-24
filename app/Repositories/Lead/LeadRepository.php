<?php
/**
 * Created by PhpStorm.
 * User: Abhicenation
 * Date: 10/17/2017
 * Time: 12:36 PM
 */

namespace App\Repositories\Lead;

use App\Followup;
use App\Lead;

class LeadRepository implements LeadInterface{

    public $lead;
    public $followup;

    function __construct(Lead $lead , Followup $followup)
    {
        $this->lead=$lead;
        $this->followup=$followup;
    }

    public function getAll($where=['is_active'=>'1'])
    {
        return $this->lead->where($where)->get();
    }

    public function save($data)
    {
        return $this->lead->create($data);
    }

    public function updateStatus($id,$status=['is_active'=>0])
    {
        return $this->lead->where('id', '=', $id)->update($status);
    }

    public function getById($id){
        return $this->lead->find($id);
    }

    public function update($id,$data){
        return $this->lead->where('id', '=', $id)->update($data);
    }

    public function setfollowup($data){
        return $this->followup->create($data);
    }

}