@if (session('mensaje'))
    <div>
        <h1>¡Éxito!</h1>
        {{ session('mensaje') }}
    </div>
@endif
