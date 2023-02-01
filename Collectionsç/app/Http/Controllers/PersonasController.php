<?php

namespace App\Http\Controllers;

use App\Models\personas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonasController extends Controller
{
    public function create(Request $request)
    {
        try{

            DB::beginTransaction();
                
            $request->validate([
                'nombre' => 'required',
                'dni'=> 'required',
            ]);
            $per = new Personas();
            $per->nombre = $request->nombre;
            $per->dni = $request->dni;
            $per->save();
            DB::commit();

            return response()->json([
                "status" => 1,
                "msg" => "¡Registro de persona   exitoso!",
            ]);
            
        } catch(\Exception $exp) {

            DB::rollBack();
            return response()->json([
                "status" => 1,
                "msg" => "¡No se a hecho el registro! + $exp",
            ]);
        }
    }

    public function collection(Request $request)
    {
                
            $request->validate([
                'nombre' => 'required',
            ]);

            $personas = Personas::where('nombre','LIKE','%'.$request->nombre.'%')->get();
            $personas = $personas->sortBy('dni');
            foreach ($personas as $per) {
                echo $per;
            }
    }


}
