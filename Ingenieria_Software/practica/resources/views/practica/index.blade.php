<head>
    <meta charset="UTF-8">
    <title>Sistema de practicas</title>
</head>
<h1>
    Lista de practicas <br>
    <a href="{{ route('practica.create') }}">Nuevo practica</a>
</h1>
@include('partials.info')
<table border="1">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Edad</th>
            <th>Estado</th>
            <th>Tipo</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($practicas as $practica)
            <tr>
                <td>{{ $practica->nombre }}</td>
                <td>{{ $practica->edad }}</td>
                <td>{{ $practica->estado }}</td>
                <td>{{ $practica->tipo }}</td>
                <td>
                    <a title="Ver" href="{{ route('practica.show', $practica) }}">Ver</a>
                    <a title="Editar" href="{{ route('practica.edit', $practica) }}">Editar</a>
                    <form method="POST" action="{{ route('practica.destroy', $practica) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>

                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $practicas->links() }}
