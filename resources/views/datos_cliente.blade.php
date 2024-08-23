<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos del Cliente</title>
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

        .form-control {
            background-color: #fff;
            /* Color de fondo blanco */
            color: #000;
            /* Color de texto negro */
            border: 1px solid #555;
        }

        .btn-primary,
        .btn-warning {
            background-color: #f1c40f;
            border: none;
            color: #000;
        }

        .btn-primary:hover,
        .btn-warning:hover {
            background-color: #d4ac0d;
        }

        .btn-add {
            background-color: #f1c40f;
            border: none;
            color: #000;
            font-size: 20px;
            padding: 5px 10px;
            border-radius: 10px;
            /* Forma rectangular con bordes redondeados */
            width: 50px;
            /* Ancho reducido */
        }

        .btn-add:hover {
            background-color: #d4ac0d;
        }

        .btn-remove {
            border: none;
            background-color: transparent;
            /* Elimina el fondo del botón */
            padding: 0;
            /* Elimina el relleno */
        }

        .btn-remove img {
            width: 30px;
            /* Ajusta el tamaño de la imagen */
            height: 30px;
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
    <div class="container mt-5">
        <div class="row">
            <!-- Información personal -->
            <div class="col-md-6">
                <h2 class="text-center mb-4">Información personal</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form id="formCliente" action="{{ route('guardar.reserva') }}" method="POST">
                    @csrf <!-- Token de protección CSRF -->
                    @foreach (session('habitaciones_seleccionadas', []) as $idHabitacion)
                        <input type="hidden" name="id_habitacion[]" value="{{ $idHabitacion }}">
                    @endforeach

                    <!-- Campos del formulario -->
                    <input type="hidden" name="id_habitacion" value="{{ session('id_habitacion') }}">
                    <input type="hidden" name="fecha_entrada" value="{{ session('fecha_entrada') }}">
                    <input type="hidden" name="fecha_salida" value="{{ session('fecha_salida') }}">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="nombre" placeholder="Escribe tu nombre"
                            required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="apellido" placeholder="Escribe tu apellido"
                            required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="telefono"
                            placeholder="Escribe tu teléfono (Opcional)">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="dui" placeholder="DUI" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Escribe tu e-mail"
                            required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="ciudad" placeholder="Ciudad">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="direccion" placeholder="Dirección" required>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="terminos" id="terminos" required>
                        <label class="form-check-label" for="terminos">
                            Términos y condiciones
                        </label>
                    </div>
                    <div class="mb-3">
                        <label for="extra">Selecciona un Extra:</label>
                        <select name="id_extra" id="extra" class="form-control">
                            <option value="" selected disabled>Selecciona una opción</option>
                            @foreach ($extras as $extra)
                                <option value="{{ $extra->id_extra }}">{{ $extra->nombre }} - ${{ $extra->precio }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-warning" id="btnReservar">Reservar</button>
                    </div>
                </form>

            </div>

            <!-- Información de invitados -->
            <div class="col-md-6">
                <h2 class="text-center mb-4">Información invitados</h2>
                <p class="text-center">Agregar visitantes (menores de edad deberán ir con sus padres de familia)</p>
                <form id="formInvitados">
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Nombre completo" id="nombreCompleto"
                            required>
                    </div>
                    <div class="mb-3">
                        <input type="number" class="form-control" placeholder="Edad" id="edad" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Teléfono (no obligatorio)"
                            id="telefono">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="DUI (no obligatorio)"
                            id="dui">
                    </div>
                    <div class="d-grid gap-2">
                        <button type="button" class="btn-add">+</button>
                    </div>
                </form>

                <!-- Lista de invitados -->
                <div class="mt-4">
                    <h4 class="text-center">Invitados</h4>
                    <ul id="listaInvitados" class="list-group">
                        <!-- Aquí se agregarán dinámicamente los invitados -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
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
    <script>
        // Definir el número total de personas y restar 1 para el anfitrión
        let numeroPersonas = {{ $numeroPersonas }} - 1; // $numeroPersonas viene del backend
        let invitadosAgregados = 0;

        // Función para verificar si se han agregado suficientes invitados y desbloquear el botón de reserva
        function verificarInvitados() {
            const btnReservar = document.querySelector('#btnReservar');
            if (invitadosAgregados === numeroPersonas) {
                btnReservar.disabled = false;
            } else {
                btnReservar.disabled = true;
            }
        }

        // Manejador de eventos para el botón de agregar invitado
        document.querySelector('.btn-add').addEventListener('click', function() {
            const nombre = document.querySelector('#nombreCompleto').value;
            const edad = document.querySelector('#edad').value;

            if (nombre && edad && invitadosAgregados < numeroPersonas) {
                // Crear el elemento de la lista con el nombre y la edad del invitado
                const li = document.createElement('li');
                li.className = 'list-group-item d-flex justify-content-between align-items-center';
                li.textContent = `${nombre}, ${edad} años`;

                // Crear el botón de eliminar para cada invitado
                const btnRemove = document.createElement('button');
                btnRemove.className = 'btn-remove';
                const img = document.createElement('img');
                img.src = '{{ asset('images/eliminar.webp') }}'; // Ruta de la imagen del basurero
                btnRemove.appendChild(img);
                btnRemove.addEventListener('click', function() {
                    li.remove();
                    invitadosAgregados--;
                    verificarInvitados(); // Verificar si el botón debe bloquearse nuevamente
                });

                li.appendChild(btnRemove);
                document.querySelector('#listaInvitados').appendChild(li);

                // Incrementar el número de invitados agregados
                invitadosAgregados++;
                verificarInvitados(); // Verificar si se puede desbloquear el botón

                // Limpiar los campos del formulario de invitados
                document.querySelector('#formInvitados').reset();
            } else if (invitadosAgregados >= numeroPersonas) {
                alert('Has agregado el número máximo de invitados.');
            }
        });
    </script>
</body>

</html>
