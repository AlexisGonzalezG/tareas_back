<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;

class user_controller extends Controller
{
    
    public function newUser(Request $request){

        $insert = DB::table('users')
        ->insert([
                'name' => $request['name'],
                'password' => Hash::make($request['password'])
                ]); 

        if($insert) 
        return ['ok' => 100];
        else 
        return ['ok' => 0];

    }

    public function consulta_sesion(Request $request){

        $sesion = DB::table('sesion as ss')
                    ->join('users as us', 'us.id', '=', 'ss.id_user')
                    ->where([
                    ['ss.estatus',1]
                    ])
                ->get();

        if(count($sesion) > 0) return [
            'sesion' => $sesion,
            'ok' => 100
        ];
        else return ['ok' => 0];
    }

    public function out(Request $request){

        $update = DB::table('sesion')
              ->update(['estatus' => 0 ]);

        if($update) return [
            'update' => $update,
            'ok' => 100
        ];
        else return ['ok' => 0];
    }
}
