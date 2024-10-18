<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Attendance;
// use Carbon\Carbon;

class QRController extends Controller
{
    public function store(Request $request){
        $new_attedance = new Attendance;
        try{
            $new_attedance->student_id = $request -> student_id;
            $new_attedance->fecha = date(now());
            $new_attedance->hora = date('h:i:s');
            $new_attedance->save();
            return true;
        }catch(\Throwable $th){
            echo $th;
            return false;
        }
        // return "Hola";
    }
}
