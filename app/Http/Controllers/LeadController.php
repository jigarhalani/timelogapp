<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LeadController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
            return view('admin.lead.add');
    }
}
