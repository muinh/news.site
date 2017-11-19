<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Advertisement;

class AdminController extends Controller
{
    //get articles list
    public function advertisements()
    {
        return view('admin.ads');
    }

    public function saveAd(Request $request)
    {
        $ad = new Advertisement();
        $ad->title = $request['ads-add-title'];
        $ad->price = $request['ads-add-price'];
        $ad->company = $request['ads-add-company'];
        $ad->website = $request['ads-add-website'];
        $ad->leftside = $request['ads-add-side'];
        $ad->save();

        return redirect()->route('createAd');
    }
}