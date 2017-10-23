<?php
/**
 * Created by PhpStorm.
 * User: Abhicenation
 * Date: 10/17/2017
 * Time: 12:36 PM
 */

namespace App\Repositories\Lead;

use App\Lead;

class LeadRepository implements LeadInterface{

    public $lead;

    function __construct(Lead $lead)
    {
        $this->lead=$lead;
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

}