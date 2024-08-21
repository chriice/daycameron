<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi Sitio Web')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #121212;
            /* Fondo oscuro */
            color: #e0e0e0;
            /* Color de texto claro */
        }

        .navbar {
            background-color: #1e1e1e;
            /* Fondo oscuro para navbar */
        }

        .navbar-nav .nav-link {
            color: #e0e0e0;
            /* Color de texto claro por defecto */
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: #f0ad4e;
            /* Color amarillo para hover y activo */
        }

        .dropdown-menu {
            background-color: #1e1e1e;
            /* Fondo oscuro para el dropdown */
        }

        .dropdown-item {
            color: #e0e0e0;
            /* Color de texto claro */
        }

        .dropdown-item:hover {
            background-color: #333333;
            /* Fondo oscuro en hover */
            color: #f0ad4e;
            /* Color amarillo en hover */
        }

        .btn-reservar {
            background-color: #f0ad4e;
            /* Amarillo */
            border: none;
            color: #1e1e1e;
            /* Texto oscuro para buen contraste */
            border-radius: 0.25rem;
            /* Esquinas redondeadas */
            padding: 0.5rem 1rem;
        }

        footer {
            background-color: #1e1e1e;
            /* Fondo oscuro */
            color: #e0e0e0;
            /* Color de texto claro */
            padding: 10px 0;
            text-align: center;
        }
    </style>
</head>

<body class="bg-dark text-light">
    <!-- Barra de navegación (Navbar) -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <!-- Aquí puedes poner el logo como una imagen -->
                <img src="{{ asset('imagenes/logodaycameron.png') }}" alt="Logo" style="max-height: 40px;">

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

    <main>
        <div class="container mt-5 full-height d-flex align-items-center justify-content-center">
            <div class="row">
                <!-- Columna 1 -->
                <div class="col-md-6 bg-dark text-white p-5 d-flex flex-column justify-content-center">
                    <h2 style="font-size: 40px; font-weight: 200;">A TU ALCANCE UN</h2>

                    <h1 style="font-size: 80px;">HOTEL</h1>
                    <h1 style="font-size: 80px;">PARADISIACO</h1>
                </div>
                <!-- Columna 2 -->
                <div class="col-md-6 bg-dark text-white p-5 d-flex justify-content-center align-items-center">
                    <img src="{{ asset('imagenes/fotohotelhome.jpg') }}" alt="Logo"
                        style="border-radius: 15px; max-height: 450px; width: auto;">
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Daycameron. Todos los derechos reservados.</p>
    </footer>

    <!-- Incluir Bootstrap JS y dependencias -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
