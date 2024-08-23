<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarjeta de Crédito/Débito</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Estilos personalizados */
        body {
            background-color: #000000;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            color: white;
            margin: 0;
        }

        .navbar {
            background-color: #000000;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
        }

        .navbar-brand img {
            width: 40px;
        }

        .navbar-nav .nav-link {
            color: #f1f1f1;
            transition: color 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #f0a500;
        }

        .navbar-nav .nav-link.active {
            color: #f0a500;
        }

        .main-content {
            margin-top: 100px;
            width: 100%;
            max-width: 1200px;
        }

        .card-custom {
            background: linear-gradient(135deg, #1c1c1c, #2c2c2c);
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 8px 16px rgba(255, 255, 255, 0.3);
            color: white;
            width: 100%;
        }

        .card-header-custom {
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 15px;
        }

        .card-body-custom input,
        .card-body-custom select {
            background-color: #898888;
            border: none;
            border-radius: 8px;
            color: #fff;
            padding: 10px;
            margin-bottom: 10px;
        }

        .card-body-custom label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
            color: #f0a500;
        }

        .btn-pagar {
            background-color: #f0a500;
            color: #000;
            border-radius: 8px;
            padding: 12px;
            font-weight: bold;
            border: none;
            transition: background-color 0.3s;
        }

        .btn-pagar:hover {
            background-color: #d98d00;
        }

        .card-footer-custom {
            text-align: center;
            margin-top: 20px;
        }

        .resumen-reserva {
            background-color: #2c2c2c;
            padding: 20px;
            border-radius: 15px;
            font-size: 1.2rem;
            line-height: 1.5;
            width: 100%;
        }

        .footer {
            background-color: #000000;
            color: white;
            padding: 20px 0;
            width: 100%;
            bottom: 0;
        }

        .footer .container {
            max-width: 1200px;
            margin: auto;
        }

        .footer .text-warning {
            color: #f0a500 !important;
        }

        .footer a {
            color: #f1f1f1;
            text-decoration: none;
        }

        .footer a:hover {
            color: #f0a500;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/logo.png') }}" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Inicio</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('servicios') }}">Mis Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('misreservas') }}">Mis Reservaciones</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="d-flex justify-content-center align-items-center flex-grow-1">
        <div class="main-content row">
            <div class="col-md-6 mb-4">
                <div class="resumen-reserva">
                    <h4>Resumen de la Reserva</h4>
                    <!-- Información de la reserva -->
                    <p><strong>Nombre:</strong> {{ session('datosReserva.nombre') }}</p>
                    <p><strong>Apellido:</strong> {{ session('datosReserva.apellido') }}</p>
                    <p><strong>Habitación Seleccionada:</strong>
                        @foreach ($habitaciones as $habitacion)
                            <p><strong>Habitación:</strong> {{ $habitacion->comentarios ?? 'Sin comentarios' }}</p>
                            <p><strong>Precio por día:</strong> ${{ $habitacion->tipoHabitacion->precio }}</p>
                        @endforeach
                    </p>
                    <p><strong>Extra Seleccionado:</strong>
                        @if (session('datosReserva.id_extra'))
                            {{ \App\Models\Extra::find(session('datosReserva.id_extra'))->nombre }}
                        @else
                            Ninguno
                        @endif
                    </p>
                    <p><strong>Fechas:</strong> {{ session('datosReserva.fecha_entrada') }} -
                        {{ session('datosReserva.fecha_salida') }}</p>
                    <p><strong>Número de Personas:</strong> {{ session('numero_personas') }}</p>
                    <p><strong>Total a Pagar:</strong> ${{ session('datosReserva.total') }}</p>
                </div>

            </div>

            <div class="col-md-6">
                <div class="card card-custom">
                    <div class="card-header card-header-custom text-center">
                        Tarjeta de Crédito/Débito
                    </div>
                    <div class="card-body card-body-custom">
                        <form id="paymentForm" action="{{ route('procesar.pago') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nombre del Titular</label>
                                <input class="form-control" id="name" name="name" type="text"
                                    placeholder="Nombre del titular" required>
                            </div>
                            <div class="form-group">
                                <label for="ccnumber">Número de Tarjeta</label>
                                <input class="form-control" id="ccnumber" name="ccnumber" type="text"
                                    placeholder="0000 0000 0000 0000" autocomplete="off" required maxlength="16"
                                    pattern="\d{16}">
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-4">
                                    <label for="ccmonth">Mes</label>
                                    <select class="form-control" id="ccmonth" name="ccmonth" required>
                                        <option>01</option>
                                        <option>02</option>
                                        <option>03</option>
                                        <option>04</option>
                                        <option>05</option>
                                        <option>06</option>
                                        <option>07</option>
                                        <option>08</option>
                                        <option>09</option>
                                        <option>10</option>
                                        <option>11</option>
                                        <option>12</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="ccyear">Año</label>
                                    <select class="form-control" id="ccyear" name="ccyear" required>
                                        <option>2024</option>
                                        <option>2025</option>
                                        <option>2026</option>
                                        <option>2027</option>
                                        <option>2028</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="cvv">CVV/CVC</label>
                                    <input class="form-control" id="cvv" name="cvv" type="text"
                                        placeholder="123" required maxlength="3" pattern="\d{3}">
                                </div>
                            </div>
                            <div class="card-footer card-footer-custom">
                                <button class="btn btn-pagar w-100" type="submit">Pagar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <div class="row text-center text-md-start">
                <!-- Sección Redes Sociales -->
                <div class="col-md-3 mb-3">
                    <h5 class="text-warning">Síguenos</h5>
                    <a href="#" class="text-white me-2">
                        <i class="fab fa-facebook fa-2x"></i>
                    </a>
                    <a href="#" class="text-white me-2">
                        <i class="fab fa-twitter fa-2x"></i>
                    </a>
                    <a href="#" class="text-white me-2">
                        <i class="fab fa-instagram fa-2x"></i>
                    </a>
                    <a href="#" class="text-white me-2">
                        <i class="fab fa-linkedin fa-2x"></i>
                    </a>
                </div>

                <!-- Sección Contacto -->
                <div class="col-md-3 mb-3">
                    <h5 class="text-warning">Contacto</h5>
                    <p class="mb-1 text-white">
                        <i class="fas fa-phone-alt me-2"></i>+123 456 7890
                    </p>
                    <p class="mb-1 text-white">
                        <i class="fas fa-envelope me-2"></i>info@daycameron.com
                    </p>
                </div>

                <!-- Sección Socios -->
                <div class="col-md-3 mb-3">
                    <h5 class="text-warning">Socios</h5>
                    <ul class="list-unstyled text-white">
                        <li><a href="#" class="text-white">Socio 1</a></li>
                        <li><a href="#" class="text-white">Socio 2</a></li>
                        <li><a href="#" class="text-white">Socio 3</a></li>
                    </ul>
                </div>

                <!-- Sección Derechos Reservados -->
                <div class="col-md-3 mb-3">
                    <h5 class="text-warning">DayCameron</h5>
                    <p class="text-white">© 2024 DayCameron. Todos los derechos reservados.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Validación de formulario -->
    <script>
        document.getElementById('paymentForm').addEventListener('submit', function(event) {
            const cardNumber = document.getElementById('ccnumber').value;
            const cvv = document.getElementById('cvv').value;

            // Validar que el número de tarjeta tenga exactamente 16 dígitos
            if (!/^\d{16}$/.test(cardNumber)) {
                alert('El número de la tarjeta debe tener 16 dígitos.');
                event.preventDefault(); // Detener el envío del formulario
            }

            // Validar que el CVV tenga exactamente 3 dígitos
            if (!/^\d{3}$/.test(cvv)) {
                alert('El CVV debe tener 3 dígitos.');
                event.preventDefault(); // Detener el envío del formulario
            }
        });
    </script>
</body>

</html>
