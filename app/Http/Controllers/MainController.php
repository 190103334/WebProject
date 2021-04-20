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

        $request->validate([
            'full_name'=>'required',
            'phone_number'=>'required',
            'email'=>'required|email',
            'id_card_image'=>'required'
        ]);
         
        $patient = new Patient();
        $services = new Services();

        $patient->full_name = $request->input('full_name');
        $patient->email = $request->input('email');
        $patient->phone_number = $request->input('phone_number');

       
        if($request->hasFile('id_card_image')){
            $file = $request->file('id_card_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('project/images' , $filename);
            $patient->id_card_image = $filename;
            $patient->save();
        }

        $db = DB::table('patients')->pluck('id')->last();
        $services->patient_id = $db;
        $services->save();

        return redirect('email/sending');
    }
}
