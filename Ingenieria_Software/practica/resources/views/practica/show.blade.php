<h1>
    Editar una Práctica
    <a href="{{ route('practica.index') }}">Volver</a>
</h1>

@include('partials.error')
<form method="POST" action="{{ route('practica.update', $practica) }}">
    @csrf
    @method('PUT')
    <b>ID:</b> <input type="text" value="{{ $practica->id }}" readonly /><br />
    Nombres <input type="text" name="nombre" value="{{ $practica->nombre }}" readonly /><br / />
    Edad <br /><input type="number" name="edad" value="{{ $practica->edad }}" readonly /><br />
    Estado <br /><input type="checkbox" name="estado" value="1" {{ $practica->estado == 1 ? 'checked' : '' }}
        disabled />Echo<br />
    Tipo <br /><input type="radio" name="tipo" value="Aceptado"
        {{ $practica->tipo == 'Aceptado' ? 'checked' : '' }} disabled />Aceptado<br />
    <input type="radio" name="tipo" value="Negado" {{ $practica->tipo == 'Negado' ? 'checked' : '' }}
        disabled />Negado<br />
</form>
