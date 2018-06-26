<?php

namespace App\Http\Controllers;

use App\Models\Admin\Property;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Models\Admin\Location;
use App\Models\Admin\Country;
use App\Models\Admin\Page;

class CommercialController extends Controller
{
    protected $static_data, $default_language;
    public function __construct(){
        $this->static_data = static_home();
        $this->default_language = default_language();
    }

    public function index(Request $request)
    {
        $static_data = $this->static_data;

        $default_language = $this->default_language;

        $title = 'Rent | Findaproperty';

        $countries = Country::all();

        $locations = Location::all();

        $categories = Category::get();

        $recent_properties = Property::with([
                'currency'
            ])
            ->orderBy('created_at', 'desc')
            ->where('status', 1)
            ->take(Property::RECENT_PROPERTIES)
            ->get();
        
        $properties = Property::with([
                'currency'
            ])
            ->whereHas('category', function ($query) {
                $query->whereHas('contentDefault', function ($q) {
                    $q->where('name', 'Commercial');
                });
            })
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(Property::GET_PROPERTIES);

        $salePrices = Property::select("prices")
            ->where('sales', '=', 1)
            ->where('status', 1)
            ->get();

        $p = [];
        $saleMinPrice = 0;
        $saleMaxPrice = 0;

        foreach ($salePrices as $price) {
            $p[] = $price['prices']['price'];
        }

        if (count($p) > 0) {
            $saleMinPrice = min($p);
            $saleMaxPrice = max($p);
        }

        $rentPrices = Property::select("prices")
            ->where('rentals', '=', 1)
            ->where('status', 1)
            ->get();

        $perWeek = [];
        $perMonth = [];
        $rentMinPricePerWeek = 0;
        $rentMaxPricePerWeek = 0;
        $rentMinPricePerMonth = 0;
        $rentMaxPricePerMonth = 0;

        foreach ($rentPrices as $price) {
            $perWeek[] = $price['prices']['week'] != '' ? $price['prices']['week'] : 0;
            $perMonth[] = $price['prices']['month'] != '' ? $price['prices']['month'] : 0;
        }

        if (count($perWeek) > 0) {
            $rentMinPricePerWeek = min($perWeek);
            $rentMaxPricePerWeek = max($perWeek);
        }

        if (count($perMonth) > 0) {
            $rentMinPricePerMonth = min($perMonth);
            $rentMaxPricePerMonth = max($perMonth);
        }

        $pages = Page::with('contentDefault')->where('status', 1)->orderBy('created_at','desc')->get();

        return view('realstate.commercial', compact(
            'static_data', 
            'properties', 
            'recent_properties', 
            'categories', 
            'title', 
            'countries', 
            'locations',
            'saleMinPrice',
            'saleMaxPrice',
            'rentMinPricePerWeek',
            'rentMaxPricePerWeek',
            'rentMinPricePerMonth',
            'rentMaxPricePerMonth',
            'pages'
        ));
    }
}
