<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaleController extends Controller
{
    protected $static_data, $default_language;
    public function __construct(){
        $this->static_data = static_home();
        $this->default_language = default_language();
    }

    public function index()
    {
        $static_data = $this->static_data;
        $default_language = $this->default_language;

       return view('realstate.sale', compact('static_data'));
    }
}
