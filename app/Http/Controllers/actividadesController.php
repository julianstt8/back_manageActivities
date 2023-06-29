<?php

namespace App\Http\Controllers;

use App\Models\actividadesModel;
use App\Models\tiempoActividadesModel;
use Illuminate\Http\Request;

class actividadesController extends Controller
{
    /** Almacenar actividad y sus tiempos */
    public function save(Request $request)
    {
        try {
            $insertActivities = [
                'id_usuario' => +$request->id_usuario,
                'descripcion' => $request->descripcion
            ];
            actividadesModel::insert($insertActivities);
            $last = actividadesModel::latest('id_actividad')->first();

            $tiempo = json_decode($request->tiempo);
            foreach ($tiempo as $key => $value) {
                $insertTime = [
                    'id_actividad' => $last->id_actividad,
                    'fecha' => $tiempo[$key]->fecha,
                    'tiempo_gastado' => +$tiempo[$key]->tiempo
                ];
                tiempoActividadesModel::insert($insertTime);
            }
            return response()->json(['status' => 1]);
        } catch (\Throwable $th) {
            if ($th->getMessage() !== null) {
                return response()->json(['status' => 0, 'message' => $th->getMessage() . " en la línea " . $th->getLine()]);
            } else {
                return response()->json(['status' => 0, 'message' => $th]);
            }
        }
    }

    /* consulta actividades del usuarios */
    public function getActivities(Request $request)
    {
        try {
            $activities = actividadesModel::where('id_usuario', +$request->id_usuario)->select()
                ->leftJoin('mng_tiempos', 'mng_tiempos.id_actividad', '=', 'mng_actividades.id_actividad')
                ->orderBy('mng_actividades.descripcion')
                ->get();
            return response()->json(['status' => 1, 'data' => $activities]);
        } catch (\Throwable $th) {
            if ($th->getMessage() !== null) {
                return response()->json(['status' => 0, 'message' => $th->getMessage() . " en la línea " . $th->getLine()]);
            } else {
                return response()->json(['status' => 0, 'message' => $th]);
            }
        }
    }
}
