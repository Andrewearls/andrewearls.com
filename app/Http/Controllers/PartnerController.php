<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PartnerValidator;
use App\Partners;

class partnerController extends Controller
{
    public function create(PartnerValidator $request)
    {
    	$validated = $request->validated();
    	//This should be sanitized
    	// $partner = partner::create($validated);
    	$partner = Partners::create($validated);
    	// $partner->name = $validated['name'];
    	// $partner->url = $validated['url'];
    	// $partner->save();

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
