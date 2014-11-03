<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Adify</title>
        {{ HTML::style('packages/bootstrap/dist/css/bootstrap.css'); }}
        {{ HTML::style('packages/font-awesome/css/font-awesome.css'); }}
        {{ HTML::style('styles/css/bootstrap-flatly.css'); }}
        {{ HTML::style('styles/css/extra.css'); }}
        {{ HTML::style('styles/css/app.css'); }}
    </head>
    <body>
    @include('layout.top')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    @include('layout.side')
                </div>
                <div class="col-md-9">
                    <div class="content-wrap">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

        {{ HTML::script('packages/jquery/dist/jquery.js'); }}
        {{ HTML::script('packages/bootstrap/dist/js/bootstrap.js'); }}
    </body>
</html>