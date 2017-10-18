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

    public function getAll()
    {
        return $this->lead->where(['is_active'=>'1'])->get();
    }

    public function save($data)
    {
        return $this->lead->create($data);
    }

    public function delete($id)
    {
        return $this->lead->where('id', '=', $id)->update(['is_active'=>0]);
    }

    public function getById($id){
        return $this->lead->where(['is_active'=>'1'])->find($id);
    }

}