<?php

namespace App\Http\Controllers;

use App\Language;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class WebController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($lang) {
    	App::setlocale($lang);
    	$language=Language::where('slug', $lang)->firstOrFail();
    	$setting=Setting::where('id', 1)->firstOrFail();

        return view('web.home', compact('language', 'setting', 'lang'));
    }

    public function excursions($lang) {
        App::setlocale($lang);
        $language=Language::where('slug', $lang)->firstOrFail();
        $setting=Setting::where('id', 1)->firstOrFail();

        return view('web.excursions', compact('language', 'setting', 'lang'));
    }
}