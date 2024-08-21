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
                <img src="{{ asset('images/logodaycameron.png') }}" alt="Logo" style="max-height: 40px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            País
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">El Salvador</a></li>
                            <li><a class="dropdown-item" href="#">México</a></li>
                            <li><a class="dropdown-item" href="#">Colombia</a></li>
                            <li><a class="dropdown-item" href="#">Panamá</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Mi Reservación</a>
                    </li>
                </ul>
                <!-- Botón destacado para "Reservar" -->
                <a href="#" class="btn btn-reservar">Reservar</a>
            </div>
        </div>
    </nav>

    <main class="d-flex justify-content-center align-items-center min-vh-100">
        <form class="form-inline bg-transparent w-50">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0 btn-black w-100" type="submit">Search</button>
        </form>
    </main>
    
</body>

<footer>
    <!-- Sección Derechos Reservados -->
    <div class="col-md-3 mb-3">
        <h5 class="text-warning">DayCameron</h5>
        <p class="text-white">© 2024 DayCameron. Todos los derechos reservados.</p>
    </div>
    </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</html>
