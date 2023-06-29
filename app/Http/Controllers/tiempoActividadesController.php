<?php

namespace App\Http\Controllers;

use App\Models\tiempoActividadesModel;
use Illuminate\Http\Request;

class tiempoActividadesController extends Controller
{
    /** Almacenar actividad */
    public function save(Request $request)
    {
        try {
            $insert = [
                'id_usuario' => +$request->id_usuario,
                'descripcion' => $request->descripcion
            ];
            tiempoActividadesModel::insert($insert);
            return response()->json(['status' => 1]);
        } catch (\Throwable $th) {
            if ($th->getMessage() !== null) {
                return response()->json(['status' => 0, 'message' => $th->getMessage() . " en la línea " . $th->getLine()]);
            } else {
                return response()->json(['status' => 0, 'message' => $th]);
            }
        }
    }

    /** Actualizar actividad */
    public function update(Request $request)
    {
        try {
            $parametrization = tiempoActividadesModel::insert();
            return response()->json(['status' => 1, 'message' => $parametrization]);
        } catch (\Throwable $th) {
            if ($th->getMessage() !== null) {
                return response()->json(['status' => 0, 'message' => $th->getMessage() . " en la línea " . $th->getLine()]);
            } else {
                return response()->json(['status' => 0, 'message' => $th]);
            }
        }
    }

    /** Eliminar actividad */
    public function delete(Request $request)
    {
        try {
            $res = tiempoActividadesModel::where('id_actividad', $request->id)->delete();
            return response()->json(['status' => 1, 'message' => $res]);
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
            $activities = tiempoActividadesModel::where('id_usuarios', $request->id)->get();
            return response()->json(['status' => 1, 'message' => $activities]);
        } catch (\Throwable $th) {
            if ($th->getMessage() !== null) {
                return response()->json(['status' => 0, 'message' => $th->getMessage() . " en la línea " . $th->getLine()]);
            } else {
                return response()->json(['status' => 0, 'message' => $th]);
            }
        }
    }
}
