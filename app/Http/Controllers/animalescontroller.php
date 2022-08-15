<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\animales;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class animalescontroller extends Controller
{
    public function registraranimales(Request $request)
    {
      
        $validData = $request->validate([
            'nombre' => 'required|string|max:255',
            'eliminado' => 'required|string|max:255',
            'imagen'=> 'required|image|mimes:jpg,jpeg,png,gif',
            'id_tiposanimal'=>'required'
        ]);
      
        $validData['imagen']=$request->file('imagen')->getClientOriginalName();
        $request->file('imagen')->storeAs('public/animales',$validData['imagen']);
      
        equipos::create([
            'nombre' => $validData['nombre_equipo'],
            'eliminado' => $validData['nombre_dt'],
            'id_tiposanimal' => $validData['id_tiposanimal'],
            'imagen' => $validData['imagen']

          
        ]);
        return response()->json(['message' => 'animal registrado'], 201);
    }

    public function actualizaranimales(Request $request, $id)
    {
        $animal = animales::find($id);
        if (is_null($animal)) {
            return response()->json(['message' => 'animal no encontrado'], 404);
        }
        $validateData = $request->validate([
            'nombre' => 'required|string|max:255',
            'eliminado' => 'required|string|max:255',
            'imagen'=> 'required|image|mimes:jpg,jpeg,png,gif',
            'id_tiposanimal'=>'required'
        ]);
        $animal->nombre = $validateData['nombre'];
        $animal->eliminado = $validateData['eliminado'];
        $animal-> imagen = $validateData['imagen'];
        $animal->id_tiposanimal= $validateData['id_tiposanimal'];
        $animal->save();
        return response()->json(['message' => 'animal actualizado'], 201);
    }
    
    public function eliminaranimales($id)
    {
        $animal = animales::find($id);
        if (is_null($animal)) {
            return response()->json(['message' => 'equipo no encontrado'], 404);
        }
        $animal->state = false;
        $animal->save();
        return response()->json(['message' => 'animal eliminado'], 200);
    }

    public function mostraranimales()
    {
        $animal = animales::all();
        return response()->json($animal, 200);
    }
}
