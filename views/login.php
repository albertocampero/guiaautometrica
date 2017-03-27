
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Vrumm</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <style>
            body {
                background: #f7f7f7;
                font-family: "Helvetica Neue", Roboto, Arial, "Droid Sans", sans-serif;
                color: #a3a3a3;
                font-size: 13px;
                font-weight: 400;
                line-height: 1.471;
            }
            #login-form {
                margin-top: 60px;
                padding: 20px;
            }
            #login-form img {
                margin: 0 auto;
            }
            .form-control {
                color: #777;
            }
            #login-form input, #login-form button {
                border-radius: 3px;
                margin-top: 15px;
            }
            .alert {
                padding: 10px;
            }
        </style>
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-2"></div>
                <div class="col-md-4 col-sm-8">
                    <form method="post" action="?" id="login-form">
                        <img src="images/logo_gray.png" class="img-responsive" alt="" />
                        <h5 class="text-center">Guía Autométrica</h5>
                        <?php if ( isset($_GET['error']) ) { ?>
                        <div class="alert alert-danger text-center">
                            <strong>Erorr!</strong> Datos de acceso incorrectos
                        </div>
                        <?php } ?>
                        <input type="email" name="email" class="form-control" placeholder="Correo electrónico" required autofocus />
                        <input type="password" name="password" class="form-control" placeholder="Contraseña" required />
                        <button type="submit" name="login" class="btn btn-primary btn-block">Entrar</button>
                    </form>
                </div>
                <div class="col-md-4 col-sm-2"></div>
            </div>
        <div>       
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>