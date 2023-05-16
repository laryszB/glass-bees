<?php

namespace App\Http\Controllers;

use App\Models\Apiary;
use App\Models\Flora;
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
        $floras = Flora::all(); //przekaż do widoku wartości tabeli floras

        return view('apiaries.create', compact('floras'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        dd($request);


        $formFields = $request->validate([
            'name' => ['required', 'unique:apiaries', 'max:255'],
            'description' => ['required'],
            'flora' => ['required', 'array', 'min:1'], // Dodane pole "flora"
            'street_number' => ['required', 'numeric', 'integer '],
            'street_name' => ['required'],
            'city' => ['required'],
            'country' => ['required'],
            'zip_code' => ['required']
        ]);

        if($request->hasFile('photo')){
            $formFields['photo'] = $request->file('photo')->store('apiaries_photos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        $apiary = Apiary::create($formFields);

        $apiary->floras()->sync($request->input('flora', [])); //pobranie tablicy wartości dla flora z requesta i zsychnronizowanie z relacją

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
        //Akcja możliwa tylko wtedy jeżeli pasieka należy do zalogowanego użytkownika
        if($apiary->user_id != auth()->id()){
            abort(403, 'Nieautoryzowana akcja');
        }

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
        //Akcja możliwa tylko wtedy jeżeli pasieka należy do zalogowanego użytkownika
        if($apiary->user_id != auth()->id()){
            abort(403, 'Nieautoryzowana akcja');
        }

        $apiary->delete();
        return redirect('/')->with('message', 'Pasieka została usunięta!');
    }

    /**
     * Apiaries manage page.
     */
    public function manage(){
        return view('apiaries.manage', ['apiaries' => auth()->user()->apiaries()->get()]);
    }
}
