
<body>
    @include('includes.header')
    <div class="misre mt-5">
        <br><br>
        <h1><strong>Mis Reservas</strong></h1>
        <hr/>
    </div>
    @if (session()->has('success'))
    <div class="alert alert-success">
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
                
                <td><a class="btn btn-secondary btn-md" href="eliminar/id={{$reserva->id}}">Eliminar</a></td>
            </tr>
              
            @endforeach
        @endisset
    </table>
    <a class="btn btn-secondary btn-md" href="{{ url('logout') }}">cerrar sesion</a>

    @include('includes.footer')
</body>

</html>
