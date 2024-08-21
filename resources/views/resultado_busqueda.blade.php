<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Búsqueda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #000;
            color: #fff;
        }
        .navbar {
            background-color: #000;
        }
        .navbar-brand img {
            width: 50px;
        }
        .navbar-nav .nav-link {
            color: #fff;
        }
        .navbar-nav .nav-link.active {
            color: #f1c40f;
        }
        .btn-reservar {
            background-color: #f1c40f;
            color: #000;
            border-radius: 20px;
        }
        .btn-reservar:hover {
            background-color: #d4ac0d;
        }
        .hotel-img {
            width: 100%;
            border-radius: 15px;
            margin-top: 20px;
        }
        .btn-custom {
            background-color: #FFC107;
            color: #000;
            border: none;
            border-radius: 30px;
            padding: 10px 20px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s, border 0.3s;
        }
        .btn-wide {
            width: 320px;
        }
        .btn-custom.active, .btn-custom:hover, .btn-custom:focus {
            background-color: #FBC02D;
            color: #000;
            border: 2px solid #FFD700;
        }
        .btn-group-toggle .btn {
            margin-right: 15px;
        }
        .mb-4 {
            margin-bottom: 30px;
        }
        .card-custom {
            background-color: #333;
            border: none;
            border-radius: 15px;
            color: #fff;
        }
        .card-custom .card-title {
            color: #f1c40f;
        }
        .card-custom .btn-primary {
            background-color: #f1c40f;
            border: none;
            color: #000;
            border-radius: 20px;
            transition: background-color 0.3s, border 0.3s;
        }
        .card-custom .btn-primary:hover {
            background-color: #d4ac0d;
        }
        .selected {
            background-color: #d4ac0d !important;
            border: 2px solid #FFD700 !important;
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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">País</a>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Mi Reservación</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sección Opciones: Hotel y Hotel + Transporte -->
    <div class="container my-5">
        <h3 class="text-center text-warning">Habitaciones Disponibles</h3>
        <div class="btn-group-toggle d-flex justify-content-center mb-4" data-toggle="buttons">
            <label class="btn btn-custom me-3 option-button" id="hotel-option">
                <input type="radio" name="options" id="option1" autocomplete="off"> HOTEL
            </label>
            <label class="btn btn-custom btn-wide option-button" id="hotel-transporte-option">
                <input type="radio" name="options" id="option2" autocomplete="off"> HOTEL + TRANSPORTE
            </label>
        </div>

        <!-- Resultados de búsqueda -->
        <div class="row mt-4">
            @foreach($habitacionesDisponibles as $habitacion)
            <div class="col-md-4">
                <div class="card card-custom mb-3">
                    <img src="{{ asset('images/' . ($habitacion->id_tipo_habitacion == 1 ? 'hbitacionestandar.jpg' : 'habitacionpremium.jpg')) }}" class="card-img-top" alt="Imagen de Habitación">
                    <div class="card-body">
                        <h5 class="card-title">{{ $habitacion->comentarios ?? 'Habitación disponible' }}</h5>
                        <p class="card-text">Estado: {{ $habitacion->estado }}</p>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-primary btn-block option-button" id="reservar-{{ $habitacion->id_habitacion }}">Reservar</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer mt-5 py-4">
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

    <!-- Script para manejar la selección de las opciones -->
    <script>
        document.querySelectorAll('.option-button').forEach(button => {
            button.addEventListener('click', function() {
                document.querySelectorAll('.option-button').forEach(btn => btn.classList.remove('selected'));
                this.classList.add('selected');
            });
        });
    </script>
</body>
</html>
