<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use DB;

class TimeController extends Controller
{
    //
    public function index()
    {
        //DB::reconnect('project');  
        DB::insert('insert into time (id, name, ip, time) values (?, ?, ? , ? )',
        [7, 'beijing','123.3.4.6','1000']);
        DB::insert('insert into time (id, name, ip, time) values (?, ?, ?, ? )',
        [9, 'shanghai','212.1.2.6','2000']);
     
        /*
        $user = DB::select('select * from time where id = ?', [1]);
        return $user;
        */
        return "ok..."; 
    }
}

