<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarjeta de Crédito/Débito</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #000000;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
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

        .card-custom {
            background: linear-gradient(135deg, #1c1c1c, #2c2c2c);
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 8px 16px rgba(255, 255, 255, 0.3);
            color: white;
            max-width: 800px;
            width: 100%;
        }

        .card-header-custom {
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 15px;
        }

        .card-body-custom input,
        .card-body-custom select {
            background-color: #898888;
            border: none;
            border-radius: 8px;
            color: #fff;
            padding: 10px;
            margin-bottom: 10px;
        }

        .card-body-custom label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
            color: #f0a500;
        }

        .btn-pagar {
            background-color: #f0a500;
            color: #000;
            border-radius: 8px;
            padding: 12px;
            font-weight: bold;
            border: none;
            transition: background-color 0.3s;
        }

        .btn-pagar:hover {
            background-color: #d98d00;
        }

        .credit-card-icon {
            width: 50px;
            height: auto;
            margin-bottom: 15px;
        }

        .card-footer-custom {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <main class="d-flex justify-content-center align-items-center">
        <div class="card card-custom">
            <div class="card-header card-header-custom text-center">
            
                Tarjeta de Crédito/Débito
            </div>
            <div class="card-body card-body-custom">
                <div class="form-group">
                    <label for="name">Nombre del Titular</label>
                    <input class="form-control" id="name" type="text" placeholder="Nombre del titular">
                </div>
                <div class="form-group">
                    <label for="ccnumber">Número de Tarjeta</label>
                    <input class="form-control" type="text" placeholder="0000 0000 0000 0000" autocomplete="off">
                </div>
                <div class="row">
                    <div class="form-group col-sm-4">
                        <label for="ccmonth">Mes</label>
                        <select class="form-control" id="ccmonth">
                            <option>01</option>
                            <option>02</option>
                            <option>03</option>
                            <option>04</option>
                            <option>05</option>
                            <option>06</option>
                            <option>07</option>
                            <option>08</option>
                            <option>09</option>
                            <option>10</option>
                            <option>11</option>
                            <option>12</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="ccyear">Año</label>
                        <select class="form-control" id="ccyear">
                            <option>2024</option>
                            <option>2025</option>
                            <option>2026</option>
                            <option>2027</option>
                            <option>2028</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="cvv">CVV/CVC</label>
                        <input class="form-control" id="cvv" type="text" placeholder="123">
                    </div>
                </div>
            </div>
            <div class="card-footer card-footer-custom">
                <button class="btn btn-pagar w-100" type="submit">
                    Pagar
                </button>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
