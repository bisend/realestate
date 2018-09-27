<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sitemap;
use App\Models\Admin\Property;
use Carbon\Carbon;
use File;

class SitemapController extends Controller
{
    public function index()
    {
        $properties = Property::with([
            'images',
        ])->get();

        foreach ($properties as $property) {
            $tag = Sitemap::addTag(route('property.show', $property->alias), Carbon::parse($property->updated_at));

            foreach ($property->images as $image) {
                $tag->addImage(url('/images/data/'. $image->image));
            }
        }

        $xml = Sitemap::xml();

        File::put(public_path('sitemap.xml'), $xml);

        return Sitemap::render();
    }
}
