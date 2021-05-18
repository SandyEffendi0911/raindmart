<?php

use \App\Models\User\M_UserMenu;
use \App\Models\User\M_UserMenuGroup;
use \App\Models\User\M_UserMenuSub;
use Illuminate\Support\Facades\Auth;

$master = M_UserMenu::select(
    'tb_user_menu_master.kd_menu_master',
    'tb_menu_master.master_menu_title',
    'tb_menu_master.master_menu_link',
    'tb_menu_master.master_menu_icon'
)
    ->join('tb_menu_master', 'tb_menu_master.kd_master_menu', '=', 'tb_user_menu_master.kd_menu_master')
    ->where('tb_user_menu_master.username', Auth::user()->username)
    ->orderBy('tb_user_menu_master.kd_menu_master', 'asc')
    ->get();

    $group = M_UserMenuGroup::select(
        'tb_user_menu_group.kd_menu_group',
        'tb_menu_group.fk_master_menu',
        'tb_menu_group.group_menu_nama',
        'tb_menu_group.group_menu_link'
    )
        ->join('tb_menu_group', 'tb_menu_group.kd_group_menu', '=', 'tb_user_menu_group.kd_menu_group')
        ->where('tb_user_menu_group.username', Auth::user()->username)
        ->orderBy('tb_user_menu_group.kd_menu_group', 'asc')
        ->get();

        $sub = M_UserMenuSub::select(
            'tb_user_menu_sub.kd_sub_menu',
            'tb_menu_sub_item.fk_group_menu',
            'tb_menu_sub_item.menu_sub_item_nama',
            'tb_menu_sub_item.menu_sub_item_link'
        )
            ->join('tb_menu_sub_item', 'tb_menu_sub_item.kd_sub_item', '=', 'tb_user_menu_sub.kd_sub_menu')
            ->where('tb_user_menu_sub.username', Auth::user()->username)
            ->orderBy('tb_user_menu_sub.kd_sub_menu', 'asc')
            ->get();
?>

<aside id="sidebar_main">

    <div class="sidebar_main_header">
        <div class="sidebar_logo">
            <a href="index.html" class="sSidebar_hide"><img src="{{ asset('public/assets/img/logo_main.png') }}" alt="" height="15" width="71" /></a>
            <a href="index.html" class="sSidebar_show"><img src="{{ asset('public/assets/img/logo_main_small.png') }}" alt="" height="32" width="32" /></a>
        </div>

    </div>

    <div class="menu_section">
        <ul id="menu_id">
            <li class="current_section" title="Dashboard">
                <a href="{{ route('home') }}">
                    <span class="menu_icon"><i class="material-icons">dashboard</i></span>
                    <span class="menu_title">Dashboard</span>
                </a>
            </li>
            <?php
            foreach ($master as $master) {
                $kd_menu_master = $master->kd_menu_master;
            ?>
                <li title="{{ $master->master_menu_title }} ">
                    <a href="{{ $master->master_menu_link }} ">
                        <span class="menu_icon"><i class="material-icons">{{ $master->master_menu_icon }}</i></span>
                        <span class="menu_title">{{ $master->master_menu_title }} </span></a>
                    <ul>
                        <?php
                        foreach ($group as $groups) {
                            $kd_master_menu = $master->kd_menu_master;
                            if ($kd_master_menu == $groups->fk_master_menu) {
                        ?>
                                <li onclick="myFunction(' {{ $groups->kd_menu_group }} ')">
                                    <script type="text/javascript">
                                        function myFunction(myDiv) {
                                            var x = document.getElementsByClassName(myDiv);
                                            var i;
                                            for (i = 0; i < x.length; i++) {
                                                if (x[i].style.display == "none") {
                                                    x[i].style.display = "block";
                                                } else {
                                                    x[i].style.display = "none";
                                                }
                                            }
                                        }
                                    </script>
                                    <a href="{{url($groups->group_menu_link)}}">{{ $groups->group_menu_nama }}
                                    </a>
                                    <?php
                                    foreach ($sub as $subs) {
                                        $fk_group_menu = $groups->kd_menu_group;
                                        if ($fk_group_menu == $subs->fk_group_menu) {
                                    ?>
                                            <ul style="display:none;" class="{{ $groups->kd_menu_group }}">
                                                <li id="{{ $subs->kd_sub_menu }}">
                                                    <a href="{{url($subs->menu_sub_item_link)}}">
                                                        {{ $subs->menu_sub_item_nama }}
                                                    </a>
                                                </li>
                                            </ul>
                                    <?php
                                        }
                                    }
                                    ?>
                                </li>

                        <?php
                            }
                        }
                        ?>
                    </ul>
                </li>
            <?php
            }
            ?>
            <li title="Logout">
                <a href="{{ route('logout') }}">
                    <span class="menu_icon"><i class="material-icons">exit_to_app</i></span>
                    <span class="">Exit</span>
                </a>
            </li>
    </div>
</aside>