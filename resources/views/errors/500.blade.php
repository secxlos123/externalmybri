<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>My BRI | Registrasi Berhasil</title>
    {!! Html::style('assets/css/bootstrap.min.css') !!}
    {!! Html::style('assets/css/font-awesome.min.css') !!}
    {!! Html::style('assets/css/style.css') !!}
</head>
<body class="account-pages-bg">
    <!-- HOME -->
    <section>
        <div class="container-alt">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center centered-404">

                    <div class="wrapper-page csm-has-404">
                        {!! Html::image('assets/images/animat-customize-color.gif', '', [
                        'height' => 100,
                        'alt' => ''
                        ]) !!}
                        <h1 style="font-size: 180px; color: #315374;"><b>500</b></h1>
                        <h3 class="text-uppercase text-danger"><b>Internal Server Error</b></h3>
                        <p class="text-muted">Why not try refreshing your page? or you can contact <a href="#" class="text-primary">support</a></p>

                        <a class="btn btn-primary waves-light waves-effect w-md m-b-15 top20" href="/"> Return Home</a>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- END HOME -->

{!! Html::script('assets/js/jquery-2.1.4.js') !!}
{!! Html::script('assets/js/bootstrap.min.js') !!}

</body>
</html>
