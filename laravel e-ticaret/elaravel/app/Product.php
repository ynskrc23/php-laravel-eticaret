<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table ='tbl_products';
    protected $primaryKey = 'product_id';
    protected $fillable = ['product_name','category_id','manufacture_id','product_short_description','product_long_description','product_price','product_image','product_size','product_color','publication_status'];
}
