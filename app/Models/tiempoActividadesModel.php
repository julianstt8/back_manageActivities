<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tiempoActividadesModel extends Model
{
    use HasFactory;
    protected $table = "mng_tiempos";
    protected $primaryKey = "id_tiempo";
    public $incrementing = true;
    public $timestamps = false;
}
