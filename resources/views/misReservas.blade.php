<body>
    @include('includes.header')
    <script>
        // Obtener la alerta
        $(document).ready(function() {
            var alerta = document.getElementById("alerta");

            // Configurar el temporizador para ocultar la alerta después de 2 segundos
            setTimeout(function() {
                alerta.style.display = "none";
            }, 2500);
        }, );
    </script>
    <div class="misre mt-5">
        <br><br>
        <h1><strong>Mis Reservas</strong></h1>
        <hr />
    </div>
    @if (session()->has('success'))
        <div id="alerta" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    <table class="table">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Menu</th>
                <th>Comensales</th>
                <th>Precio Menu</th>
                <th>Precio total</th>
        </thead>

        @isset($lista)

            @foreach ($lista as $reserva)
                <td>{{ $reserva->horarios->fecha }}</td>
                <td>{{ $reserva->horarios->hora }}</td>
                <td>{{ $reserva->menus->name }}</td>
                <td>{{ $reserva->mesas->asientos }}</td>
                <td>{{ $reserva->menus->precio }}</td>
                <td>{{ $reserva->menus->precio * $reserva->mesas->asientos }}</td>

                <td><a class="btn btn-secondary btn-md" href="eliminar/id={{ $reserva->id }}">Eliminar</a></td>
                </tr>
            @endforeach
        @endisset
    </table>

    @include('includes.footer')
</body>

</html>
