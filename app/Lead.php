<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = ['name1', 'name2','company_url' ,'company_name','contact_no1','contact_no2','email1', 'email2', 'created_at', 'updated_at','country'];
}
