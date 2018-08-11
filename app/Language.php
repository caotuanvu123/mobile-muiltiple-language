<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    const VI = 'vi';
    const EN = 'en';

    protected $table = 'language';
    protected $fillable = ['id','name', 'created_at', 'updated_at'];
    public $timestamps = true;
}
