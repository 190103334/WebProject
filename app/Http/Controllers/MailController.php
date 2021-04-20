<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\DemoEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Models\Patient;

class MailController extends Controller
{
    public function send(){
        $obj = new \stdClass();
        $roles = DB::table('patients')->pluck('email')->last();
        Mail::to($roles)->send(new DemoEmail($obj));
        return redirect('aesthetic');
    }
}
