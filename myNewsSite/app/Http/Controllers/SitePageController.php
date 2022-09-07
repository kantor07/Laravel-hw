<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SitePageController extends Controller
{
    public function homePage()
        {
            return view('sitePage.homePage');
        }
    
}
