<?php

namespace App\Http\Controllers;

use App\Models\BeeDisease;
use App\Models\Beehive;
use Illuminate\Http\Request;

class DiseasesCaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Pobierz opcjonalny parametr statusu z zapytania
        $status = $request->input('status');

        // Pobierz wszystkie pasieki wraz z ulami i chorobami
        // Jeżeli parametr statusu jest ustawiony, filtruj choroby według statusu
        $apiaries = auth()->user()->apiaries()->with(['beehives.bee_diseases' => function ($query) use ($status) {
            if ($status) {
                $query->where('diseases_cases.status', $status);
            }
        }])->get();

        // Pobierz wszystkie pasieki wraz z ulami i chorobami
        $allApiaries = auth()->user()->apiaries()->with(['beehives.food'])->get();

        $anyDiseases = false;

        foreach ($allApiaries as $apiary) {
            foreach ($apiary->beehives as $beehive) {
                if (!$beehive->bee_diseases->isEmpty()) {
                    $anyDiseases = true;
                    break 2;
                }
            }
        }

        // Przekaż dane do widoku
        return view('diseases_cases.index', ['apiaries' => $apiaries, 'anyDiseases' => $anyDiseases]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->check()) {         // Sprawdzenie czy użytkownik jest zalogowany
            $user = auth()->user(); // Pobierz dane zalogowanego użytkownika
            $apiaries = $user->apiaries()->get(); //Pobierz pasieki zalogowanego użytkownika
            $beeDiseases = BeeDisease::all(); //pobierz wszystkie rekordy z karmą dla pszczół
            $beehives = $user->beehives()->get(); // Pobierz wszystkie ule związane z pasiekami użytkownika

            return view('diseases_cases.create', [
                'apiaries' => $apiaries,
                'beeDiseases' => $beeDiseases,
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
            'beeDisease_id' => 'required|exists:bee_diseases,id',
            'date' => 'required|date',
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
            $beehive->bee_diseases()->attach($request->beeDisease_id,[
                'date' => $request->date,
                'note' => $request->note,
                'status' => 'nieleczona'
            ]);
        }

        return back()->with('message', 'Choroba została pomyślnie odnotowana');
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
    public function destroy($beehive_id, $bee_disease_id)
    {
        $beehive = Beehive::find($beehive_id);
        $beehive->bee_diseases()->detach($bee_disease_id);

        return redirect()->back()->with('message', 'Przypadek chorobowy został pomyślnie usunięty.');
    }

    public function updateDiseaseCaseStatus(Request $request, $beehive_id, $bee_disease_id){
        $data = $request->validate([
            'status' => 'required|in:nieleczona,w trakcie leczenia,uleczona',
        ]);

        $beehive = Beehive::findOrFail($beehive_id);
        $beeDisease = $beehive->bee_diseases()->where('bee_disease_id', $bee_disease_id)->first();

        if ($beeDisease) {
            $beeDisease->pivot->status = $data['status'];
            $beeDisease->pivot->save();
        }

        return back()->with('message', 'Status choroby został zaktualizowany');
    }
}
