<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addtocart extends Model
{
    use HasFactory;
    protected $table='addtocarts';
    
    protected $fillable =["loginid","productid","productprice","productquantity","size","color","shade"];

    function getproduct()
    {
        return $this->hasOne('App\Models\addProduct','id','productid');
    }
    function getlogindata()
    {
        return $this->hasOne('App\Models\User','id','loginid');
    }
}
