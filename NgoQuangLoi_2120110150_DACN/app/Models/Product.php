<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'nql_product';
    public function product_img()
    {
        return $this->hasMany(ProductImage::class,'product_id','id');
    }
    public function product_sale()
    {
        return $this->hasOne(ProductSale::class,'product_id','id');
    }
}
