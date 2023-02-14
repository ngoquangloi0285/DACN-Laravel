<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'nql_category';

    public function category_product()
    {
        return $this->hasMany(Product::class,'id','product_id');
    }
}
