<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return $categories;
    }

    public function show(string $id)
    {
        $category = Category::select(['id', 'category'])->withSubCategory()->findOrFail($id);
        return $category;
    }

    public function showStandalone(string $id)
    {
        $category = Category::select(['id', 'category'])->findOrFail($id);
        return $category;
    }

    public function createStandalone(Request $request)
    {
        $category = Category::create(["category" => $request->category]);
        return $category;
    }

    public function createLeaf(Request $request, string $id)
    {
        $category = Category::create(["category" => $request->category, "sub_category" => $id]);
        return $category;
    }

    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return $category;
    }
}
