<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tiposanimal;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class tiposcontroller extends Controller
{
    public function registrartipos(Request $request)
    {
        $validData = $request->validate([
            'tipo' => 'required|string|max:255',
            'eliminado' => 'required|string|max:255',
            
          
        ]);
            tiposanimal::create([
            'tipo' => $validData['tipo'],
            'eliminado' => $validData['eliminado'],
            'state' =>1,
        ]);
        return response()->json(['message' => 'tipo de animal registrado'], 201);
    }

    public function actualizartipos(Request $request, $id)
    {
        $tipo = tiposanimal::find($id);
        if (is_null($tipo)) {
            return response()->json(['message' => 'tipo no encontrado'], 404);
        }
        $validateData = $request->validate([
            'tipo' => 'required|string|max:255',
            'eliminado' => 'required|string|max:255',
            
        ]);





        /* holaaaaaaaaaaaaa */
        $tipo->tipo = $validateData['tipo'];
        $tipo->eliminado = $validateData['eliminado'];
        $tipo->save();
        return response()->json(['message' => 'tipo de animal actualizado'], 201);
    }
    
    public function eliminartipo($id)
    {
        $tipo = tiposanimal::find($id);
        if (is_null($tipo)) {
            return response()->json(['message' => 'tipo no encontrado'], 404);
        }
        $tipo->state = 0;
        $tipo->save();
        return response()->json(['message' => 'tipo de animal eliminado'], 200);
    }
    public function mostrartipos()
    {
        $tipo = tiposanimal::all();
        return response()->json($tipo, 200);
    }
}
