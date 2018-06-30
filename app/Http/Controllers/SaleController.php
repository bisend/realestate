<?php

namespace App\Http\Controllers;

use App\Models\Admin\Property;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Models\Admin\Location;
use App\Models\Admin\Country;
use App\Models\Admin\Page;

class SaleController extends Controller
{
    protected $static_data, $default_language;

    public function __construct() {
        $this->static_data = static_home();

        $this->default_language = default_language();
    }

    public function index(Request $request)
    {
        $static_data = $this->static_data;

        $default_language = $this->default_language;

        $title = 'Sale | Findaproperty';

        $countries = Country::all();

        $locations = Location::all();

        $categories = Category::get();

        $recent_properties = Property::with([
                'property_status',
                'currency'
            ])
            ->orderBy('created_at', 'desc')
            ->take(Property::RECENT_PROPERTIES)
            ->where('status', 1)
            ->get();
        
        if (isset($request->search) && $request->search) {
            $ids = [];

            $propIds = [];

            $priceIds = [];

            $categoryIds = [];

            $countryIds = [];

            $locationIds = [];

            $bedIds = [];

            $currencyId = request('currency-id');

            if (isset($request->property)) {
                $saleProperties = Property::select([
                    "id",
                    "property_info"
                ])->where('sales', '=', 1)
                ->where('status', 1)
                ->get();

                if (count($saleProperties) > 0) {
                    foreach ($saleProperties as $prop) {
                        if ($prop['property_info']['property_reference'] == $request->property) {
                            $propIds[] = $prop['id'];
                        }
                    }
                }

                $ids = $propIds;
            } else {
                $salePrices = Property::select([
                    "id",
                    "prices"
                ])->where('sales', '=', 1)
                ->where('status', 1)
                ->get();

                foreach ($salePrices as $price) {
                    if ($price['prices']['price'] >= $request->lower && $price['prices']['price'] <= $request->upper)
                    $priceIds[] = $price['id'];
                }

                $ids = $priceIds;

                if (isset($request->type)) {
                    $saleCategories = Property::select([
                        "id",
                        "category_id"
                    ])->where('sales', '=', 1)
                    ->where('status', 1)
                    ->where('category_id', '=', $request->type)
                    ->get();

                    if (count($saleCategories) > 0) {
                        foreach ($saleCategories as $cat) {
                            $categoryIds[] = $cat['id'];
                        }
                    }

                    if (count($ids < 1)) {
                        $ids = $categoryIds;
                    } else {
                        $ids = array_intersect($ids, $categoryIds);
                    }
                }

                if (isset($request->country)) {
                    $saleCountries = Property::select([
                        "id",
                        "country_id"
                    ])->where('sales', '=', 1)
                    ->where('status', 1)
                    ->where('country_id', '=', $request->country)
                    ->get();

                    if (count($saleCountries) > 0) {
                        foreach ($saleCountries as $saleCountry) {
                            $countryIds[] = $saleCountry['id'];
                        }
                    }

                    if (count($ids < 1)) {
                        $ids = $countryIds;
                    } else {
                        $ids = array_intersect($ids, $countryIds);
                    }
                }

                if (isset($request->location)) {
                    $saleLocations = Property::select([
                        "id",
                        "location_id"
                    ])->where('sales', '=', 1)
                    ->where('status', 1)
                    ->where('location_id', '=', $request->location)
                    ->get();

                    if (count($saleLocations) > 0) {
                        foreach ($saleLocations as $saleLocation) {
                            $locationIds[] = $saleLocation['id'];
                        }
                    }

                    if (count($ids < 1)) {
                        $ids = $locationIds;
                    } else {
                        $ids = array_intersect($ids, $locationIds);
                    }
                }
            
                if (isset($request->beds)) {
                    $saleBeds = Property::select([
                        "id",
                        "property_info"
                    ])->where('status', 1)
                    ->where('sales', '=', 1)
                    ->get();

                    if (count($saleBeds) > 0) {
                        foreach ($saleBeds as $bed) {
                            if ($bed['property_info']['bedrooms'] >= $request->beds) {
                                $bedIds[] = $bed['id'];
                            }
                        }
                    }
                    
                    if (count($ids < 1)) {
                        $ids = $bedIds;
                    } else {
                        $ids = array_intersect($ids, $bedIds);
                    }
                }
            }

            $properties = Property::with([
                    'property_status',
                    'currency'
                ])
                ->where('sales', 1)
                ->where('status', 1)
                ->where('currency_id', $currencyId)
                ->whereIn('id', $ids)
                ->orderBy('created_at', 'desc')
                ->paginate(Property::GET_PROPERTIES);
            $properties->appends(request()->all());
            
        } else {
            $properties = Property::with([
                    'property_status',
                    'currency'
                ])
                ->where('sales', 1)
                ->where('status', 1)
                ->orderBy('created_at', 'desc')
                ->paginate(Property::GET_PROPERTIES);
        }

        $salePrices = Property::select("prices")
            ->where('sales', '=', 1)
            ->where('status', 1)
            ->get();

        $salePricesPound = Property::select("prices")
            ->where('sales', '=', 1)
            ->where('currency_id', 2)
            ->where('status', 1)
            ->get();

        $p = [];
        $pPound = [];
        $saleMinPrice = 0;
        $saleMaxPrice = 0;
        $saleMinPricePound = 0;
        $saleMaxPricePound = 0;

        foreach ($salePrices as $price) {
            $p[] = $price['prices']['price'];
        }

        if ( ! empty($p) > 0) {
            $saleMinPrice = min($p);
            $saleMaxPrice = max($p);
        }

        foreach ($salePricesPound as $price) {
            $pPound[] = $price['prices']['price'];
        }

        if ( ! empty($pPound) > 0) {
            $saleMinPricePound = min($pPound);
            $saleMaxPricePound = max($pPound);
        }
        
        $pages = Page::with('contentDefault')->where('status', 1)->orderBy('position','asc')->get();
        return view('realstate.sale', compact(
            'static_data', 
            'properties', 
            'recent_properties', 
            'categories', 
            'title', 
            'countries', 
            'locations',
            'saleMinPrice',
            'saleMaxPrice',
            'saleMinPricePound',
            'saleMaxPricePound',
            'pages'
        ));
    }
}
