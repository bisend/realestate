<?php

namespace App\Http\Controllers;

use App\Models\Admin\Category;
use App\Models\Admin\Blog;
use App\Models\Admin\Property;
use App\Models\Admin\Review;
use App\Models\Admin\Location;
use App\Mail\RequestMails;
use App\Models\Request as RequestModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{

    protected $static_data, $default_language;
    public function __construct(){
        $this->static_data = static_home();
        $this->default_language = default_language();
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get Static Data
        $static_data = $this->static_data;
        $default_language = $this->default_language;

        $title = 'Home | Findaproperty';

        // Get the properties (Eager Load)
        $number_of_properties = get_setting('fp_properties_count', 'design');;
        if($static_data['design_settings']['fp_show_featured_only']){
            $properties = Property::with(['images', 'contentload' => function($query) use($default_language){
                $query->where('language_id', $default_language->id);
            }])->where('status', 1)->where('featured', 1)->inRandomOrder()->take($number_of_properties)->get();
        }else{
            $properties = Property::with(['images', 'contentload' => function($query) use($default_language){
                $query->where('language_id', $default_language->id);
            }])->where('status', 1)->inRandomOrder()->take($number_of_properties)->get();
        }

        $sales_properties = Property::with(['images', 'contentload' => function($query) use($default_language){
            $query->where('language_id', $default_language->id);
        }])->where('status', 1)->where('sales', 1)->where('featured_sale', 1)->orderBy('position_sale', 'asc')->take(Property::FEATURED_COUNT)->get();

        $rentals_properties = Property::with(['images', 'contentload' => function($query) use($default_language){
            $query->where('language_id', $default_language->id);
        }])->where('status', 1)->where('rentals', 1)->where('featured_rent', 1)->orderBy('position_rent', 'asc')->take(Property::FEATURED_COUNT)->get();

        $f_locations = Location::with('contentload')->where('featured', 1)->orderBy('order', 'asc')->get();

        // Get the blog (Eager Load)
        $posts = Blog::with(['contentload' => function($query) use($default_language){
            $query->where('language_id', $default_language->id);
        }])->where('status', 1)->orderBy('created_at', 'desc')->take(3)->get();

        $slider = Property::with(['images', 'contentload' => function($query) use($default_language){
            $query->where('language_id', $default_language->id);
        }])->where('status', 1)->where('slider', 1)->take(5)->get();

        $categories = Category::get();
        // Returning the View
        return view('realstate.home', compact('posts', 'default_language',
            'properties', 'static_data', 'f_locations', 'sales_properties', 'rentals_properties', 'slider', 'categories', 'title'));
    }

    // Contact page
    public function contact(){
        // Get Static Data
        $static_data = $this->static_data;
        $default_language = $this->default_language;
        return view('home.contact', compact('static_data', 'default_language'));
    }

    public function reCaptcha(Request $request){
        if($request->ajax()){
            $parameters = http_build_query([
                'secret'   => get_setting('reCaptcha_api_secret', 'site'),
                'response' => $request->response,
            ]);
            $url           = 'https://www.google.com/recaptcha/api/siteverify?' . $parameters;
            $checkResponse = null;
            $checkResponse = file_get_contents($url);
            if (is_null($checkResponse) || empty( $checkResponse )) {
                response()->json(['status' => false]);
            }
            $response = json_decode($checkResponse);
            return response()->json(['status' => $response->success]);
        }else{
            return response()->json($static_data['strings']['something_happened'], 400);
        }
    }

    public function review(Request $request){
        $data = $request->all();
        if($request->property_id){
            $data['service_id'] = 0;
        }else{
            $data['property_id'] = 0;
        }
        $data['status'] = 0;
        Review::create($data);
        Session::flash('reviewDone', true);
        return redirect()->back();
    }

    public function registerInterest(Request $request)
    {

        if($request->ajax()){
            $data = $request->only(['name', 'email', 'phone', 'regPage']);
            $data['register_interest'] = 1;
            $data['reference'] = $data['regPage'];
            $property_alias = explode('/', $data['reference']);
            $property_alias = end($property_alias);
            $property = Property::where('alias',  $property_alias)->first();
            if ($property) {
                $data['reference_name'] = $property->property_info['property_reference'];
            } else {
                if ($property_alias == '') {
                    $data['reference_name'] = 'home';
                } else {
                    $data['reference_name'] = $property_alias;
                }
            }
            $data['subject'] = 'Register Interest Request from Findaproperty';
            if (RequestModel::create($data)) {
                Mail::to(get_setting('contact_email', 'site'))->send(new RequestMails($data));
                $response['status'] = 'success';
                return $response;
            }
            $response['status'] = 'error';
            return $response;
        }
    }

    public function callback(Request $request)
    {
        if($request->ajax()){
            $data = $request->only(['name', 'phone', 'backPage']);
            $data['callback'] = 1;
            $data['subject'] = 'Call Back Request from Findaproperty';
            $data['reference'] = $data['backPage'];
            $property_alias = explode('/', $data['reference']);
            $property_alias = end($property_alias);
            $property = Property::where('alias',  $property_alias)->first();
            if ($property) {
                $data['reference_name'] = $property->property_info['property_reference'];
            } else {
                if ($property_alias == '') {
                    $data['reference_name'] = 'home';
                } else {
                    $data['reference_name'] = $property_alias;
                }
            }
            if (RequestModel::create($data)) {
                Mail::to(get_setting('contact_email', 'site'))->send(new RequestMails($data));
                $response['status'] = 'success';
                return $response;
            }
            $response['status'] = 'error';
            return $response;
        }
    }
}
