<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;

class FormController extends Controller
{
    public function showForm()
    {
        app()->setLocale('en');
    return view('form');
    }
    public function setLanguage($locale)
    {
        App::setLocale($locale);
        return redirect()->back();
    }

    public function getTranslations($locale)
    {
        
        $translations = Lang::get('messages', [], $locale);
        
        
        return response()->json($translations);
    }
}
