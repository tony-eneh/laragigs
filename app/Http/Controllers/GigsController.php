<?php

namespace App\Http\Controllers;

use App\Models\Gig;
use Illuminate\Http\Request;

class GigsController extends Controller
{
    // all gigs page
    public function index()
    {
        return view('gigs.index', ['gigs' => Gig::all()]);
    }

    // individual gig page
    public function show(Request $request)
    {
        // return Gig
    }

    // form to create new gig
    public function create(Request $request)
    {
        return view('gigs.create');
    }

    // create new gig in db
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'company' => 'required',
            'title' => 'required',
            'location' => 'required',
            'email' => 'required|email',
            'website' => 'required',
            'tags' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->storePublicly('logos');
        }

        $formFields['user_id'] = auth()->id();

        Gig::create($formFields);

        return redirect('/')->with('message', 'Listing created successfully');
    }

    // show form to update gig

    // update a gig

    // delete a gig
}