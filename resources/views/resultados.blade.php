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
            color: #e0e0e0;
        }

        .navbar {
            background-color: #1e1e1e;
        }

        .navbar-nav .nav-link {
            color: #e0e0e0;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: #f0ad4e;
        }

        .dropdown-menu {
            background-color: #1e1e1e;
        }

        .dropdown-item {
            color: #e0e0e0;
        }

        .dropdown-item:hover {
            background-color: #333333;
            color: #f0ad4e;
        }

        .btn-reservar {
            background-color: #f0ad4e;
            border: none;
            color: #1e1e1e;
            border-radius: 0.25rem;
            padding: 0.5rem 1rem;
        }

        footer {
            background-color: #1e1e1e;
            color: #e0e0e0;
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
        <div class="container mt-5 d-flex flex-column align-items-center">

            <h1 class="mb-3" style="font-size: 40px;">Fecha:</h1>
            <h1>----</h1>
        </div>

        <div class="container mt-5">
            <div class="row g-4"> <!-- Añadido g-4 para el espaciado entre columnas -->
                <!-- Columna 1 -->
                <div class="col-md-6 bg-dark text-white p-4 p-md-5 d-flex flex-column justify-content-center">
                    <div class="mb-4">
                        <h1 class="fs-3">Resumen:</h1>
                    </div>

                    <div class="d-flex flex-column mb-4">
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckHotel">
                            <label class="form-check-label" for="flexSwitchCheckHotel">Hotel</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckHotelTransporte">
                            <label class="form-check-label" for="flexSwitchCheckHotelTransporte">Hotel + Transporte</label>
                        </div>
                    </div>

                    <form class="row g-3 needs-validation" novalidate>
                        <div class="col-md-6">
                            <label for="validationCustom01" class="form-label">Ciudad de origen</label>
                            <input type="text" class="form-control" id="validationCustom01" value="ciudad" required>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom02" class="form-label">Hotel</label>
                            <input type="text" class="form-control" id="validationCustom02" value="Hotel" required>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom03" class="form-label">Fecha entrada</label>
                            <input type="text" class="form-control" id="validationCustom03" value="00/00/0000" required>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom04" class="form-label">Fecha salida</label>
                            <input type="text" class="form-control" id="validationCustom04" value="00/00/0000" required>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom05" class="form-label">Personas</label>
                            <input type="text" class="form-control" id="validationCustom05" value="numero personas" required>
                        </div>
                        <div class="col-md-6 mt-5">
                            <button type="button" class="btn btn-outline-warning w-100">Confirmar</button>
                        </div>
                    </form>
                </div>

                <!-- Columna 2 -->
                <div class="col-md-3 bg-dark text-white p-4 d-flex flex-column align-items-center">
                    <h2 class="mb-3" style="font-size: 20px; font-weight: 200;">Habitación Premium</h2>
                    <h1 class="mb-3" style="font-size: 20px; color: yellow;">$$$</h1>
                    <h2 class="mb-3" style="font-size: 12px; font-weight: 200;">Plan todo incluido</h2>
                    <h2 class="mb-4" style="font-size: 12px; font-weight: 200;">Habitación premium max 4 personas</h2>

                    <img src="{{ asset('imagenes/fotohotelhome.jpg') }}" alt="foto habitación" class="img-fluid mb-3" style="border-radius: 15px; max-height: 150px;">

                    <div class="input-group mb-3 w-100 mt-5" style="max-width: 150px;">
                        <button class="btn btn-outline-secondary" type="button" data-spinner="spinner1" data-action="decrement">-</button>
                        <input type="number" class="form-control text-center" id="spinner1" value="0" min="0" max="100" step="1">
                        <button class="btn btn-outline-secondary" type="button" data-spinner="spinner1" data-action="increment">+</button>
                    </div>
                </div>

                <!-- Columna 3 -->
                <div class="col-md-3 bg-dark text-white p-4 d-flex flex-column align-items-center">
                    <h2 class="mb-3" style="font-size: 20px; font-weight: 200;">Habitación Estándar</h2>
                    <h1 class="mb-3" style="font-size: 20px; color: yellow;">$$$</h1>
                    <h2 class="mb-3" style="font-size: 12px; font-weight: 200;">Plan todo incluido</h2>
                    <h2 class="mb-4" style="font-size: 12px; font-weight: 200;">Habitación estándar max 4 personas</h2>

                    <img src="{{ asset('imagenes/fotohotelhome.jpg') }}" alt="foto habitación" class="img-fluid mb-3" style="border-radius: 15px; max-height: 150px;">

                    <div class="input-group mb-3 w-100 mt-5" style="max-width: 150px;">
                        <button class="btn btn-outline-secondary" type="button" data-spinner="spinner2" data-action="decrement">-</button>
                        <input type="number" class="form-control text-center" id="spinner2" value="0" min="0" max="100" step="1">
                        <button class="btn btn-outline-secondary" type="button" data-spinner="spinner2" data-action="increment">+</button>
                    </div>
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

    <script>
        document.querySelectorAll('[data-action]').forEach(button => {
            button.addEventListener('click', function() {
                let spinnerId = this.getAttribute('data-spinner');
                let spinner = document.getElementById(spinnerId);
                let currentValue = parseInt(spinner.value);
                if (this.getAttribute('data-action') === 'increment') {
                    spinner.value = currentValue + 1;
                } else if (this.getAttribute('data-action') === 'decrement' && currentValue > 0) {
                    spinner.value = currentValue - 1;
                }
            });
        });
    </script>
</body>

</html>
