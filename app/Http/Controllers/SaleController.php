<?php

namespace App\Http\Controllers;

use App\Models\Admin\Property;
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
        $properties = Property::where('sales', 1)->orderBy('created_at', 'desc')->paginate(Property::GET_PROPERTIES);
        $recent_properties = Property::orderBy('created_at', 'desc')->take(Property::RECENT_PROPERTIES)->get();
        return view('realstate.sale', compact('static_data', 'properties', 'recent_properties'));
    }
}
