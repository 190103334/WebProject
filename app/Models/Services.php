<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;
 
    protected $table = "services";
    protected $fillable = ['type', 'patient_id'];

    public function index(){
        return $this->belongsTo(Patient::class);
    }
}
