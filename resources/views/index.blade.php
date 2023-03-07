@include('includes.header')


<script>
    // Obtener la alerta
    $(document).ready(function() {
        var alerta = document.getElementById("alerta");

        // Configurar el temporizador para ocultar la alerta después de 2 segundos
        setTimeout(function() {
            alerta.style.display = "none";
        }, 3500);
    }, );
</script>

@if (session()->has('success'))
    <br><br><br><br>
    <div class="alert alert-success" id="alerta">
        <h4>{{ session('success') }}</h4>
    </div>
@endif


<section>
    <div class="banner">
        <div class="sombra">
            <h1>Restaurante Narciso</h1>
            <p>Comida tradicional</p>

            <hr />
            <div class="cont_banner_link">
                <a class="banner_link" href="calendario">RESERVAR</a>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row nar_cont_sec_1">
            <div class="col-md-9">
                <h2><b>Restaurante Narciso</b></h2>
                <p><i>El mejor precio con la mejor calidad</i></p>
                <hr />
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae veritatis in, alias
                    inventore repellendus dolore, accusamus ratione id, nesciunt quia nihil eveniet at unde qui
                    vero? Rerum odit facilis accusantium.</p>
            </div>
            <div class="nar_cont_sec_1_link col-md-3 text-center">
                <button id="boton-menu" class="btn btn-secondary btn-md">Elige tu menu favorito</button>
                <script>
                    $(document).ready(function() {
                        var bajar = document.getElementById("boton-menu");
                        bajar.addEventListener("click", function() {
                            $('html,body').animate({
                                scrollTop: $("#menu").offset().top
                            }, 'fast');
                        });
                    }, );
                </script>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Presentacion</h2>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fugiat error rem alias maiores? Ullam
                    deserunt tempora id provident consequatur. Nulla consequatur magnam quasi rem ad eos ducimus
                    facilis minima asperiores?</p>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="nar_cont_banner_sec_3">
        <div class="container-sombra">
            <div class="row">
                <div class="col-md-4">
                    <h2>Establecimientos</h2>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Omnis quos, deserunt excepturi
                        pariatur, voluptatem, necessitatibus culpa laboriosam impedit quisquam velit tempore a
                        voluptates repellendus autem nobis iusto consequatur illo? Ipsa?</p>
                    <a class="btn btn-secondary btn-md" href="#">Salon</a>
                </div>
                <div class="nar_cont_img col-md-8 text-center">
                    <img src="../img/img-restaurante3.png" class="img-fluid" alt="primer plato">
                </div>
            </div>
        </div>
    </div>

</section>

<section id="menu">
    <br><br><br><br>
    <div class="container-menu" id="container-menu">
        <div class="row text-center">
            <div class="col-md-12">
                <hr />
                <h2>Menus</h2>
                <p>Los mejores platos</p>
                <hr />
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-4">
                <img id="entrante" src="../img/entrante.png" class="img-fluid" alt="entrante">
                <h3>Entrante</h3>
                <p>Arancinis</p>
            </div>
            <div class="col-md-4">
                <img id="plato" src="../img/menu 2.jpg" class="img-fluid" alt="primer plato">
                <h3>Primer Plato</h3>
                <p>Solomillo con patatas</p>
            </div>
            <div class="col-md-4">
                <img id="postre" src="../img/postre.png" class="img-fluid" alt="postre">
                <h3>Postre</h3>
                <p>Tarta de limón de Cristina Oria</p>
            </div>
        </div>
    </div>
</section>

@include('includes.footer')
