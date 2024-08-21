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






    <style>
        body {
            background: black;
            font-family: 'Roboto', sans-serif;
        }

        .card {
            border: none;
            max-width: 500px;
            border-radius: 15px;
            margin: 150px 0 150px;
            padding: 35px;
            padding-bottom: 20px !important;
            
        }

        .heading {
            color: #C1C1C1;
            font-size: 14px;
            font-weight: 500;
        }

        img {
            transform: translate(160px, -10px);
        }

        img:hover {
            cursor: pointer;
        }

        .text-warning {
            font-size: 12px;
            font-weight: 500;
            color: #edb537 !important;
        }

        #cno {
            transform: translateY(-10px);
        }

        input {
            border-bottom: 1.5px solid #E8E5D2 !important;
            font-weight: bold;
            border-radius: 0;
            border: 0;

        }

        .form-group input:focus {
            border: 0;
            outline: 0;
        }

        .col-sm-5 {
            padding-left: 90px;
        }

        .btn {
            background: #F3A002 !important;
            border: none;
            border-radius: 30px;
        }

        .btn:focus {
            box-shadow: none;
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


    <main>


        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-sm-12">
                    <div class="card mx-auto">
                        <p class="heading">Datos de pago</p>
                        <form class="card-details ">
                            <div class="form-group mb-0">
                                <p class="text-warning mb-0 mt-3">Card Number</p>
                                <input class="mt-3" type="text" name="card-num" placeholder="1234 5678 9012 3457" size="17"
                                    id="cno" minlength="19" maxlength="19">

                            </div>

                            <div class="form-group">
                                <p class="text-warning mb-0">Cardholder's Name</p> <input type="text" name="name"
                                    placeholder="Name" size="17">
                            </div>
                            <div class="form-group pt-2">
                                <div class="row d-flex">
                                    <div class="col-sm-4">
                                        <p class="text-warning mb-0">Expiration</p>
                                        <input type="text" name="exp" placeholder="MM/YYYY" size="7"
                                            id="exp" minlength="7" maxlength="7">
                                    </div>
                                    <div class="col-sm-3">
                                        <p class="text-warning mb-0">Cvv</p>
                                        <input type="password" name="cvv" placeholder="&#9679;&#9679;&#9679;"
                                            size="1" minlength="3" maxlength="3">
                                    </div>
                                    <div class="col-sm-5 pt-0">
                                        <button type="button" class="btn btn-primary"><i
                                                class="fas fa-arrow-right px-3 py-2">></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


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
