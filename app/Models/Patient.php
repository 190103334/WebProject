<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $table = "patients";
    protected $fillable = ['full_name', 'email', 'id_card_image'];
    
    public function index(){
        return $this->hasMany(Services::class);
    }
}
