<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class actividadesModel extends Model
{
    use HasFactory;
    protected $table = "mng_actividades";
    protected $primaryKey = "id_actividad";
    public $incrementing = true;
    public $timestamps = false;
}
