<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_MenuItem extends Model
{
    use HasFactory;
    protected $connection = 'pgsql';
    protected $table = 'public.tb_menu_sub_item';

    public $incrementing = false;
    // protected $hidden = [''];


    public $keyType = 'string';

    public static $snakeAttributes = false;

    protected $casts = [
        // "id" => "int"

    ];

    public static function getTableName(){
        return with(new static)->getTable();
    }
}
