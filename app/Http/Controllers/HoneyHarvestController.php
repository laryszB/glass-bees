<?php

namespace App\Http\Controllers;

use App\Models\Beehive;
use App\Models\HoneyHarvest;
use Illuminate\Http\Request;

class HoneyHarvestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->check()) {
            $user = auth()->user(); // Pobierz dane zalogowanego użytkownika
            $apiaries = $user->apiaries()->with(['honeyHarvests' => function ($query) {
                $query->orderBy('harvest_date', 'asc');
            }])->get(); // Pobierz pasieki zalogowanego użytkownika razem z posortowanymi zbiorami

            $apiariesWithHarvestsGroupedByYear = $apiaries->map(function ($apiary) {
                $harvestsGroupedByYear = $apiary->honeyHarvests->groupBy(function ($date) {
                    return date('Y', strtotime($date->harvest_date)); // grupowanie po roku
                });

                $apiary->harvestsGroupedByYear = $harvestsGroupedByYear;
                return $apiary;
            });

            // Zebranie unikalnych lat
            $years = [];
            foreach ($apiariesWithHarvestsGroupedByYear as $apiary) {
                foreach ($apiary->harvestsGroupedByYear as $year => $harvests) {
                    $years[] = $year;
                }
            }
            $years = array_unique($years);
            sort($years);

            return view('honey_harvests.index', [
                'apiaries' => $apiariesWithHarvestsGroupedByYear,
                'years' => $years
            ]);
        } else {
            abort(403);
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->check()) {         // Sprawdzenie czy użytkownik jest zalogowany
            $user = auth()->user(); // Pobierz dane zalogowanego użytkownika
            $apiaries = $user->apiaries()->get(); //Pobierz pasieki zalogowanego użytkownika

            return view('honey_harvests.create', [
                'apiaries' => $apiaries,
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
        // Sprawdzanie czy wprowadzono wagę czy objętość
        $isVolume = $request->has('volume');

        // Dynamiczne ustawianie zasad walidacji
        $validationRules = [
            'apiary_id' => 'required|exists:apiaries,id',
            'price' => 'required|numeric|min:1',
            'harvest_date' => 'required|date',
        ];

        // Dodawanie zasad walidacji dla wagi lub objętości
        if ($isVolume) {
            $validationRules['volume'] = 'required|numeric|min:1';
        } else {
            $validationRules['weight'] = 'required|numeric|min:1';
        }

        //Walidacja
        $formFields = $request->validate($validationRules);

        // Obliczenie wagi na podstawie objętości (lub odwrotnie)
        $conversionFactor = 1.4; // 1 litr produktu ma wagę 1,4kg
        if ($isVolume) {
            $volume = $formFields['volume'];
            $weight = $volume * $conversionFactor;
        } else {
            $weight = $formFields['weight'];
            $volume = $weight / $conversionFactor;
        }

        // Obliczenie całkowitego zysku
        $pricePerKg = $formFields['price'];
        $profit = $pricePerKg * $weight;

        // Obliczanie średniej wartości wagi miodu na ul
        $apiaryId = $formFields['apiary_id'];
        $beehivesCount = Beehive::where('apiary_id', $apiaryId)->count();
        $averageWeightPerHive = $weight / $beehivesCount;

        $formFields['weight'] = $weight;
        $formFields['volume'] = $volume;
        $formFields['profit'] = $profit;
        $formFields['average_weight_per_beehive'] = $averageWeightPerHive;

        $honeyHarvest = HoneyHarvest::create($formFields);

        return redirect()->route('honeyharvests_index')->with('message', 'Zbiór miodu został zarejestrowany!');



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
    public function destroy(HoneyHarvest $harvest)
    {
        $harvest->delete();
        return redirect()->route('honeyharvests_index')->with('message', 'Zbiór miodu został usunięty!');
    }

    // Funkcja dla API pobierające dane do wykresu odnośnie zysków w widoku index honey_harvests (AJAX)
    public function getDataForProfitChart(Request $request, $apiaryId)
    {
        $harvests = HoneyHarvest::where('apiary_id', $apiaryId)->orderBy('harvest_date')->get();

        return response()->json($harvests);
    }

    // Funkcja dla API pobierające dane do wykresu odnośnie siły pasieki w widoku index honey_harvests (AJAX)
    public function getDataForApiaryStrengthChart($year)
    {
        $user = auth()->user();
        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $apiaries = $user->apiaries()->with(['honeyHarvests' => function ($query) use ($year) {
            $query->whereYear('harvest_date', $year);
        }])->get();

        $apiaryNames = [];
        $averageWeights = [];

        foreach ($apiaries as $apiary) {
            $totalWeight = 0;
            $harvestCount = 0;

            foreach ($apiary->honeyHarvests as $harvest) {
                $totalWeight += $harvest->average_weight_per_beehive;
                $harvestCount++;
            }

            if ($harvestCount > 0) {
                $apiaryNames[] = $apiary->name;
                $averageWeights[] = $totalWeight / $harvestCount;
            }
        }

        return response()->json([
            'apiaries' => $apiaryNames,
            'average_weights' => $averageWeights,
        ]);
    }


}
