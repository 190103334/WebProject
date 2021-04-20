<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Services;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    function index(){
        $post = Patient::all()->index;
        return $post;
    }

    public function save(Request $request){
        $patient = new Patient();
        $services = new Services();

        $patient->full_name = $request->input('full_name');
        $patient->email = $request->input('email');
       

        $services->type = $request->input('second');
       
        if($request->hasFile('id_card_image')){
            $file = $request->file('id_card_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('project/images' , $filename);
            $patient->id_card_image = $filename;
        }else{
            return '<h1 style = "text-align:center;">Please upload a file:( press <a href="http://127.0.0.1:8000/user/form">here</a> to go to the page</h1>';
        }

        $patient->save();

        $db = DB::table('patients')->pluck('id')->last();
        $services->patient_id = $db;
        $services->save();

        return redirect('/index');
    }
}
