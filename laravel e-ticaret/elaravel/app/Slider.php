<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table ='tbl_slider';
    protected $primaryKey = 'slider_id';
    protected $fillable = ['slider_image','publication_status'];
}