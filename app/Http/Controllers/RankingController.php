<?php

namespace App\Http\Controllers;

use App\Models\Ranking;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
class RankingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $rankings = Ranking::all();
            return view('dashboard',['rankings' => $rankings]);
    }
    public function indexMine()
    {
        $rankings = Ranking::orderBy('puntuacion', 'asc')->get();
        return view('dashboard',['rankings' => $rankings]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ranking= new Ranking;
        $ranking->name = $request->name;
        $ranking->puntuacion = $request->puntuacion;
        $ranking->save();
        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ranking $ranking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ranking $ranking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ranking $ranking)
    {
        $ranking = Ranking::find($request->id) ;
        $ranking->name = $request->name;
        $ranking->puntuacion = $request->puntuacion;
        $ranking->save();
        
        return redirect('/dashboard')->with('success', 'Registro actuaizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ranking $ranking)
    {
        $ranking->delete();

        return redirect('/dashboard')->with('success', 'Registro eliminado exitosamente');
    }
}
