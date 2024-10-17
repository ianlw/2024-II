@extends('adminlte::page')

@section('title', 'Sistema de tickets')

@section('content_header')
<meta charset="UTF-8">
@stop

@section('content')
<h1>
    Agregar un Ticket
    <a href="{{route('tickets.index')}}">Volver</a>
</h1>

@include('partials.error')
<form method="POST" action="{{route('tickets.store')}}">
    @csrf
    Nombres <input type="text" name="nombre"/><br//>
    Tipo <br/><input type="radio" name="tipo_tramite" value="PLATAFORMA"/>Plataforma<br/>
    <input type="radio" name="tipo_tramite" value="VENTANILLA"/>Ventanilla<br/>
    Estado <br/><input type="checkbox" disabled/>Atendido<br/>
    <button type="submit">Guardar</button>
</form>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
