<?php

namespace App\Http\Controllers;

use App\Models\Apiary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ApiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()){         // Sprawdzenie czy użytkownik jest zalogowany
            $user = auth()->user(); // Pobierz dane zalogowanego użytkownika
            $apiaries = $user->apiaries()->latest()->filter(request(['search']))->paginate(4); //Pobierz pasieki zalogowanego użytkownika
        }
        else{
            $apiaries = collect(); // Jeżeli nie jest zalogowany zwracana jest pusta kolekcja pasiek
        }

        return view('apiaries.index', [
            'apiaries' => $apiaries
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

        if($request->hasFile('photo')){
            $formFields['photo'] = $request->file('photo')->store('apiaries_photos', 'public');
        }

        $formFields['user_id'] = auth()->id();

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
    public function edit(Apiary $apiary)
    {
        return view('apiaries.edit', ['apiary' => $apiary]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Apiary $apiary)
    {
        $formFields = $request->validate([
            'name' => ['required', 'max:255'],
            'description' => ['required'],
            'street_number' => ['required', 'numeric', 'integer'],
            'street_name' => ['required'],
            'city' => ['required'],
            'country' => ['required'],
            'zip_code' => ['required']
        ]);

        if($request->hasFile('photo')){
            $formFields['photo'] = $request->file('photo')->store('apiaries_photos', 'public');
        }

        $apiary->update($formFields);

        return back()->with('message', 'Pasieka została zaktualizowana! ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Apiary $apiary)
    {
        $apiary->delete();
        return redirect('/')->with('message', 'Pasieka została usunięta!');
    }
}
