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
    	$partner = Partners::create($validated);
        
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
