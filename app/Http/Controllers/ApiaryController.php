<?php

namespace App\Http\Controllers;

use App\Models\Apiary;
use App\Models\Beehive;
use App\Models\Flora;
use Illuminate\Auth\Access\AuthorizationException;
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
        if (auth()->check()) {
            $user = auth()->user();
            $allApiaries = $user->apiaries()->latest()->get();
            $apiaries = $user->apiaries()->latest()->filter(request(['search']))->paginate(4);

            // Pobierz wszystkie id apiaries
            $apiaryIds = $apiaries->pluck('id')->toArray();

            // Pobierz beehives przypisane do apiaries użytkownika
            $beehives = Beehive::whereIn('apiary_id', $apiaryIds)->get();

            // Liczba wszystkich ramek w ulach
            $totalFrames = $beehives->sum('frames');


            // Pobierz dane pogodowe dla pasiek
            $weatherData = $this->getWeatherData($apiaries);

            // Zmapuj dane pogodowe i ikony do pasiek
            $apiariesWithWeather = $apiaries->map(function ($apiary) use ($weatherData) {
                $apiaryWeatherData = null;
                foreach ($weatherData as $item) {
                    if ($item['apiary_id'] === $apiary->id) {
                        $apiaryWeatherData = $item['weather_data'];
                        break;
                    }
                }
                $apiary->weather_data = $apiaryWeatherData;
                $apiary->weather_icon = $this->getWeatherIcon($apiaryWeatherData);
                return $apiary;
            });
        }

        else{
                $apiaries = collect(); // Jeżeli nie jest zalogowany zwracana jest pusta kolekcja pasiek
                $beehives = collect();
                $totalFrames = 0;
                $apiariesWithWeather = collect();
                $allApiaries = collect();
            }

            return view('apiaries.index', [
                'apiaries' => $apiariesWithWeather,
                'originalApiaries' => $apiaries, // Przekazanie oryginalnych apiaries do widoku dla paginacji
                'allApiaries' => $allApiaries,
                'beehives' => $beehives,
                'totalFrames' => $totalFrames
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


        $formFields = $request->validate([
            'name' => ['required', 'unique:apiaries', 'max:255'],
            'description' => ['required'],
            'flora' => ['required', 'array', 'min:1'],
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

        $coordinates = $this->getGeoCoordinates(
            $request->input('street_number'),
            $request->input('street_name'),
            $request->input('city'),
            $request->input('country')
        );

        if ($coordinates) {
            $formFields['latitude'] = $coordinates['latitude'];
            $formFields['longitude'] = $coordinates['longitude'];
        }


//        dd($formFields);

        $apiary = Apiary::create($formFields);

        $apiary->floras()->sync($request->input('flora', [])); //pobranie tablicy wartości dla flora z requesta i zsychnronizowanie z relacją

        return redirect('/')->with('message', 'Pasieka została utworzona!');
    }

    /**
     * Display the specified resource.
     * @throws AuthorizationException
     */
    public function show(Apiary $apiary)
    {
        $this->authorize('view', $apiary); // sprawdź czy pasieka którą użytkownik próbuje wyświetlić należy faktycznie do niego, więcej w app/Policies/ApiaryPolicy

        // Pobierz dane pogodowe dla tej pasieki
        $weatherDataCollection = $this->getWeatherData(collect([$apiary]));

        // Wyciągnij dane pogodowe dla tej pasieki
        $weatherData = null;
        if ($weatherDataCollection->isNotEmpty()) {
            $weatherData = $weatherDataCollection->first()['weather_data'];
        }

        // Pobieramy odpowiednią ikonę pogodową
        $weatherIcon = $this->getWeatherIcon($weatherData);

        return view('apiaries.show', [
            'apiary' => $apiary,
            'weatherData' => $weatherData,
            'weatherIcon' => $weatherIcon,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Apiary $apiary)
    {
        $floras = Flora::all(); // pobierz wszystkie rekordy z tabeli floras

        return view('apiaries.edit', compact('apiary', 'floras'));
    }

    /**
     * Update the specified resource in storage.
     * @throws AuthorizationException
     */
    public function update(Request $request, Apiary $apiary)
    {
        $this->authorize('update', $apiary);

        //Akcja możliwa tylko wtedy jeżeli pasieka należy do zalogowanego użytkownika
        if($apiary->user_id != auth()->id()){
            abort(403, 'Nieautoryzowana akcja');
        }

        $formFields = $request->validate([
            'name' => ['required', 'max:255'],
            'description' => ['required'],
            'flora' => ['required', 'array', 'min:1'],
            'street_number' => ['required', 'numeric', 'integer'],
            'street_name' => ['required'],
            'city' => ['required'],
            'country' => ['required'],
            'zip_code' => ['required']
        ]);

        if($request->hasFile('photo')){
            $formFields['photo'] = $request->file('photo')->store('apiaries_photos', 'public');
        }

        $apiary->update($formFields); //zaktualizuj kolumny tabeli apiary

        $apiary->floras()->sync($request->input('flora', [])); // zaktualizacji tablice asocjacyjną apiary_flora w relacji many to many

        return back()->with('message', 'Pasieka została zaktualizowana! ');
    }

    /**
     * Remove the specified resource from storage.
     * @throws AuthorizationException
     */
    public function destroy(Apiary $apiary)
    {
        $this->authorize('delete', $apiary);

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
        return view('apiaries.manage', ['apiaries' => auth()->user()->apiaries()->with('beehives')->get()]);
    }



    //    Function for geocoding asddress
    private function getGeoCoordinates($street_number, $street_name, $city, $country) {
        $address = ($street_name === $city) ? "{$street_name} {$street_number}, {$country}" : "{$street_name} {$street_number}, {$city}, {$country}";
        $address = urlencode($address);

        $url = "https://nominatim.openstreetmap.org/search?format=json&q={$address}";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, 'YourAppName/1.0 (Your contact information)'); // Zastąp 'YourAppName/1.0 (Your contact information)' swoją nazwą aplikacji i danymi kontaktowymi

        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response);

        if (!empty($data[0])) {
            $lat = $data[0]->lat;
            $lng = $data[0]->lon;

            return ['latitude' => $lat, 'longitude' => $lng];
        }

        return null;
    }

    // Pobierz dane pogodowe na podstawie współrzędnych pasieki
    private function getWeatherData($apiaries)
    {
        $apiariesWeather = collect();
        $apiKey = "6d2262bd13338370a8cd281f4b99e76c";

        foreach ($apiaries as $apiary) {
            if ($apiary->latitude && $apiary->longitude) {
                $lat = $apiary->latitude;
                $lon = $apiary->longitude;

                $url = "https://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$lon&appid=$apiKey&units=metric";

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_HTTPGET, 1);

                $weatherData = curl_exec($ch);

                if ($weatherData === false) {
                    // Możesz tutaj dodać logowanie błędów
                    continue;
                }

                $weatherData = json_decode($weatherData);
                curl_close($ch);

                $apiariesWeather->push([
                    'apiary_id' => $apiary->id,
                    'weather_data' => $weatherData
                ]);
            }
        }

        return $apiariesWeather;
    }

    private function getWeatherIcon($weatherData)
    {
        $weatherCode = $weatherData->weather[0]->id ?? null;

        if ($weatherCode >= 200 && $weatherCode < 300) {
            return 'fas fa-bolt';
        } elseif ($weatherCode >= 300 && $weatherCode < 400) {
            return 'fas fa-cloud-rain';
        } elseif ($weatherCode >= 500 && $weatherCode < 600) {
            return 'fas fa-cloud-showers-heavy';
        } elseif ($weatherCode >= 600 && $weatherCode < 700) {
            return 'fas fa-snowflake';
        } elseif ($weatherCode >= 700 && $weatherCode < 800) {
            return 'fas fa-smog';
        } elseif ($weatherCode == 800) {
            return 'fas fa-sun';
        } elseif ($weatherCode == 801) {
            return 'fas fa-cloud-sun';
        } elseif ($weatherCode >= 802 && $weatherCode < 805) {
            return 'fas fa-cloud';
        } else {
            return 'fas fa-question';
        }
    }





}
