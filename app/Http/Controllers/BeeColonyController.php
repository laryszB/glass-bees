<?php

namespace App\Http\Controllers;

use App\Models\Apiary;
use App\Models\BeeColony;
use App\Models\Beehive;
use Illuminate\Http\Request;

class BeeColonyController extends Controller
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
        if ($beehive->beeColony) {
            return redirect()->back()->withErrors(['beeColony' => 'Rodzina pszczela dla tego ula już istnieje.']);
        }

        return view('bee_colonies.create', compact('apiary', 'beehive'));
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

        // Sprawdzamy, czy istnieje już rodzina pszczela dla danego ula
        if ($beehive->beeColony) {
            return redirect()->back()->withErrors(['beeColony' => 'Rodzina pszczela dla tego ula już istnieje.']);
        }

        $formFields = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'strength' => 'required|in:bardzo słaba,słaba,normalna,silna,bardzo silna',
            'temperament' => 'required|in:bardzo łagodny,łagodny,normalny,agresywny,bardzo agresywny'
        ]);

        $formFields['beehive_id'] = $beehive->id;

        $beeColony = BeeColony::create($formFields);

        return redirect()->back()->with('message', 'Rodzina pszczela utworzona pomyślnie!');
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
    public function edit(Apiary $apiary, Beehive $beehive, BeeColony $beeColony)
    {
        if (auth()->user()->id !== $apiary->user_id) {
            abort(403); // Forbidden
        }

        // Upewnij się, że beehive należy do podanej apiary
        if ($beehive->apiary->id !== $apiary->id) {
            abort(404);
        }

        // Upewnij się, że beeColony należy do podanego beehive
        if ($beeColony->beehive->id !== $beehive->id) {
            abort(404);
        }

        return view('bee_colonies.edit', compact('apiary', 'beehive', 'beeColony'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Apiary $apiary, Beehive $beehive, BeeColony $beeColony)
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
            'name' => 'required|max:255',
            'description' => 'required',
            'strength' => 'required|in:bardzo słaba,słaba,normalna,silna,bardzo silna',
            'temperament' => 'required|in:bardzo łagodny,łagodny,normalny,agresywny,bardzo agresywny'
        ]);

        $formFields['beehive_id'] = $beehive->id;

        $beeColony->update($formFields);

        return back()->with('message', 'Rodzina pszczela została zaktualizowana!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
