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
        .form-control {
            background-color: #fff; /* Color de fondo blanco */
            color: #000; /* Color de texto negro */
            border: 1px solid #555;
        }
        .btn-primary, .btn-warning {
            background-color: #f1c40f;
            border: none;
            color: #000;
        }
        .btn-primary:hover, .btn-warning:hover {
            background-color: #d4ac0d;
        }
        .btn-add, .btn-remove {
            background-color: #f1c40f;
            border: none;
            color: #000;
            font-size: 20px;
            padding: 5px 10px;
            border-radius: 50%;
        }
        .btn-add:hover, .btn-remove:hover {
            background-color: #d4ac0d;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <!-- Información personal -->
            <div class="col-md-6">
                <h2 class="text-center mb-4">Información personal</h2>
                <form id="formCliente">
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Escribe tu nombre" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Escribe tu apellido" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Escribe tu teléfono (Opcional)">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="DUI" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" placeholder="Escribe tu e-mail" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Ciudad">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Dirección" required>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="" id="terminos" required>
                        <label class="form-check-label" for="terminos">
                            Términos y condiciones
                        </label>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-warning" id="btnReservar" disabled>Reservar</button>
                    </div>
                </form>
            </div>

            <!-- Información de invitados -->
            <div class="col-md-6">
                <h2 class="text-center mb-4">Información invitados</h2>
                <p class="text-center">Agregar visitantes (menores de edad deberán ir con sus padres de familia)</p>
                <form id="formInvitados">
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Nombre completo" id="nombreCompleto" required>
                    </div>
                    <div class="mb-3">
                        <input type="number" class="form-control" placeholder="Edad" id="edad" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Teléfono (no obligatorio)" id="telefono">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="DUI (no obligatorio)" id="dui">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Definir el número total de personas y restar 1 para el anfitrión
        let numeroPersonas = {{ $numeroPersonas }} - 1;  // $numeroPersonas viene del backend
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
                btnRemove.textContent = '−';
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
