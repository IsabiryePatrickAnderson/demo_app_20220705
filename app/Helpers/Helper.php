<?php

namespace App\Http\Helpers;
use Illuminate\Support\Facades\DB;
use Auth;

class Helper
{
     public function get_user($id)
    {
        $user = DB::table('users')->where('id',$id)->first();    
        return $user->name;
    }
}