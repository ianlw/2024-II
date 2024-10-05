<head>
    <meta charset="UTF-8">
    <title>Sistema de tickets</title>
</head>
<h1>
    Lista de tickets <br>
    <a href="{{ route('tickets.create') }}">Nuevo ticket</a>
</h1>
@include('partials.info')
<table border="1">
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
                    <a title="Ver" href="{{ route('tickets.show', $ticket) }}">Ver</a>
                    <a title="Editar" href="{{ route('tickets.edit', $ticket) }}">Editar</a>
                    <form method="POST" action="{{ route('tickets.destroy', $ticket) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>

                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $tickets->links() }}
