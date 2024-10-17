@extends('adminlte::page')

@section('title', 'Sistema de tickets')

@section('content_header')
<meta charset="UTF-8">
    <h1>Lista de tickets</h1>
@stop

@section('content')
    <a href="{{ route('tickets.create') }}" class="btn btn-primary">Nuevo ticket</a>
    
    @include('partials.info')
    <br>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
           
            </div>
            <div class="box-body">

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Estate</th>
                <th>Operaciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->nombre }}</td>
                    <td>{{ $ticket->tipo_tramite }}</td>
                    <td>{{ $ticket->fecha }}</td>
                    <td>{{ $ticket->estado }}</td>
                    <td>{{ $ticket->state }}</td>
                    <td>
                        <a title="Ver" class="btn btn-info" href="{{ route('tickets.show', $ticket) }}">Ver</a>
                        <a title="Editar" class="btn btn-warning" href="{{ route('tickets.edit', $ticket) }}">Editar</a>
                        <form method="POST" action="{{ route('tickets.destroy', $ticket) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    </div>
    </div>
</div>

    {{ $tickets->links() }}
    @stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
