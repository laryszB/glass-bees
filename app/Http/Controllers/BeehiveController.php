<?php

namespace App\Http\Controllers;

use App\Models\Apiary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BeehiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($apiary)
    {
        if (auth()->check()) {
            $user = auth()->user();
            $apiary = $user->apiaries()->findOrFail($apiary);
            $beehives = $apiary->beehives()->paginate(12);
            return view('beehives.index', compact('apiary', 'beehives'));
        } else {
            abort(403);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
