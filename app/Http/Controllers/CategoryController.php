<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use App\Http\Requests\CategoryValidator;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        return view('categories')->with(['categories' => $categories]);
    }
    public function create(CategoryValidator $request)
    {
    	$validated = $request->validated();

    	//This should be sanitized
    	$partner = Categories::create($validated);
        
    	return 'success';
    }

    public function update(Request $request)
    {
    	# code...
    }

    public function delete($id)
    {
    	# code...
    }
}
