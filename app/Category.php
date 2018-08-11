<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['id','name_vi', 'desc_vi', 'name_en', 'desc_en'];
    public $timestamps = true;
}
