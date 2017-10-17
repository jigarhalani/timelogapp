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
        return $this->lead->getAll();
    }

    public function save($data)
    {
        return $this->lead->create($data);
    }
}