<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class serializationController extends Controller
{
    public function cast()
    {
        $user =Auth::user();
        $user->makeVisible('id');
        $user->makeHidden('name');
        return  $user->toJson();
    }
    public function appends()
    {
        $user = Auth::user();
        return $user->append('is_admin')->toArray();
    }
    
    
}
