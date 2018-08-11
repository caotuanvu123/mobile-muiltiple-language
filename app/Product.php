<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Elasticquent\ElasticquentTrait;

class Product extends Model
{
//    use ElasticquentTrait;

    const PROMONTION = 1;
    const UN_PROMONTION = 2;

    protected $table = 'product';
    protected $fillable = ['id','image', 'quantity', 'promotion', 'price', 'name_vi', 'desc_en', 'name_en', 'desc_vi', 'category_id', 'brand_id', 'created_at', 'updated_at'];
    public $timestamps = true;

}
