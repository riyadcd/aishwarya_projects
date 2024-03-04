<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formdata extends Model
{
    use HasFactory;
    protected $table='formdatas';
    
    protected $fillable =["name","email","password","phonenumber"];

}
