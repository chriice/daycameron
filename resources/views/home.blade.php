<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Paradisiaco</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS de Bootstrap Datepicker -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <!-- JS de jQuery (si no lo tienes) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- JS de Bootstrap Datepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <!--nabvar-->
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
        .header-content {
            margin-top: 50px;
        }
        .header-content h1 {
            font-size: 3rem;
            font-weight: bold;
        }
        .header-content p {
            font-size: 1.2rem;
        }
        .header-content .btn-descubre {
            background-color: #f1c40f;
            color: #000;
            border-radius: 20px;
            padding: 10px 20px;
            font-size: 1.2rem;
            margin-top: 20px;
        }
        .header-content .btn-descubre:hover {
            background-color: #d4ac0d;
        }
        .hotel-img {
            width: 100%;
            border-radius: 15px;
            margin-top: 20px;
        }
        .btn-check:checked + .btn-warning {
            background-color: #f1c40f;
            color: #000;
        }
    </style>
    <style>
      .btn-custom {
        background-color: #FFC107; /* Color de fondo similar al proporcionado */
        color: #000; /* Color de texto negro */
        border: none; /* Sin bordes */
        border-radius: 30px; /* Bordes redondeados */
        padding: 10px 20px; /* Espaciado interno */
        font-weight: bold; /* Texto en negrita */
        text-align: center; /* Centrar el texto */
        margin-bottom: 20px; /* Espacio entre los botones y los campos de abajo */
        height: 50px; /* Altura fija para los botones */
        display: flex;
        align-items: center; /* Centrar verticalmente el texto */
        justify-content: center; /* Centrar horizontalmente el texto */
    }

    .btn-wide {
        width: 320px; /* Ancho mayor para el botón de "HOTEL + TRANSPORTE" */
    }

    .btn-custom.active, .btn-custom:hover, .btn-custom:focus {
        background-color: #FBC02D; /* Color más oscuro en hover/focus */
        color: #000; /* Asegurarse de que el texto permanezca negro */
    }

    .btn-group-toggle .btn {
        margin-right: 15px; /* Espaciado entre los botones */
    }

    .mb-4 {
        margin-bottom: 30px; /* Espacio entre los botones y los campos de reserva */
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
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Mi Reservación</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="container header-content mt-5">
        <div class="row align-items-center">
            <!-- Columna de texto -->
            <div class="col-md-6 text-center text-md-start">
                <h1>A TU ALCANCE UN</h1>
                <h1 class="text-warning">HOTEL PARADISIACO</h1>
                <p>Un auténtico oasis paradisíaco con vistas al litoral de arena blanca y un mar de colores únicos.</p>
                <a href="#" class="btn btn-descubre">DESCÚBRELO</a>
            </div>
    
            <!-- Columna de imagen -->
            <div class="col-md-6 text-center">
                <img src="{{ asset('images/hotel1.avif') }}" class="hotel-img" alt="Hotel 1">
            </div>
        </div>
    </div>
    

    <!-- Nueva Sección: Hotel + Transporte -->
    <div class="container my-5">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!--<div class="btn-group-toggle d-flex justify-content-center mb-4" data-toggle="buttons">
            <label class="btn btn-custom active me-3">
                <input type="radio" name="options" id="option1" autocomplete="off" checked> HOTEL
            </label>
            <label class="btn btn-custom btn-wide">
                <input type="radio" name="options" id="option2" autocomplete="off"> HOTEL + TRANSPORTE
            </label>
        </div>-->
        
        <form action="{{ route('buscar') }}" method="POST">
            @csrf
            <div class="row text-center justify-content-center">
                <div class="col-md-2 mb-3">
                    <input type="text" name="ciudad_origen" class="form-control" placeholder="CIUDAD DE ORIGEN" required>
                </div>
                <div class="col-md-2 mb-3">
                    <select name="hotel" class="form-control" required>
                        <option value="" disabled selected>Selecciona un hotel</option>
                        @foreach($hoteles as $hotel)
                            <option value="{{ $hotel->id_hotel }}">{{ $hotel->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 mb-3">
                    <input type="text" id="fecha_entrada" name="fecha_entrada" class="form-control" placeholder="Fecha de Entrada" required>
                </div>
                <div class="col-md-2 mb-3">
                    <input type="text" id="fecha_salida" name="fecha_salida" class="form-control" placeholder="Fecha de Salida" required>
                </div>
                <div class="col-md-2 mb-3">
                    <input type="number" name="numero_personas" class="form-control" placeholder="Número de personas" required>
                </div>
            </div>
        
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-warning">Buscar</button>
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
        </form>
        

        <style>
            /* Ajusta la altura del carrusel */
            .carousel {
                max-width: 600px; /* Ajusta el ancho máximo del carrusel */
                max-height: 350px; /* Ajusta la altura máxima del carrusel */
                margin: 0 auto; /* Centra el carrusel */
            }
        
            .carousel-inner img {
                max-width: 100%; /* Ajusta el ancho máximo de la imagen dentro del carrusel */
                max-height: 350px; /* Ajusta la altura máxima de la imagen dentro del carrusel */
                object-fit: cover; /* Asegura que la imagen se ajuste dentro del carrusel sin distorsión */
            }
        </style>
        
 
        <div class="row mt-4">
            <div class="col-12 d-flex justify-content-center">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('images/piscina1.webp') }}" class="d-block w-100" alt="">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/mar1.avif') }}" class="d-block w-100" alt="">
                        </div>
                        
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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
    
    
</body>
</html>

<script>
    $(document).ready(function(){
        // Calcular la fecha de mañana
        var tomorrow = new Date();
        tomorrow.setDate(tomorrow.getDate() + 1);

        // Inicializar el datepicker para la fecha de entrada
        $('#fecha_entrada').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            startDate: tomorrow
        }).on('changeDate', function(selected) {
            var startDate = new Date(selected.date.valueOf());
            startDate.setDate(startDate.getDate() + 1);
            $('#fecha_salida').datepicker('setStartDate', startDate);
        });

        // Inicializar el datepicker para la fecha de salida
        $('#fecha_salida').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            startDate: tomorrow
        });
    });
</script>



