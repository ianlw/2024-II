<h1>
    Agregar una Práctica
    <a href="{{ route('practica.index') }}">Volver</a>
</h1>

@include('partials.error')
<form method="POST" action="{{ route('practica.store') }}">
    @csrf
    Nombres <input type="text" name="nombre" /><br / />
    Edad <br /><input type="number" name="edad" /><br />
    Estado <br /><input type="checkbox" name="estado" value="1" />Echo<br />
    Tipo <br /><input type="radio" name="tipo" value="Aceptado" />Aceptado<br />
    <input type="radio" name="tipo" value="Negado" />Negado<br />
    <button type="submit">Guardar</button>
</form>
