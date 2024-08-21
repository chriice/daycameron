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
            background-color: #fff; /* Cambiado a blanco */
            color: #000; /* Texto en color negro */
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
        .btn-warning:disabled {
            background-color: #555; /* Botón "Reservar" deshabilitado en color gris oscuro */
            color: #888;
            border: none;
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
                        <input type="text" class="form-control" placeholder="DUI" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" placeholder="Escribe tu e-mail" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Escribe tu teléfono (Opcional)">
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
                        <button type="submit" id="btnReservar" class="btn btn-warning" disabled>Reservar</button>
                    </div>
                </form>
            </div>

            <!-- Información de invitados -->
            <div class="col-md-6">
                <h2 class="text-center mb-4">Información invitados</h2>
                <p class="text-center">Agregar visitantes (menores de edad deberán ir con sus padres de familia)</p>
                <form id="formInvitados">
                    <div class="mb-3">
                        <input type="text" id="nombreInvitado" class="form-control" placeholder="Nombre completo" required>
                    </div>
                    <div class="mb-3">
                        <input type="number" id="edadInvitado" class="form-control" placeholder="Edad" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" id="telefonoInvitado" class="form-control" placeholder="Teléfono (no obligatorio)">
                    </div>
                    <div class="mb-3">
                        <input type="text" id="duiInvitado" class="form-control" placeholder="DUI (no obligatorio)">
                    </div>
                    <div class="d-grid gap-2">
                        <button type="button" id="btnAddInvitado" class="btn-add" disabled>+</button>
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
        let numeroPersonas = {{ $numeroPersonas }} - 1; // Número de personas a registrar como invitados
        let invitadosContador = 0; // Contador de invitados agregados

        // Habilitar/deshabilitar el botón de agregar invitado
        document.querySelectorAll('#nombreInvitado, #edadInvitado').forEach(input => {
            input.addEventListener('input', function() {
                const nombre = document.querySelector('#nombreInvitado').value.trim();
                const edad = document.querySelector('#edadInvitado').value.trim();
                document.querySelector('#btnAddInvitado').disabled = !(nombre && edad);
            });
        });

        // Agregar invitado a la lista y deshabilitar el botón de reservar si no se han agregado todos los invitados
        document.querySelector('#btnAddInvitado').addEventListener('click', function() {
            const nombre = document.querySelector('#nombreInvitado').value;
            const edad = document.querySelector('#edadInvitado').value;

            if (nombre && edad) {
                const li = document.createElement('li');
                li.className = 'list-group-item d-flex justify-content-between align-items-center';
                li.textContent = `${nombre}, ${edad} años`;

                const btnRemove = document.createElement('button');
                btnRemove.className = 'btn-remove';
                btnRemove.textContent = '−';
                btnRemove.addEventListener('click', function() {
                    li.remove();
                    invitadosContador--;
                    verificarInvitados();
                });

                li.appendChild(btnRemove);
                document.querySelector('#listaInvitados').appendChild(li);

                invitadosContador++;
                verificarInvitados();

                // Limpiar los campos del formulario de invitados
                document.querySelector('#formInvitados').reset();
                document.querySelector('#btnAddInvitado').disabled = true;
            }
        });

        // Verificar si se han agregado todos los invitados y habilitar/deshabilitar el botón de reservar
        function verificarInvitados() {
            if (invitadosContador >= numeroPersonas) {
                document.querySelector('#btnReservar').disabled = false;
            } else {
                document.querySelector('#btnReservar').disabled = true;
            }
        }
    </script>
</body>
</html>
