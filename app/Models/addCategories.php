<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addCategories extends Model
{
    use HasFactory;
    protected $table='add_categories';
    
    protected $fillable =["categoryName","categoryImage"];

    function getsub_categories()
    {
        return $this->hasMany('App\Models\addsubCategories','categoryid','id');
    }
}
