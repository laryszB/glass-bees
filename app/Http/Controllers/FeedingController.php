<?php

namespace App\Http\Controllers;

use App\Models\Apiary;
use App\Models\Beehive;
use App\Models\Food;
use Illuminate\Http\Request;

class FeedingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // Pobierz wszystkie pasieki wraz z ulami i karmieniami
        $apiaries = auth()->user()->apiaries()->with(['beehives.food'])->get();

        $anyFeedings = false;

        foreach ($apiaries as $apiary) {
            foreach ($apiary->beehives as $beehive) {
                if (!$beehive->food->isEmpty()) {
                    $anyFeedings = true;
                    break 2;
                }
            }
        }

        // Przekaż dane do widoku
        return view('feedings.index', ['apiaries' => $apiaries, 'anyFeedings' => $anyFeedings,]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->check()) {         // Sprawdzenie czy użytkownik jest zalogowany
            $user = auth()->user(); // Pobierz dane zalogowanego użytkownika
            $apiaries = $user->apiaries()->get(); //Pobierz pasieki zalogowanego użytkownika
            $foods = Food::all(); //pobierz wszystkie rekordy z karmą dla pszczół
            $beehives = $user->beehives()->get(); // Pobierz wszystkie ule związane z pasiekami użytkownika

            return view('feedings.create', [
                'apiaries' => $apiaries,
                'foods' => $foods,
                'beehives' => $beehives
            ]);
        }
        else {
            abort(403);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Weryfikacja danych z formularza
        $request->validate([
            'beehive_ids' => 'required|array',
            'food_id' => 'required|exists:food,id',
            'feeding_date' => 'required|date',
            'amount' => 'required|numeric',
            'note' => 'nullable|string',
        ]);

        // Pobranie wszystkich uli przekazanych z formularza
        $beehives = Beehive::whereIn('id', $request->beehive_ids)->get();

        // Sprawdzenie czy wszystkie przekazane ule należą do zalogowanego użytkownika
        if ($beehives->count() !== count($request->beehive_ids)) {
            return back()->withErrors('Nieprawidłowy ul.')->withInput();
        }

        // Utworzenie karmienia dla każdego z przekazanych uli
        foreach ($beehives as $beehive) {
            $beehive->food()->attach($request->food_id,[
                'feeding_date' => $request->feeding_date,
                'amount' => $request->amount,
                'note' => $request->note,
            ]);
        }

        return back()->with('message', 'Karmienie zostało zarejestrowane pomyślnie.');
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
    public function destroy($beehive_id, $food_id)
    {
        $beehive = Beehive::find($beehive_id);
        $beehive->food()->detach($food_id);

        return redirect()->back()->with('message', 'Karmienie zostało usunięte pomyślnie.');
    }


}
