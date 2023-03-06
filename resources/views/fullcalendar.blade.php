<head>
    <title>Dias de la reserva</title>

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" /> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.js"></script>
</head>

<body>
    @include('includes.header')


    <hr />
    <div class="container mt-5">
        <br />
        <h1 class="text-center text-primary"><u>Dias disponibles</u></h1>
        <br />

        <form id="Horario" action="/reserva" method="POST">
            @csrf
            <input type="hidden" id="hora" name="hora">
            <input type="hidden" id="fecha" name="fecha">
            <input type="hidden" id="horario" name="horario">
        </form>
        <div id="calendar"></div>
        <div id="disponible"><h2>Horas disponibles</h2></div>
        <div id="horas" class=" horas d-flex gap-4 m-3 text-2xl"></div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'prev,next'
                },
                initialView: 'dayGridMonth',
                selectable: true,
                editable: false,
                events: '/fullcalendar',
                eventClick: function(event) {
                    let fecha = moment(event.event.start).format('YYYY-MM-DD');
                    $.ajax({
                        type: 'GET',
                        url: 'fullcalendarajax',

                        data: {
                            fecha: fecha,
                        },
                        success: function(response) {

                            var horas = document.getElementById('horas');
                            horas.innerHTML = "";
                            response.forEach(function(response) {
                                var boton = document.createElement('button');
                                boton.className = "btn  btn-primary text-4xl mt-5";
                                boton.setAttribute("id", "boton-horas");
                                boton.innerHTML = response.hora;
                                horas.appendChild(boton);
                                boton.addEventListener("click", function() {
                                    document.getElementById('horario')
                                        .value = response.id;
                                    document.getElementById('hora').value =
                                        response.hora;
                                    document.getElementById('fecha').value =
                                        fecha;
                                    document.getElementById('Horario')
                                        .submit();

                                });

                            });
                        }
                    });
                    $('html, body').animate({
                        scrollTop: $("#horas").offset().top
                    }, 'fast');
                },
            });
            calendar.render();
        });
    </script>

    @include('includes.footer')

</body>

</html>
