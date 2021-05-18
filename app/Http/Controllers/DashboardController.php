<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User\M_UserMenu;
use App\Models\User\M_UserMenuGroup;
use App\Models\User\M_UserMenuSub;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;

class DashboardController extends Controller
{
    //
    protected $forbidden_message = [
        'You dont have Permission Access to this Area !! Please Contact Administrator'
    ];

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('auth.dashboard');
    }

    protected function master()
    {
        return M_UserMenu::select(
            'tb_user_menu_master.kd_menu_master',
            'tb_menu_master.master_menu_title',
            'tb_menu_master.master_menu_link',
            'tb_menu_master.master_menu_icon'
        )
            ->join('tb_menu_master', 'tb_menu_master.kd_master_menu', '=', 'tb_user_menu_master.kd_menu_master')
            ->where('tb_user_menu_master.username', Auth::user()->username)
            ->orderBy('tb_user_menu_master.kd_menu_master', 'asc')
            ->get();
    }

    protected function group()
    {
        return M_UserMenuGroup::select(
            'tb_user_menu_group.kd_menu_group',
            'tb_menu_group.fk_master_menu',
            'tb_menu_group.group_menu_nama',
            'tb_menu_group.group_menu_link'
        )
            ->join('tb_menu_group', 'tb_menu_group.kd_group_menu', '=', 'tb_user_menu_group.kd_menu_group')
            ->where('tb_user_menu_group.username', Auth::user()->username)
            ->orderBy('tb_user_menu_group.kd_menu_group', 'asc')
            ->get();
    }

    protected function sub()
    {
        return M_UserMenuSub::select(
            'tb_user_menu_sub.kd_sub_menu',
            'tb_menu_sub_item.fk_group_menu',
            'tb_menu_sub_item.menu_sub_item_nama',
            'tb_menu_sub_item.menu_sub_item_link'
        )
            ->join('tb_menu_sub_item', 'tb_menu_sub_item.kd_sub_item', '=', 'tb_user_menu_sub.kd_sub_menu')
            ->where('tb_user_menu_sub.username', Auth::user()->username)
            ->orderBy('tb_user_menu_sub.kd_sub_menu', 'asc')
            ->get();
    }
}
