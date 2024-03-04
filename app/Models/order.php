<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    protected $table='orders';
    protected $fillable =["loginid","firstname","lastname","mobile","address1","address2","country","city","state","zipcode","shipto","shipaddress1","shipaddress2","shipcountry","shipcity","shipstate","shipzipcode","payment","'totalamount"];

}
