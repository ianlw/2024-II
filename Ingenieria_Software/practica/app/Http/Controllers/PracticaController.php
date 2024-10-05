<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorepracticaRequest;
use App\Http\Requests\UpdatepracticaRequest;
use App\Models\Practica;
use Illuminate\Http\Request;
use PHPUnit\Framework\Attributes\Ticket;

class PracticaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $practicas = Practica::orderBy('id', 'desc')->paginate(5);
        return view('practica.index', compact('practicas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('practica.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorepracticaRequest $request)
    {
        $practica = new Practica;
        $practica->nombre = $request->nombre;
        $practica->edad = $request->edad;
        $practica->estado = $request->estado == 0 ? 0 : 1;
        $practica->tipo = $request->tipo;
        $practica->save();
        return redirect()->route('practica.index')->with('mensaje', 'Acción realizada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Practica $practica)
    {
        $practica = Practica::find($practica->id);
        return view('practica.show', compact('practica'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Practica $practica)
    {
        $practica = Practica::find($practica->id);
        return view('practica.edit', compact('practica'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepracticaRequest $request, Practica $practica)
    {
        $practica = Practica::find($practica->id);
        $practica->nombre = $request->nombre;
        $practica->edad = $request->edad;
        $practica->estado = $request->estado == 0 ? 0 : 1;
        $practica->tipo = $request->tipo;
        $practica->save();
        return redirect()->route('practica.index')->with('mensaje', 'Acción realizada correctamente - update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Practica $practica)
    {
        Practica::find($practica->id)->delete();
        return back()->with('mensaje', 'eliminado');
    }
}
