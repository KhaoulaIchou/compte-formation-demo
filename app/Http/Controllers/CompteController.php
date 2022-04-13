<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compte;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use Storage;
class CompteController extends Controller
{
    public function index(){
        return Inertia::render('Comptes/Index', [
            'comptes' => Compte::all()->map(function($compte){
                return [
                    'id' => $compte->id,
                    'avatar' => asset('storage/'. $compte->avatar),
                    'login' => $compte->login,
                    'email' => $compte->email,
                    'password' =>$compte->password,
                ];
            })
        ]);
    }

    public function create(){
        return Inertia::render('Comptes/Create');
    }
    public function store(Request $request){
        $avatar = $request->file('avatar')->store('comptes', 'public');
        Compte::create([
            'avatar' => $avatar,
            'login' => $request->input('login'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);
        return Redirect::route('comptes.index');
    }

    public function edit(Compte $compte){
        return Inertia::render('Comptes/Edit',[
            'avatar' => asset('storage/'. $compte->avatar),
            'compte' => $compte
        ]);
    } 
    public function update(Compte $compte, Request $request){
        $avatar = $compte->avatar;
        if($request->file('avatar')){
            Storage::delete(['public/', $compte->avatar]);
            $avatar = $request->file('avatar')->store('comptes', 'public');
        }
        $compte->update([
           'avatar' =>$avatar,
           'login' => $request->input('login'),
           'email' => $request->input('email'),
           'password' => $request->input('password'),
        ]);
        return Redirect::route('comptes.index');
    }

    public function destroy(Compte $compte){
        Storage::delete(['public/', $compte->avatar]);
        $compte->delete();
        return Redirect::route('comptes.index');
    }
}


