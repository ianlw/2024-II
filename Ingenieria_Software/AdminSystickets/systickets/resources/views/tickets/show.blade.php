@extends('adminlte::page')

@section('title', 'Sistema de tickets')

@section('content_header')
<meta charset="UTF-8">

@stop

@section('content')

<h1>
    Ver un Ticket
    <a href="{{ route('tickets.index') }}">Volver</a>
</h1>

@include('partials.error')
<form>
    @csrf
    <b>ID:</b> <label>{{ $ticket->id }}</label><br />
    <b>Nombres:</b> <label>{{ $ticket->nombre }}</label><br />
    <b>Tipo:</b> <br />
    <input type="radio" {{ $ticket->tipo_tramite == 'PLATAFORMA' ? 'checked' : '' }} disabled />PLATAFORMA<br />
    <input type="radio" {{ $ticket->tipo_tramite == 'VENTANILLA' ? 'checked' : '' }} disabled />Ventanilla<br />
    <b>Fecha:</b> <label>{{ $ticket->fecha }}</label><br />
    <b>Estado:</b> <br /><input type="checkbox" {{ $ticket->estado == 1 ? 'checked' : '' }} disabled />Ventanilla<br />
    <b>Estate:</b> <label>{{ $ticket->state }}</label>
</form>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
