<?php

namespace App\Http\Controllers;

use App\Models\Apiary;
use App\Models\Beehive;
use App\Models\MotherBee;
use Illuminate\Http\Request;

class MotherBeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Apiary $apiary, Beehive $beehive)
    {
        // Upewniamy się, że beehive należy do podanej apiary
        if ($beehive->apiary->id !== $apiary->id) {
            abort(404);
        }

        // Upewniamy się, że zalogowany użytkownik jest właścicielem apiary
        if (auth()->user()->id !== $apiary->user_id) {
            abort(403); // Forbidden
        }

        // Sprawdzamy, czy istnieje już rodzina pszczela dla danego ula
        if ($beehive->motherBee) {
            return redirect()->back()->withErrors(['motherBee' => 'Matka jest już dodana do tego ula!']);
        }

        return view('mother_bees.create', compact('apiary', 'beehive'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Apiary $apiary, Beehive $beehive)
    {

        // Upewniamy się, że beehive należy do podanej apiary
        if ($beehive->apiary->id !== $apiary->id) {
            abort(404);
        }

        // Upewniamy się, że zalogowany użytkownik jest właścicielem apiary
        if (auth()->user()->id !== $apiary->user_id) {
            abort(403); // Forbidden
        }

        // Sprawdzamy, czy istnieje już matka pszczela dla danego ula
        if ($beehive->motherBee) {
            return redirect()->back()->withErrors(['motherBee' => 'Matka jest już dodana do tego ula!']);
        }

        $formFields = $request->validate([
            'race' => 'required|max:255',
            'line' => 'required|max:255',
            'placement_date' => 'required|date',
            'birth_date' => 'required|date|before:placement_date',
            'state' => 'required|in:unasieniona,nieunasieniona,trutniowa',
            'note' => ''
        ]);

        $formFields['beehive_id'] = $beehive->id;

        $motherBee = MotherBee::create($formFields);

        return redirect()->route('beehives_show', ['apiary' => $apiary, 'beehive' => $beehive])->with('message', 'Matka została pomyślnie dodana!');
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
    public function edit(Apiary $apiary, Beehive $beehive, MotherBee $motherBee)
    {
        if (auth()->user()->id !== $apiary->user_id) {
            abort(403); // Forbidden
        }

        // Upewnij się, że beehive należy do podanej apiary
        if ($beehive->apiary->id !== $apiary->id) {
            abort(404);
        }

        // Upewnij się, że motherBee należy do podanego beehive
        if ($motherBee->beehive->id !== $beehive->id) {
            abort(404);
        }

        return view('mother_bees.edit', compact('apiary', 'beehive', 'motherBee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Apiary $apiary, Beehive $beehive, MotherBee $motherBee)
    {
        // Upewniamy się, że beehive należy do podanej apiary
        if ($beehive->apiary->id !== $apiary->id) {
            abort(404);
        }

        // Upewniamy się, że zalogowany użytkownik jest właścicielem apiary
        if (auth()->user()->id !== $apiary->user_id) {
            abort(403); // Forbidden
        }

        $formFields = $request->validate([
            'race' => 'required|max:255',
            'line' => 'required|max:255',
            'placement_date' => 'required|date',
            'birth_date' => 'required|date|before:placement_date',
            'state' => 'required|in:unasieniona,nieunasieniona,trutniowa',
            'note' => ''
        ]);

        $formFields['beehive_id'] = $beehive->id;

        $motherBee->update($formFields);

        return redirect()->route('beehives_show', ['apiary' => $apiary, 'beehive' => $beehive])->with('message', 'Matka pszczela została zaktualizowana!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
