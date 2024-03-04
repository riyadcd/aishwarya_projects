<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dummy extends Model
{
    use HasFactory;
    protected $table='dummies';
    
    protected $fillable =["Firstname","Lastname","email","phonenumber"];

}
