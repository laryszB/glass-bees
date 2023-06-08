<?php

namespace App\Http\Controllers;

use App\Models\Apiary;
use App\Models\Beehive;
use App\Models\BeehiveAccessory;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use App\Policies\BeehivePolicy;
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
            $beehives = $apiary->beehives()->paginate(10);
            return view('beehives.index', compact('apiary', 'beehives'));
        } else {
            abort(403);
        }
    }

    /**
     * Show the form for creating a new resource.
     * @throws AuthorizationException
     */
    public function create(Apiary $apiary)
    {
        $this->authorize('create', [Beehive::class, $apiary]); //sprawdź czy użytkownik dodaje ul do swojej pasieki

        $beehiveAccessories = BeehiveAccessory::all();

        return view('beehives.create', compact('apiary', 'beehiveAccessories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Apiary $apiary)
    {
        $request->validate(['quantity' => ['required', 'integer', 'min:1', 'max:10']]);

        $quantity = $request->input('quantity');

        $formFields = $request->validate([
            'name' => ['required', 'max:255'],
            'description' => ['required'],
            'type' => ['required', 'max:255'],
            'bodies' => ['required', 'numeric', 'integer'],
            'bottoms' => ['required', 'max:255'],
            'extensions' => ['required', 'numeric', 'integer'],
            'half_extensions' => ['required', 'numeric', 'integer'],
            'frames' => ['required', 'numeric', 'integer'],
            'beehive_accessory' => ['array', 'min:1'],
            'note' => []
        ]);

        $formFields['note'] = str_replace(array("\r", "\n"), ' ', $request->input('note')); // zamień znaki nowej lini na spację dopóki nie naprawię alpine.js przy okienku notatki

        $formFields['apiary_id'] = $apiary->id;



        for ($i = 0; $i < $quantity; $i++){
            $beehive = Beehive::create($formFields);
            $beehive->beehiveAccessories()->sync($request->input('beehive_accessory', [])); //pobranie tablicy wartości dla beehiveAccessory z requesta i zsychnronizowanie z relacją
        }

        return redirect('/')->with('message', 'Ul został pomyślnie utworzony');
    }

    /**
     * Display the specified resource.
     * @throws AuthorizationException
     */
    public function show(Apiary $apiary, Beehive $beehive)
    {
        $this->authorize('view', $beehive); // sprawdź czy ul który użytkownik próbuje wyświetlić należy faktycznie do niego, więcej w app/Policies/BeehivePolicy

        $beehive->load('beeColony');

        return view('beehives.show', [
            'apiary' => $apiary,
            'beehive' => $beehive
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Apiary $apiary, Beehive $beehive)
    {
        $this->authorize('update', $beehive);

        $beehiveAccessories = BeehiveAccessory::all();

        return view('beehives.edit', compact('apiary', 'beehive', 'beehiveAccessories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Apiary $apiary, Beehive $beehive)
    {
        // Apiary $apiary jest konieczne dla routingu, tak mi się wydaje - bez tego wypierdala jakiś głupi błąd i nie chce się zaktualizować

        $this->authorize('update', $beehive);

        $formFields = $request->validate([
            'name' => ['required', 'max:255'],
            'description' => ['required'],
            'type' => ['required', 'max:255'],
            'bodies' => ['required', 'numeric', 'integer'],
            'bottoms' => ['required', 'max:255'],
            'extensions' => ['required', 'numeric', 'integer'],
            'half_extensions' => ['required', 'numeric', 'integer'],
            'frames' => ['required', 'numeric', 'integer'],
            'note' => []
        ]);

        $formFields['note'] = str_replace(array("\r", "\n"), ' ', $request->input('note')); // zamień znaki nowej lini na spację dopóki nie naprawię alpine.js przy okienku notatki

        $beehive->update($formFields);

        $beehive->beehiveAccessories()->sync($request->input('beehive_accessory', [])); //zaktualizacji tablice asocjacyjną beehive_beehive_accessories w relacji many to many


        return back()->with('message', 'Ul został zaktualizowany!');
    }

    public function updateNote(Request $request, Apiary $apiary, Beehive $beehive){

        $this->authorize('update', $beehive);
        $updatedNote = str_replace(array("\r", "\n"), ' ', $request->input('note')); // zamień znaki nowej lini na spację dopóki nie naprawię alpine.js przy okienku notatki
        $beehive->note = $updatedNote;
        $beehive->save();

        return back()->with('message', 'Notatka została zaktualizowana');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Apiary $apiary, Beehive $beehive)
    {
        // Apiary $apiary jest konieczne dla routingu, tak mi się wydaje - bez tego wypierdala jakiś głupi błąd i nie chce się zaktualizować

        $this->authorize('delete', $beehive);

        $beehive->delete();
        return redirect()->route('beehives_index', $apiary)->with('message', 'Ul został usunięty!');
    }

    /**
     * Beehives manage page.
     */
    public function manage()
    {
        return view('beehives.manage', ['apiaries' => auth()->user()->apiaries()->with('beehives')->get()]);
    }

}
