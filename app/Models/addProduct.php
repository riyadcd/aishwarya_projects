<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addProduct extends Model
{
    use HasFactory;
    
    protected $table='add_products';
    
    protected $fillable =["categoryid","subcategoryid","productName","shortDescription","longDescription","productVariety","productQuantity","productPrice","productImage"];

    
}
