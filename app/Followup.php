<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Followup extends Model
{
    protected $fillable = ['lead_id','followup_time','notes','created_at','updated_at'];


    public function lead(){
        return $this->hasOne('App\Lead','id','lead_id');
    }
}
