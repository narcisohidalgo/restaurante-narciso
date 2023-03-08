@include('includes.header')

<body>

    <br><br><br><br><br>
    <div class="contacto">
        <h1>CONTACTO</h1>
    </div>

    @if (Auth::check())

    <div class="container mt-5 mb-5">
        <div class="abs-center">

            <form class="border p-5" id="form-confirmar-R" action="/comentario" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nombre">{{ __('Nombre') }}</label>
                    <input type="text" readonly value="{{ Auth::user()->name }}" name="nombre" id="nombre"
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
                    <label for="email">{{ __('Email Address') }}</label>
                    <input id="email" type="email" readonly value="{{ Auth::user()->email }}" class="form-control mb-3" @error('email') is-invalid @enderror
                        name="email" value="{{ old('email') }}" required autocomplete="email"
                        title="El email no es válido">
                    @error('email')
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

    @else

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
                    <label for="email">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="form-control mb-3" @error('email') is-invalid @enderror
                        name="email" value="{{ old('email') }}" required autocomplete="email"
                        title="El email no es válido">
                    @error('email')
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
    @endif

    @include('includes.footer')


    