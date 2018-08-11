<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Language;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public static function lanVi()
    {
        $vi = Language::select('id')->where('name', '=', Language::VI)->firstOrFail();
        return $vi->id;
    }
    public static function lanLa()
    {
        $la = Language::select('id')->where('name', '=', Language::EN)->firstOrFail();
        return $la->id;
    }

}
