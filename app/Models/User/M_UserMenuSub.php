<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_UserMenuSub extends Model
{
    use HasFactory;
    protected $connection = 'pgsql';
    protected $table = 'public.tb_user_menu_sub';

    public $incrementing = false;
    // protected $hidden = [''];


    public $keyType = 'string';

    public static $snakeAttributes = false;

    protected $casts = [
        // "id" => "int"

    ];
}
