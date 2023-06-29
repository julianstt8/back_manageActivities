<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class loginModel extends Model
{
    use HasFactory;
    protected $table = "mng_usuarios";
    protected $primaryKey = "id_usuario";
    public $incrementing = true;
    public $timestamps = false;
}
