<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const PAID = 1;
    const UNPAID = 2;

    const TIME_START = 2017;
    const TIME_END = 2027;

    protected $table = 'order';
    protected $fillable = ['id','name', 'address', 'mail', 'phone', 'type', 'price'];
    public $timestamps = true;

    public function orderProduct()
    {
        return $this->belongsToMany('App\Product', 'order_detail', 'order_id', 'product_id');
    }




    public static function month()
    {
        return [
            1 => 'tháng 1',
            2 => 'tháng 2',
            3 => 'tháng 3',
            4 => 'tháng 4',
            5 => 'tháng 5',
            6 => 'tháng 6',
            7 => 'tháng 7',
            8 => 'tháng 8',
            9 => 'tháng 9',
            10 => 'tháng 10',
            11 => 'tháng 11',
            12 => 'tháng 12'
        ];
    }
}
