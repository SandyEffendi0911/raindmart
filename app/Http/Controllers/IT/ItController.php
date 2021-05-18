<?php

namespace App\Http\Controllers\IT;

use App\Http\Controllers\Controller;
use App\Models\User\M_UserMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItController extends Controller
{
    //
    public function index()
    {
        return view('it.it_support');
    }

    public function user_add()
    {
        return view('it.user_add');
    }
}
