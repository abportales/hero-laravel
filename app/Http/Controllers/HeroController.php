<?php

namespace App\Http\Controllers;

use App\Hero;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    public function index()
    {
        //referencia al modelo el cual obtiene la BD
        $heroes = Hero::all();
        //le mandamos los datos de la BD a la vista
        return view('admin.heroes.index', ['heroes' => $heroes]);
    }

    public function create()
    {
        return view('admin.heroes.create');
    }

    //contiene todos los datos que almacenaremos
    //el request viene con los datos del form
    public function store(Request $request)
    {
        return $this->saveHero($request, null);
    }

    public function edit($id)
    {
        $hero = Hero::find($id);
        return view('admin.heroes.edit', ['hero' => $hero]);
    }

    public function update(Request $request, $id)
    {
        return $this->saveHero($request, $id);
    }

    public function destroy($id)
    {
        $hero = Hero::find($id);

        $hero->delete();

        return redirect()->route('heroes.index');
    }

    public function saveHero(Request $request, $id)
    {
        if( $id ){
            $hero = Hero::find($id);
        } else {
            $hero = new Hero();
            $hero->xp = 0;
            $hero->level_id = 1;
        }

        $hero->name = $request->input('name');
        $hero->hp = $request->input('hp');
        $hero->atq = $request->input('atq');
        $hero->def = $request->input('def');
        $hero->luck = $request->input('luck');
        $hero->coins = $request->input('coins');
        
        $hero->save();

        return redirect()->route('heroes.index');
    }
}
