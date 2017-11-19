<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Advertisement extends Model
{
    public static function generateCoupon($length = 8){
        $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789';
        $numChars = strlen($chars);
        $string = '';
        for ($i = 0; $i < $length; $i++) {
            $string .= substr($chars, rand(1, $numChars) - 1, 1);
        }
        return $string;
    }

    public static function getAds($side)
    {
        $ads = DB::table('advertisements')->where('leftside', $side)->get();
        return $ads;
    }

}
