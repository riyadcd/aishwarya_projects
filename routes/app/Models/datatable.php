<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datatable extends Model
{
    use HasFactory;
    protected $table='datatables';
    
    protected $fillable =["Firstname","Lastname","email","phonenumber"];
}
