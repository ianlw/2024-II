<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::orderBy('id', 'desc')->paginate(5);
        return view('tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketRequest $request)
    {
        $ticket = new Ticket;
        $ticket->nombre = $request->nombre;
        $ticket->tipo_tramite = $request->tipo_tramite;
        $ticket->fecha = now();
        $ticket->estado = 0;
        $ticket->state = 'ATENDIDO';
        $ticket->save();
        return redirect()->route('tickets.index')->with('mensaje', 'El ticket fue registrado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        $ticket = Ticket::find($ticket->id);
        return view('tickets.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        $ticket = Ticket::find($ticket->id);
        return view('tickets.edit', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        $ticket = Ticket::find($ticket->id);
        $ticket->nombre = $request->nombre;
        $ticket->tipo_tramite = $request->tipo_tramite;
        $ticket->estado = $request->estado == 0 ? 0 : 1;
        $ticket->state = $request->estado == 0 ? 'ATENDIDO' : 'PENDIENTE';
        $ticket->save();
        return redirect()->route('tickets.index')->with('mensaje', 'El ticket fue modificado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        Ticket::find($ticket->id)->delete();
        return back()->with('mensaje', 'El ticket fue eliminado');
    }
}
