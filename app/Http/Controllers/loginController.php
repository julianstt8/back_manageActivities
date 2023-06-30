<?php

namespace App\Http\Controllers;

use App\Models\loginModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class loginController extends Controller
{
    /** Inicio de sesión */
    public function validateUser(Request $request)
    {
        try {
            $statusUser = loginModel::where('usuario', $request->usuario)
                ->where('contraseña', $request->contraseña)
                ->get();
            return response()->json(['status' => count($statusUser) > 0 ? 1 : 0, 'data' => [$statusUser[0]['id_usuario'], $statusUser[0]['nombre_completo']]]);
        } catch (\Throwable $th) {
            if ($th->getMessage() !== null) {
                return response()->json(['status' => 0, 'message' => $th->getMessage() . " en la línea " . $th->getLine()]);
            } else {
                return response()->json(['status' => 0, 'message' => $th]);
            }
        }
    }

    /** Se crea el usuario */
    public function createUser(Request $request)
    {
        try {
            $exists = loginModel::where('usuario', $request->usuario)
                ->exists();
            if (!$exists) {
                $insertUser = [
                    'usuario' => $request->usuario,
                    'contraseña' => $request->contraseña,
                    'nombre_completo' => $request->nombre_completo,
                ];
                $status = loginModel::insert($insertUser);
                return response()->json(['status' => 1]);
            }
            return response()->json(['status' => 2]);
        } catch (\Throwable $th) {
            if ($th->getMessage() !== null) {
                return response()->json(['status' => 0, 'message' => $th->getMessage() . " en la línea " . $th->getLine()]);
            } else {
                return response()->json(['status' => 0, 'message' => $th]);
            }
        }
    }
}
