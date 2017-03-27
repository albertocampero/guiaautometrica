<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel ="icon" href="favicon.png">
        <title><?= $pageTitle ?> | Vrumm</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <div id="wrapper">
            <header>
                <div class="container">
                    <img src="images/logo_gray.png" class="img-responsive" alt="" />
                    <h5 class="text-center">Guía Autométrica</h5>
                    <div class="btn-group dropdown">
                        <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-cog" aria-hidden="true"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="./edit">Agregar Registro</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="./brands">Marcas</a></li>
                            <li><a href="./brand-edit">Agregar Marca</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="./models">Modelos</a></li>
                            <li><a href="./model-edit">Agregar Modelo</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="./login"><i class="fa fa-fw fa-sign-out" aria-hidden="true"></i> Salir</a></li>
                        </ul>
                    </div>
                </div>
            </header>