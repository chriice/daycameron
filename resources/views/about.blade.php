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

        .btn-custom.active,
        .btn-custom:hover,
        .btn-custom:focus {
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
            min-height: 450px;
            /* Ajustar el tamaño mínimo de las tarjetas */
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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('servicios') }}">Mis Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Mi Reservación</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class=""
                aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" class="active"
                aria-current="true"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item">
                <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect>
                </svg>
                <div class="container mt-2">
                    <div class="carousel-caption text-start">
                        <h1 class="">Bienvenido a DayCameron.</h1>
                        <p class="opacity-75">En nos dedicamos a ofrecerte una experiencia todo incluido que va más allá
                            de tus expectativas. Desde el momento en que llegas, nuestro objetivo es que te sientas como
                            en casa, rodeado de lujo y confort. Descubre un lugar donde cada detalle está pensado para
                            tu bienestar y felicidad.</p>

                    </div>
                </div>
            </div>
            <div class="carousel-item active">
                <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect>
                </svg>
                <div class="container mt-2 ">
                    <div class="carousel-caption">
                        <h1>Tu Paraíso Todo Incluido.</h1>
                        <p>Disfruta de un escape inolvidable con todas las comodidades que mereces.</p>

                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect>
                </svg>
                <div class="container mt-2">
                    <div class="carousel-caption text-end">
                        <h1>Experiencias Incomparables, Servicio Excepcional.</h1>
                        <p>Vive momentos mágicos con el mejor servicio en nuestros hoteles todo incluido.</p>

                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>



    <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="row mt-5">
            <div class="col-lg-4">
                <svg class="bd-placeholder-img rounded-circle" width="140" height="140"
                    xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder"
                    preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect>
                </svg>
                <h2 class="fw-normal">Misión</h2>
                <p>Nuestra misión es proporcionar a nuestros huéspedes experiencias inolvidables a través de un servicio
                    excepcional y una oferta todo incluido de alta calidad. Nos esforzamos por superar las expectativas
                    de nuestros clientes, creando recuerdos memorables en un ambiente de lujo y confort..</p>

            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <svg class="bd-placeholder-img rounded-circle" width="140" height="140"
                    xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder"
                    preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect>
                </svg>
                <h2 class="fw-normal">Nuestra Visión</h2>
                <p>Aspiramos a ser la cadena de hoteles todo incluido líder en el mercado, reconocida por nuestro
                    compromiso con la excelencia en el servicio y la satisfacción del cliente. Queremos ser el destino
                    preferido para quienes buscan una experiencia de vacaciones inigualable, combinando elegancia,
                    comodidad y aventura.</p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <svg class="bd-placeholder-img rounded-circle" width="140" height="140"
                    xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder"
                    preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect>
                </svg>
                <h2 class="fw-normal">Lo Que Dicen Nuestros Huéspedes</h2>
                <p>Desde familias felices hasta parejas en luna de miel, nuestras reseñas destacan la calidad de nuestro
                    servicio y la magia de nuestros destinos.</p>
            </div>
        </div>




        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading fw-normal lh-1">Risas y Diversión Familiar <span
                        class="text-body-secondary"></span></h2>
                <p class="lead">Diversión para todas las edades. Creemos recuerdos inolvidables con tu familia
                    mientras te sumerges en nuestras actividades diseñadas para todos.</p>
            </div>
            <div class="col-md-5">
                <img src="{{ asset('images/piscina1.webp') }}" alt="Logo" width="500" height="500"">

            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading fw-normal lh-1">Conexión con la Naturaleza <span
                        class="text-body-secondary">See for yourself.</span></h2>
                <p class="lead">Rodeado de exuberante belleza natural, encontrarás el equilibrio perfecto entre
                    relajación y aventura. Conéctate con la naturaleza y déjate llevar.</p>
            </div>
            <div class="col-md-5 order-md-1">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" width="500" height="500">
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading fw-normal lh-1">Momentos Especiales, Recuerdos Eternos <span
                        class="text-body-secondary">Checkmate.</span></h2>
                <p class="lead">Celebra tus momentos más especiales en un entorno mágico. Nuestros lugares únicos
                    crean recuerdos que durarán para siempre.</p>
            </div>
            <div class="col-md-5">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" width="500" height="500">
            </div>
        </div>

        <hr class="featurette-divider">



    </div>


    </main>
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

<footer class="d-flex justify-content-center">
    <!-- Sección Derechos Reservados -->
    <div class="col-md-3 mb-3 mt-5">
        <h5 class="text-warning">DayCameron</h5>
        <p class="text-white">© 2024 DayCameron. Todos los derechos reservados.</p>
    </div>
    </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</html>
