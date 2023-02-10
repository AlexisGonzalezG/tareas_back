<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class tareas_controller extends Controller
{
    
    public function consulta_tareas(Request $request){

        $tareas = DB::table('tareas')
                ->where([
                    ['id_usuario', $request['id_usuario']],
                    ['estatus',1]
                    ])
                ->get();

        if(count($tareas) > 0) return [
            'tareas' => $tareas,
            'ok' => 100
        ];
        else return ['ok' => 0];
    }

    public function modifica_tarea(Request $request){

        $update = DB::table('tareas')
              ->where('id',$request['id'])
              ->update(['tarea' => $request['tarea']]);

        if($update) return [
            'update' => $update,
            'ok' => 100
        ];
        else return ['ok' => 0];
    }

    public function elimina_tarea(Request $request){

        $update = DB::table('tareas')
              ->where('id',$request['id'])
              ->update(['estatus' => 0 ]);

        if($update) return [
            'update' => $update,
            'ok' => 100
        ];
        else return ['ok' => 0];
    }

    public function agrega_tarea(Request $request){

     $insert = DB::table('tareas')->insert(
            [
            'id_usuario' => $request['id_user'], 
            'tarea' => $request['tarea']
            ]
        );

        if($insert) return [
            'insert' => $insert,
            'ok' => 100
        ];
        else return ['ok' => 0];
    }

}
