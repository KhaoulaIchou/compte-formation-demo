<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formation;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

// use Illuminate\Support\Facades\DB;
// use Storage;

class FormationController extends Controller
{
    public function index()
    {
        return Inertia::render('Formations/Index', [

            'formations' => Formation::all()->map(function ($formation) {
                // $result = DB::table('comptes')->selectRaw('comptes.login')->join('formations', 'comptes.id', '=', 'formations.compte_id')->where('compte_id', Request::input('compte_id'))->get();
                return [
                    'id' => $formation->id,
                    'image' => asset('storage/' . $formation->image),
                    'designation' => $formation->designation,
                    'description' => $formation->description,
                    'fichier' => $formation->fichier, // b4iti tjibi smiya ta3 fichier rah aslan smiya saved in DB
                    'compte_id' => $formation->compte->login, // ila mchiti l model formation atalgay une fonction ta3 compte biha n9ad njib compte login
                ];
            })
        ]);
    }

    public function create()
    {
        return Inertia::render('Formations/Create');
    }
    public function store(Request $request)
    {
        $image = $request->file('image')->store('formations', 'public');
        $fichier = $request->file('fichier')->store('formations', 'public');
        Formation::create([
            'image' => $image,
            'fichier' => $fichier,
            'designation' => $request->input('designation'),
            'description' => $request->input('description'),
            'compte_id' => $request->input('compte_id'),
        ]);
        return Redirect::route('formations.index');
    }

    public function edit(Formation $formation)
    {
        return Inertia::render('Formations/Edit', [
            'image' => asset('storage/' . $formation->image),
            'fichier' => asset('storage/' . $formation->fichier),
            'formation' => $formation
        ]);
    }
    public function update(Formation $formation, Request $request)
    {
        $image = $formation->image;
        $fichier = $formation->fichier;
        if ($request->file('image')) {
            Storage::delete(['public/', $formation->image]);
            $image = $request->file('image')->store('formations', 'public');
        }
        if ($request->file('fichier')) {
            Storage::delete(['public/', $formation->fichier]);
            $fichier = $request->file('fichier')->store('formations', 'public');
        }
        $formation->update([
            'image' => $image,
            'fichier' => $fichier,
            'designation' => $request->input('designation'),
            'description' => $request->input('description'),
            'compte_id' => $request->input('compte_id'),
        ]);
        return Redirect::route('formations.index');
    }

    public function destroy(Formation $formation)
    {
        Storage::delete(['public/', $formation->image]);
        Storage::delete(['public/', $formation->fichier]);
        $formation->delete();
        return Redirect::back()->with('success', 'Formation deleted.');  // using redirect back without using a route
    }
}
