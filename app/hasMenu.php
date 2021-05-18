<?php

namespace App;

use App\Models\M_Menu;
use App\Models\M_MenuGroup;
use App\Models\M_MenuItem;
use App\Models\User\M_UserMenu;
use App\Models\User\M_UserMenuGroup;
use App\Models\User\M_UserMenuSub;
use Illuminate\Support\Facades\Route;

/**
 * ini trait untuk model user untuk pengecekan akses ke menu
 */
trait hasMenu
{
    protected $blacklist = [];

    public function getIsAllowedAttribute()
    {
        $sub = $this->hasAccess(
            [M_MenuItem::class, 'menu_sub_item_link'],
            [M_UserMenuSub::class],
            ['kd_sub_item', 'kd_sub_menu']
        );

        $grb = $this->hasAccess(
            [M_MenuGroup::class, 'group_menu_link'],
            [M_UserMenuGroup::class],
            ['kd_menu_group', 'kd_group_menu']
        );

        $mtr = $this->hasAccess(
            [M_Menu::class, 'master_menu_link'],
            [M_UserMenu::class],
            ['kd_menu_master', 'kd_master_menu']
        );

        return $sub && $grb && $mtr;
    }

    public function hasAccess(array $list, array $user, array $relate)
    {
        [$masterTable, $masterColumn] = $list;

        if (
            $masterTable::where(
                $masterColumn,
                $link = Route::current()->uri()
            )->doesntExist()
        ) {
            return true;
        }

        [$userTable, $username] = $user + [null, 'username'];

        [$foreign, $primary] = $relate;

        $menu_lists = $userTable::leftJoin($masterTable::getTableName(), $foreign, $primary)
            ->where($username, $this->username)
            ->where($masterColumn, $link)
            ->exists();

        return $menu_lists;
    }
}
