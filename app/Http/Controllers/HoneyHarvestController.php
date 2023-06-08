<?php

namespace App\Http\Controllers;

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
            $apiaries = $user->apiaries()->with('honeyHarvests')->get(); // Pobierz pasieki zalogowanego użytkownika razem z zbiorami

            $apiariesWithHarvestsGroupedByYear = $apiaries->map(function ($apiary) {
                $harvestsGroupedByYear = $apiary->honeyHarvests->groupBy(function ($date) {
                    return date('Y', strtotime($date->harvest_date)); // grupowanie po roku
                });
                $apiary->harvestsGroupedByYear = $harvestsGroupedByYear;
                return $apiary;
            });

            return view('honey_harvests.index', ['apiaries' => $apiariesWithHarvestsGroupedByYear]);
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
            'price' => 'required|numeric|min:0',
            'harvest_date' => 'required|date',
        ];

        // Dodawanie zasad walidacji dla wagi lub objętości
        if ($isVolume) {
            $validationRules['volume'] = 'required|numeric|min:0';
        } else {
            $validationRules['weight'] = 'required|numeric|min:0';
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

        $formFields['weight'] = $weight;
        $formFields['volume'] = $volume;
        $formFields['profit'] = $profit;

        $honeyHarvest = HoneyHarvest::create($formFields);

        return redirect('/')->with('message', 'Zbiór miodu został zarejestrowany!');



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
