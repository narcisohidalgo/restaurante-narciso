@include('includes.header')

<body>

    <br><br><br><br><br>
    <div class="contacto">
        <h1>CONTACTO</h1>
    </div>

    <div class="container mt-5 mb-5">
        <div class="abs-center">

            <form class="border p-5" id="form-confirmar-R" action="/comentario" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nombre">{{ __('Nombre') }}</label>
                    <input type="text" name="nombre" id="nombre"
                        class="form-control mb-3 @error('nombre') is-invalid @enderror" name="nombre"
                        value="{{ old('nombre') }}" required autocomplete="nombre" autofocus
                        pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="El nombre no es válido">
                    @error('nombre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="apellidos">{{ __('Apellidos') }}</label>
                    <input type="text" name="apellidos" id="apellidos"
                        class="form-control mb-3 @error('apellidos') is-invalid @enderror" name="apellidos"
                        value="{{ old('apellidos') }}" required autocomplete="apellidos" autofocus
                        pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="Los apellidos no son válidos">
                    @error('apellidos')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="descripcion">{{ __('Descripcion') }}</label>
                    <textarea class="form-control mb-3" name="descripcion" required></textarea>
                </div>

                <div class="form-btn mt-5 ">
                    <button type="submit" id="boton" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>
    </div>
    @include('includes.footer')
