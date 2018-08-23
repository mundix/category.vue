<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class TestingController extends Controller
{
    public function category()
    {
        $category = Category::with('children')->first();
        return $category;
    }
}
