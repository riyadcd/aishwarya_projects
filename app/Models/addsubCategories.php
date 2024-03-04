<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class addsubCategories extends Model
{
    use HasFactory;
    protected $table='addsub_categories';
    
    protected $fillable =["categoryid","subcategoryName"];

    
}
