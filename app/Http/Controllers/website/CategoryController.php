<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category as Cat;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Cat::get();
        return view('website.categories.index', compact('categories'));
    }

    public function show(string $id)
    {
        $category = Cat::findOrFail($id);
        return view('website.categories.show',compact('category'));
    }


}
