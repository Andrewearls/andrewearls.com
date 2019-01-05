<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReferenceValidator;
use App\Reference;

class ReferenceController extends Controller
{
    public function create(ReferenceValidator $request)
    {
    	return $request->validated();
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
