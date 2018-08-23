<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class TestingController extends Controller
{
    public function category()
    {

        $categories = [
            "Foods"=>["Breakfast","Meals","Dinner"],
            "Sports"=>["Baseball","Basketball","Tennis",'Football Soccer'],
            "Hobbies" => ["Painting","Driving","Swimming","Running"],
            "Companies" => ["Apple","Microsoft","IMB","Intel"],
        ];
        foreach($categories as $parentName => $categoryChildren)
        {
            $cat = new Category();
            $cat->name = $parentName;
            $cat->slug = str_slug($parentName);
            $cat->save();
            foreach($categoryChildren as $childName)
            {
                $child = new Category();
                $child->slug = str_slug($childName);
                $child->name = $childName;
                $cat->children()->save($child);
            }
        }

    }
}
