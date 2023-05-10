<?php

namespace App\Http\Controllers;

use App\Models\Apiary;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ApiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('apiaries.index', [
            'apiaries' => Apiary::latest()->filter(request(['search']))->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('apiaries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'unique:apiaries', 'max:255'],
            'description' => ['required'],
            'street_number' => ['required', 'numeric', 'integer'],
            'street_name' => ['required'],
            'city' => ['required'],
            'country' => ['required'],
            'zip_code' => ['required']


        ]);

        Apiary::create($formFields);

        return redirect('/')->with('message', 'Pasieka została utworzona!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Apiary $apiary)
    {
        return view('apiaries.show', [
            'apiary' => $apiary
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
