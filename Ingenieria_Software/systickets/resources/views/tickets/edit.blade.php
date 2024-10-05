<h1>
    Ver un Ticket
    <a href="{{ route('tickets.index') }}">Volver</a>
</h1>

@include('partials.error')
<form method="POST" action="{{ route('tickets.update', $ticket) }}">
    @csrf
    @method('PUT')
    <b>ID:</b> <input type="text" value="{{ $ticket->id }}" readonly /><br />
    <b>Nombres:</b> <input type="text" name="nombre" value="{{ $ticket->nombre }}" /><br />
    <b>Tipo:</b> <br />
    <input type="radio" value="PLATAFORMA" {{ $ticket->tipo_tramite == 'PLATAFORMA' ? 'checked' : '' }}
        name="tipo_tramite" />PLATAFORMA<br />
    <input type="radio" value="VENTANILLA" {{ $ticket->tipo_tramite == 'VENTANILLA' ? 'checked' : '' }}
        name="tipo_tramite" />VENTANILLA<br />
    <b>Fecha:</b> <input type="text" value="{{ $ticket->fecha }}" readonly /><br />
    <b>Estado:</b> <br /><input type="checkbox" {{ $ticket->estado == 1 ? 'checked' : '' }}
        name="estado" />Atendido<br />
    <b>Estate:</b> <input type="text" value="{{ $ticket->state }}" readonly /><br>
    <button type="submit">Actualizar</button>
</form>
