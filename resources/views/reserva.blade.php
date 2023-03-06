@extends('layouts.app')

@section('content')

    <body>

        @include('includes.header')
        <br><br><br><br>
        <div class="reservas">
            <h1>RESERVAR</h1>
        </div>

        <main>
            @if (Auth::check())

                <div class="container mt-5 mb-5" style="width: 70rem;">
                    <div class="abs-center">

                        <form class="border p-5" id="form-confirmar-R" action="/reservar" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <p class="h4 mb-4 text-center"><span id="icono"
                                            class="material-symbols-outlined text-3xl m-2">
                                            calendar_month
                                        </span>{{ $fecha }}</p>
                                </div>
                                <div class="col-6">

                                    <p class="h4 mb-4 text-center"><span class="material-symbols-outlined text-3xl m-2">
                                            schedule
                                        </span>{{ $hora }}</p>
                                </div>
                            </div>

                            <input class="h4 mb-4 text-center" type="hidden" name="horario" value='{{ $id }}' />
                            <div class="form-group">
                                <label for="name">{{ __('Name') }}</label>
                                <input type="text" name="nombre" id="nombre"
                                    class="form-control mb-3 @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="El nombre no es válido">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="form-control mb-3"
                                    @error('email') is-invalid @enderror name="email" value="{{ old('email') }}"
                                    required autocomplete="email" title="El email no es válido">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phone">{{ __('telefono') }}</label>
                                <input id="phone" type="tel"
                                    class="form-control mb-3 @error('phone') is-invalid @enderror" name="phone"
                                    value="{{ old('phone') }}" required autocomplete="phone" autofocus pattern="[0-9]{9}" title="El teléfono no es válido">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="menu"> Menus</label>
                                <select name="menu">
                                    @foreach ($menus as $menu)
                                        <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="comensales"> Número de comensales</label>
                                <select name="comensales">
                                    @foreach ($asientos as $asiento)
                                    <option value="{{ $asiento->id }}">{{ $asiento->asientos }}</option>
                                @endforeach
                                </select>
                            </div>


                            <div class="select-editable">
                                <label for="tarjeta">{{ __('Tarjeta') }}</label>
                                <input class="card mt-1 @error('tarjeta') is-invalid @enderror" type="text"
                                    name="tarjeta" id="tarjeta" placeholder="Inserte su tarjeta"
                                    value="{{ old('tarjeta') }}" required autocomplete="tarjeta" autofocus pattern="[0-9]{16}" title="La tarjeta no es válida" />
                                @error('tarjeta')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <input type="hidden" id="hora" name="hora" value="{{ $hora }}">
                            <input type="hidden" id="fecha" name="fecha" value="{{ $fecha }}">

                            <div class="form-btn mt-5 ">
                                <button id="boton" class="btn btn-primary">Reservar</button>
                            </div>
                        </form>
                    @else
                        <div class="container mt-5 mb-5" style="width: 70rem;">
                            <div class="abs-center">

                                <form class="border p-5" id="form-confirmar-R" action="/reservaIN" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">
                                            <p class="h4 mb-4 text-center"><span id="icono"
                                                    class="material-symbols-outlined text-3xl m-2">
                                                    calendar_month
                                                </span>{{ $fecha }}</p>
                                        </div>
                                        <div class="col-6">

                                            <p class="h4 mb-4 text-center"><span
                                                    class="material-symbols-outlined text-3xl m-2">
                                                    schedule
                                                </span>{{ $hora }}</p>
                                        </div>
                                    </div>
                                    <input class="h4 mb-4 text-center" type="hidden" name="horario"
                                        value='{{ $id }}' />
                                        <div class="form-group">
                                            <label for="name">{{ __('Name') }}</label>
                                            <input type="text" name="name" id="name"
                                                class="form-control mb-3 @error('name') is-invalid @enderror" name="name"
                                                value="{{ old('name') }}" required autocomplete="name" autofocus pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="El nombre no es válido">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    <div class="form-group">
                                        <label for="email">{{ __('Email Address') }}</label>
                                        <input id="email" type="email" class="form-control mb-3"
                                            @error('email') is-invalid @enderror name="email" value="{{ old('email') }}"
                                            required autocomplete="email" title="El email no es válido">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="telefono">{{ __('telefono') }}</label>
                                        <input id="telefono" type="tel"
                                            class="form-control mb-3 @error('telefono') is-invalid @enderror" name="telefono"
                                            value="{{ old('telefono') }}" required autocomplete="telefono" autofocus pattern="[0-9]{9}" title="El teléfono no es válido">
                                        @error('telefono')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="menu"> Menus</label>
                                        <select name="menu">
                                            @foreach ($menus as $menu)
                                                <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                            @endforeach
                                            <p class="h4 mb-4 text-center"></p>
                                        </select>
                        
                                    </div>
                                    <div class="form-group">
                                        <label for="comensales"> Número de comensales</label>
                                        <select name="comensales">
                                            @foreach ($asientos as $asiento)
                                            <option value="{{ $asiento->id }}">{{ $asiento->asientos }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="select-editable">
                                        <label for="tarjeta">{{ __('Tarjeta') }}</label>
                                        <input class="card mt-1 @error('tarjeta') is-invalid @enderror" type="text"
                                            name="tarjeta" id="tarjeta" placeholder="Inserte su tarjeta"
                                            value="{{ old('tarjeta') }}" required autocomplete="tarjeta" autofocus pattern="[0-9]{16}" title="La tarjeta no es válida" />
                                        @error('tarjeta')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <input type="hidden" id="hora" name="hora" value="{{ $hora }}">
                                    <input type="hidden" id="fecha" name="fecha" value="{{ $fecha }}">

                                    <div class="form-btn mt-5 ">
                                        <button id="boton" class="btn btn-primary">Reservar</button>
                                    </div>
                                </form>                               
            @endif
            </div>
            </div>
            </div>
        </main>
        @include('includes.footer')
    </body>

    </html>
